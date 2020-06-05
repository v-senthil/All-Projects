
'use strict';
 
const functions = require('firebase-functions');
const admin = require('firebase-admin');
const {WebhookClient} = require('dialogflow-fulfillment');
const {Card, Suggestion} = require('dialogflow-fulfillment');


const nodemailer = require("nodemailer");

const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
        user: 'your mail ID',
        pass: 'Mail password'
    }
});

admin.initializeApp({
	credential: admin.credential.applicationDefault(),
  	databaseURL: 'ws://yourproject.firebaseio.com/'
});

process.env.DEBUG = 'dialogflow:debug'; // enables lib debugging statements
 
exports.dialogflowFirebaseFulfillment = functions.https.onRequest((request, response) => {
  const agent = new WebhookClient({ request, response });
  console.log('Dialogflow Request headers: ' + JSON.stringify(request.headers));
  console.log('Dialogflow Request body: ' + JSON.stringify(request.body));
 
  function welcome(agent) {
    agent.add(`Welcome to my agent!`);
  }
 
  function fallback(agent) {
    agent.add(`I didn't understand`);
    agent.add(`I'm sorry, can you try again?`);
  }
  
  function handleSavetoDB(agent)
 {
    const Name = agent.parameters.Name;
   	const Email = agent.parameters.Email;
    const Phonenumber =  agent.parameters.Phonenumber;
    const Address =  agent.parameters.Address;
    const Admin_number =  agent.parameters.Admin_number;
    const date = agent.parameters.date;
   
   const mailOptions = {
    from: "ChatBot", // sender address
    to: Email, // list of receivers
    subject: "This is your Personal Data Collector Chat Bot", // Subject line
    html: `<h1> Hello ${Name} </h1>
			<p> Your name is ${Name} and your Phone Number is ${Phonenumber} and Email ID is ${Email} who lives is ${Address} with Registration number ${Admin_number}</p>`
	};
    
    transporter.sendMail(mailOptions, function (err, info) {
    if(err)
    {
      console.log(err);
    }
	});
  
    
    return admin.database().ref('data').child(Name).set
    ({
    	First_name: Name,
      	Email: Email,
      	Phonenumber: Phonenumber ,
      	Address: Address,
      	Admin_number: Admin_number
        
      
    });
  
   
 
  }
  
  function handlerReadFromDB(agent){
    const name = agent.parameters.name;
  	return admin.database().ref('data').child(name).once('value').then((snapshot) => {
    	const value1 = snapshot.child('First_name').val();
      	const value5 = snapshot.child('Email').val();
        const value2 = snapshot.child('Phonenumber').val();
      	const value3 = snapshot.child('Address').val();
      	const value4 = snapshot.child('Admin_number').val();
        
      	if(value1 != null && value2!= null && value5!=null && value3!=null && value4!=null){
        	agent.add(`Your name is ${value1} and your Phone Number is ${value2} and Email ID is ${value5} who lives is ${value3} with Registration number ${value4}`);
        }
    
    
    });
  
  }
  
  

  let intentMap = new Map();
  intentMap.set('Default Welcome Intent', welcome);
  intentMap.set('Default Fallback Intent', fallback);
  intentMap.set('SavetoDB', handleSavetoDB);
  intentMap.set('ReadfromDB', handlerReadFromDB);
  //intentMap.set('sendEmail', handlersendEmail);
  agent.handleRequest(intentMap);
});
