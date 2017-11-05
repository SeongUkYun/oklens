# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib.humanize.templatetags.humanize import intcomma
from django.template.loader import get_template
from django.template import Context, TemplateSyntaxError, Variable
from mezzanine.pages.models import Page
from mezzanine import template
from decimal import Decimal

register = template.Library()


@register.filter
def is_doctors(value):
    print value
    vals = value.split('/')
    return 'doctor_ortho' in vals and len(vals) > 2


@register.filter
def is_patient(value):
    print value
    vals = value.split('/')
    return 'patient_ortho' in vals and len(vals) > 2


# @register.filter
@register.render_tag
def get_child_pages(context, token):
    template_name = Variable(token.split_contents()[1]).resolve(context)
    page_id = Variable(token.split_contents()[2]).resolve(context)
    parent = Page.objects.get(pk=page_id)
    context["page_branch"] = Page.objects.filter(parent=parent).order_by('_order')
    print('page_branch:', context["page_branch"])
    t = get_template(template_name)
    return t.render(Context(context))
