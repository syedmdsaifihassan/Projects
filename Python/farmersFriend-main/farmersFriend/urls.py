from django.contrib import admin
from django.conf.urls import url
from django.urls import path
from django.contrib.staticfiles.urls import staticfiles_urlpatterns
from . import views

urlpatterns = [
    url(r'admin/', admin.site.urls),
    url(r'^$',views.home),
    url(r'^index',views.index),
    url(r'^register',views.registerpage),
    url(r'^askquestion',views.askquestion),
    url(r'^weather',views.weather),
    url(r'^news',views.news),
]

urlpatterns += staticfiles_urlpatterns()