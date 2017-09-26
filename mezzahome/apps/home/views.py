# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render
from django.views import generic

from mezzanine.blog.models import BlogPost


class HomeView(generic.TemplateView):
    template_name = 'index.html'

    def get_context_data(self, **kwargs):
        context = super(HomeView, self).get_context_data(**kwargs)
        contents = BlogPost.objects.all().order_by('updated')[:6]
        context['page1'] = contents[0:3]
        context['page2'] = contents[3:6]
        return context
