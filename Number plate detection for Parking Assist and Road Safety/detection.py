

import cv2
import random
import os
import numpy as np
import matplotlib.pyplot as plt
import pytesseract
import time
import pandas as pd
import random
image = cv2.imread("data/images/car_1.jpg")
#cv2.imshow("Original Image", image)
gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
#cv2.imshow("Gray Image", gray)
def plot_images(img1, img2, title1="", title2=""):
    fig = plt.figure(figsize=[15,15])
    ax1 = fig.add_subplot(121)
    ax1.imshow(img1, cmap="gray")
    ax1.set(xticks=[], yticks=[], title=title1)
    ax2 = fig.add_subplot(122)
    ax2.imshow(img2, cmap="gray")
    ax2.set(xticks=[], yticks=[], title=title2)
plot_images(image, gray)
#cv2.imshow("Gray Image", gray)
blur = cv2.bilateralFilter(gray, 11,90,90)
#cv2.imshow("Blur Image", blur)
plot_images(gray, blur)
edges = cv2.Canny(blur, 30, 200)
plot_images(blur, edges)
cnts, new = cv2.findContours(edges.copy(), cv2.RETR_LIST, cv2.CHAIN_APPROX_SIMPLE)
image_copy = image.copy()
_ = cv2.drawContours(image_copy, cnts, -1, (255,0,255),2)
plot_images(image, image_copy)
cnts = sorted(cnts, key=cv2.contourArea, reverse=True)[:30]
image_copy = image.copy()
_ = cv2.drawContours(image_copy, cnts, -1, (255,0,255),2)
plot_images(image, image_copy)
plate = None
for c in cnts:
    perimeter = cv2.arcLength(c, True)
    edges_count = cv2.approxPolyDP(c, 0.03 * perimeter, True)
    if len(edges_count) == 4:
        x,y,w,h = cv2.boundingRect(c)
        plate = image[y:y+h, x:x+w]
        break
cv2.imwrite("plate.png", plate)
text = pytesseract.image_to_string(plate, lang="eng")
print(text)


import datetime
now = datetime.datetime.now()
'''print ("Current date and time : ")
print (now.strftime("%Y-%m-%d %H:%M:%S"))
'''
ran = random.randrange(1000,100000000000)



from firebase import firebase  
firebase = firebase.FirebaseApplication('https://number-plate-3e7c1.firebaseio.com/', None)  
result = firebase.put('data','number',text)
result2 = firebase.put('data','time',now.strftime("%Y-%m-%d %H:%M:%S"))  
result3 = firebase.put('data','id',ran)  

print("id = ",result3)
print("Number Plate = ",result) 
print("Time = ",result2)



'''
import datetime
mydate = datetime.datetime.now()
csvstr = datetime.datetime.strftime(mydate, '%d,%m,%Y, %H, %M, %S')


import csv
with open('data.csv', mode='w') as data:
    employee_writer = csv.writer(data, delimiter=':',quotechar='"', quoting=csv.QUOTE_MINIMAL)

    employee_writer.writerow([text,csvstr])

'''




#Data is stored in CSV file
raw_data = {'date':[time.asctime( time.localtime(time.time()))],'':[text]}
#raw_data = [time.asctime( time.localtime(time.time()))],[text]   

df = pd.DataFrame(raw_data)
df.to_csv('data.csv',mode='a')

# Print recognized text
print(text)



