void setup() { 
  ///wwww.beginnertopro.in////
  //left sensor output to arduno input 
  pinMode(7,INPUT); 
  //Right Sensor output to arduino input 
  pinMode(6,INPUT); 
  //output from audrino to motor drive 
  //Right motor audrino to motor Drive 
  pinMode(0,OUTPUT); 
  pinMode(1,OUTPUT); 
  //left Motor Arduino motor Drive 
  pinMode(2,OUTPUT); 
  pinMode(3,OUTPUT); 
} 
  void loop() { 
    //left sensor input 
    int l1=digitalRead(7); 
    //Right Sensor Input 
    int r1=digitalRead(6); 
    if((l1==HIGH)&&(r1==HIGH)) 
    { 
       //Stay still
      digitalWrite(0,HIGH); 
      digitalWrite(1,HIGH); 
      digitalWrite(2,HIGH); 
      digitalWrite(3,HIGH); 
    } else if((l1==LOW)&&(r1==HIGH)) {
        //turns right 
        digitalWrite(0,HIGH); 
        digitalWrite(1,LOW); 
        digitalWrite(2,LOW); 
        digitalWrite(3,HIGH); 
    } else if((l1==HIGH)&&(r1==LOW)) {
          //turns left 
          digitalWrite(0,LOW); 
          digitalWrite(1,HIGH); 
          digitalWrite(2,HIGH); 
          digitalWrite(3,LOW); 
    } else if((l1==LOW)&&(r1==LOW)) {
          //Stop the Boot
         digitalWrite(0,LOW);
         digitalWrite(1,HIGH); 
         digitalWrite(2,LOW); 
         digitalWrite(3,HIGH);
    }
 }
