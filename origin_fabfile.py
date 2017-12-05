# -*- coding: utf-8 -*-
from mezzanine.utils.conf import real_project_name

from fabric.api import env, local, run, sudo, hide, cd
from fabric.contrib.files import append, exists, sed, put, upload_template
from fabric.colors import green

import os
import re
import sys
import random
from importlib import import_module
from posixpath import join
from glob import glob


PROJECT_DIR = os.path.dirname(os.path.abspath(__file__))
BASE_DIR = os.path.dirname(PROJECT_DIR)

if not hasattr(env, "proj_app"):
    env.proj_app = real_project_name("mezzahome")

conf = {}
if sys.argv[0].split(os.sep)[-1] in ("fab", "fab-script.py"):
    try:
        conf = import_module("{}.settings".format(env.proj_app)).ORIGIN_FABRIC
    except AttributeError:
        print("Cannot find setting for fabric!")
        exit()
    except ImportError:
        print("Cannot import fabric setting!")
        exit()

env.proj_name = conf.get("PROJECT_NAME", env.proj_app)
env.user = conf.get("SSH_USER", None)
env.key_filename = conf.get("SSH_KEY", None)
env.hosts = conf.get("HOSTS", [""])
env.venv_home = conf.get("VIRTUALENV_HOME", "/home/%s/.virtualenvs" %env.user)
env.venv_path = join(env.venv_home, env.proj_name)
env.proj_path = "/home/%s/%s" % (env.user, env.proj_name)
env.manage = "%s/bin/python %s/manage.py" % (env.venv_path, env.proj_path)
env.domains = conf.get("DOMAINS", [conf.get("LIVE_HOSTNAME", env.hosts[0])])
env.domains_nginx = " ".join(env.domains)
env.domains_regex = "|".join(env.domains)
env.locale = conf.get("LOCALE", "ko_KR.UTF-8")
env.repo_url = conf.get('REPO_URL', '')
env.allow_host = conf.get('ALLOW_HOST', '')
env.ssl_disabled = "#" if len(env.domains) > 1 else ""
env.num_workers = conf.get("NUM_WORKERS",
                           "multiprocessing.cpu_count() * 2 + 1")

##################
# Template setup #
##################

# Each template gets uploaded at deploy time, only if their
# contents has changed, in which case, the reload command is
# also run.

_templates = {
    "nginx": {
        "local_path": "deploy/nginx.conf.template",
        "remote_path": "/etc/nginx/sites-enabled/%(proj_name)s.conf",
        "reload_command": "service nginx restart",
    },
    "supervisor": {
        "local_path": "deploy/supervisor.conf.template",
        "remote_path": "/etc/supervisor/conf.d/%(proj_name)s.conf",
        "reload_command": "supervisorctl update gunicorn_%(proj_name)s",
    },
    "cron": {
        "local_path": "deploy/crontab.template",
        "remote_path": "/etc/cron.d/%(proj_name)s",
        "owner": "root",
        "mode": "600",
    },
    "gunicorn": {
        "local_path": "deploy/gunicorn.conf.py.template",
        "remote_path": "%(proj_path)s/gunicorn.conf.py",
    },
}

templates = {}
for name, data in _templates.items():
    templates[name] = dict([(k, v %env) for k, v in data.items()])


def _set_locale():
    local = env.locale.replace("UTF-8", "utf8")
    with hide("stdout"):
        if locale not in run("locale -a"):
            sudo("locale-gen %s" % env.locale)
            sudo("update-locale %s" % env.locale)
            run("exit")

def _create_related_dir():
    run("mkdir -p %s" % env.proj_path)
    run("mkdir -p %s" % env.venv_home)
    with cd(env.venv_home):
        if exists(env.proj_name):
            if confirm("Virtualenv already exists in host server: %s"
                       "\nWould you like to replace it?" % env.proj_name):
                run("rm -fr %s" % env.proj_name)
            else:
                abort()
        run("virtualenv %s" % evn.proj_name)

def make_virtualenv():
    if not exists('~/.virtualenvs'):
        print('hogehoge')
        script = '''"#python virtualenv settings
                export WORKON_HOME=~/.virtualenvs
                export VIRTUALENVWRAPPER_PYTHON="$(command \which python)"
                source /usr/local/bin/virtualenvwrapper.sh"'''
        run('mkdir ~/.virtualenvs')
        sudo('sudo pip install virtualenv virtualenvwrapper')
        run('echo {} >> ~/.bashrc'.format(script))

