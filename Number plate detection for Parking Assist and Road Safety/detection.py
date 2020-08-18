import requests
import json
from firebase import Firebase
import csv

#Automatic number-plate recognition API
regions = ['in'] # Change to your country
with open('data/images/3.jpg', 'rb') as fp:
    response = requests.post(
        'https://api.platerecognizer.com/v1/plate-reader/',
        data=dict(regions=regions),  # Optional
        files=dict(upload=fp),
        headers={'Authorization': 'Token 7c9ced42ce6ac2938556d5a4e8c52422ad1b5cea'})
data = response.json()

#JSON response
#print(data)

#Firebase Configuration
config = {
    "apiKey": "AIzaSyA34_Vuo2eh6WiRFY-A3mAPtunWJSUskrY",
    "authDomain": "raspi-284115.firebaseapp.com",
    "databaseURL": "https://raspi-284115.firebaseio.com",
    "projectId": "raspi-284115",
    "storageBucket": "raspi-284115.appspot.com"
}
firebase = Firebase(config)
db = firebase.database()

#Get Data from JSON response
for plate in data['results']:
    plate_data = plate['plate']
plate_time = data['timestamp']

#setting firebase value
number_data = {"Plate":plate_data , "Time":plate_time}
db.child(plate_data).set(number_data)

#CSV file
new_row=[plate_data, plate_time]
with open('plate.csv','a+') as csvFile:
    writer = csv.writer(csvFile)
    writer.writerow(new_row)
