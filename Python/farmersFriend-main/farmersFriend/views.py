from django.shortcuts import render

def home(request):
    return render(request,'index.html')

def index(request):
    return render(request,'index.html')

def registerpage(request):
    return render(request,'register.html')

def askquestion(request):
    return render(request,'askquestion.html')

def weather(request):
    return render(request,'weather.html')

def news(request):
    return render(request,'news.html')