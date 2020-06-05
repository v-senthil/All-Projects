from django.db import models
import datetime

# Create your models here.

class contact(models.Model):
    Name = models.CharField(max_length = 100)
    Email = models.CharField(max_length = 100)
    Number = models.IntegerField()
    Age = models.IntegerField()

    def __str__(self):
        return self.Name

