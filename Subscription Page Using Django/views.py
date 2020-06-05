from django.shortcuts import render
from django.http import HttpResponseRedirect
from .models import contact
import webbrowser
# Create your views here.


def index(request):
    if request.method == 'POST':
        Name = request.POST.get("Name")
        Email = request.POST.get("Email")
        Number = request.POST.get("Number")
        Age = request.POST.get("Age")

        data = contact(Name=Name, Email=Email, Number=Number, Age=Age)
        data.save()
        #return HttpResponseRedirect('https://senthilpitchappan.wixsite.com/myportfolio')
        return render(request, 'thanks.html')

    else:
        return render(request, 'contact.html')
        return 
