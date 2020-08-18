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
        headers={'Authorization': 'Token YOUR_API_KEY'})
data = response.json()

#JSON response
#print(data)

#Firebase Configuration
config = {
    "apiKey": "YOUR_API_KEY",
    "authDomain": " ",
    "databaseURL": "YOUR_DATABASE_URL",
    "projectId": "YOUR_PROJECT_ID",
    "storageBucket": " "
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
