## Hardware:
1. ESP32
2. ESP8266
3. Tempearure Sensor (DHT11)
4. Mositure Sensor
5. PIR Sensor
6. Ultra Sonic Sensor
7. Flame Sensor
8. Metal Detector

## Software:
1. MySQL Database
2. PHP
3. MIT App Inventor
4. Tableau
5. Firebase



#### The robot system is equipped with sensors that can alert the user when some unknown appears within the range while the robot is working. This whole robot system works in both automatic and manual modes. By default, the robot works in automatic mode, in this mode the movement of the robot is controlled with the help of obstacle avoiding sensor (Ultra Sonic Sensor). In manual mode, the user sends the signal wirelessly using ESP8266 and can give directions to change the path accordingly. In both modes, users can watch the surroundings through the wireless cameras (Eachine TX-03) built in the car and if any value exceeds the normal, the user is alerted through a notification in the mobile app and local server website. The output from the sensors is sent to Firebase and then the data is retrieved to the user side using ESP32 into a mobile app created with MIT app inventor. And another ESP8266 for updating data into MySQL Server for data analysis using Tableau.
