#include <SoftwareSerial.h>
SoftwareSerial BTSerial(2,3); // RX | TX
int BULB1 = 4;

void setup() 
{
  pinMode(BULB1,OUTPUT); // Trigger for Bulb 1
  Serial.begin(9600);
  BTSerial.begin(9600);
}

void loop() {
  if(BTSerial.available())
  {
    Serial.println("BTSerial is available");
    char data=BTSerial.read();
    switch (data) {
    case 'a':
      digitalWrite(BULB1,1);
      Serial.println("Changed the BULB1 value to HIGH");
      break;
    case 'b':
      digitalWrite(BULB1,0);
      Serial.println("Changed the BULB1 value to LOW");
      break;
    default: 
      // if nothing else matches, do the default
      // default is optional
    break;
    }
  }
}