def get_latest_src():
    print(env.proj_path)
    print(env.proj_path + '/.git')
    print(env.repo_url, env.proj_path)
    if not exists(env.proj_path + '/.git'):
        run('git clone %s %s' % (env.repo_url, env.proj_path))

    run('cd %s && git fetch' % (env.proj_path,))

def update_setting():
    settings_path = env.proj_path + '/{}/settings.py'.format(env.proj_name)
    sed(settings_path, 'DEBUG = True', 'DEBUG = False')
    sed(settings_path, 'ALLOWED_HOSTS = .+$', 'ALLOWED_HOSTS = ["%s"]' % (env.allow_host,))

    secret_key_file = env.proj_path + '/{}/secret_key.py'.format(env.proj_name)
    if not exists(secret_key_file):
        chars = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*(-_=+)'
        key = ''.join(random.SystemRandom().choice(chars) for _ in range(50))
        append(secret_key_file, "SECRET_KEY = '%s'" % (key,))

    append(settings_path, "")
    append(settings_path, "from .secret_key import SECRET_KEY")

def update_virtualenv():
    virtualenv_folder = env.proj_path + '/../.virtualenvs/{}'.format(env.proj_name)
    if not exists(virtualenv_folder + '/bin/pip'):
        run('cd /home/%s/.virtualenvs && virtualenv %s' % (env.user, env.proj_name))
    run('%s/bin/pip install -r %s/requirements.txt' % (virtualenv_folder, env.proj_path))

def update_static_files():
    virtualenv_folder = env.proj_path + '/../.virtualenvs/{}'.format(env.proj_name)
    run('cd %s && %s/bin/python manage.py collectstatic --noinput' % (env.proj_path, virtualenv_folder))

def update_database():
    virtualenv_folder = env.proj_path + '/../.virtualenvs/{}'.format(env.proj_name)
    run('cd %s && %s/bin/python manage.py migrate --noinput' % (env.proj_path, virtualenv_folder))

def initial_install():
    sudo("apt-get update -y -q")
    sudo("apt-get install -y -q nginx libjpeg-dev python-dev python-setuptools git-core libpq-dev memcached supervisor python-pip")
    run("mkdir -p /home/%s/logs" % env.user)

    sudo("pip install -U pip virtualenv virtualenvwrapper mercurial")

    run("mkdir -p %s" % env.venv_home)
    run("echo 'export WORKON_HOME=%s' >> /home/%s/.bashrc" % (env.venv_home, env.user))
    run("echo 'source /usr/local/bin/virtualenvwrapper.sh' >> /home/%s/.bashrc" % env.user)
    print(green("Successfully set up git, mercurial, pip, virtualenv, supervisor, memcached.", bold=True))

def initial_setting():
    if not env.ssl_disabled:
        conf_path = "/etc/nginx/conf"
        if not exists(conf_path):
            sudo("mkdir %s" % conf_path)
        with cd(conf_path):
            crt_file = env.proj_name + '.crt'
            key_file = env.proj_name + '.key'
            if not exists(crt_file) and not exists(key_file):
                try:
                    crt_local, = glob(join("deploy", "*.crt"))
                    key_local, = glob(join("deploy", "*.key"))
                except ValueError:
                    parts = (crt_file, key_file, env.domains[0])
                    sudo("openssl req -new -x509 -nodes -out %s -keyout %s -subj '/CN=%s' -days 3650" % parts)
                else:
                    upload_template(crt_local, crt_file, use_sudo=True)
                    upload_template(key_local, key_file, use_sudo=True)

    upload_template_and_reload('nginx')
    upload_template_and_reload('supervisor')
    upload_template_and_reload('gunicorn')

def upload_template_and_reload(name='gunicorn'):
    template = templates[name]

    local_path = template["local_path"]
    if not os.path.exists(local_path):
        project_root = os.path.dirname(os.path.abspath(__file__))
        local_path = os.path.join(proejct_root, local_path)
    remote_path = template["remote_path"]
    reload_command = template.get("reload_command")
    owner = template.get("owner")
    mode = template.get("mode")
    remote_data = ""
    if exists(remote_path):
        with hide("stdout"):
            remote_data = sudo("cat %s" % remote_path)
    with open(local_path, "r") as f:
        local_data = f.read()
        local_data = re.sub(r"%(?!\(\w+\)s)", "%%", local_data)
        local_data %= env
    clean = lambda s: s.replace("\n", "").replace("\r", "").strip()
    if clean(remote_data) == clean(local_data):
        return
    upload_template(local_path, remote_path, env, use_sudo=True, backup=False)
    if owner:
        sudo("chown %s %s" % (owner, remote_path))
    if mode:
        sudo("chmod %s %s" % (mode, remote_path))
    if reload_command:
        sudo(reload_command)
