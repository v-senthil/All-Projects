<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
		<h1 align="center">Home and Border Security System </h1> 
		<title>Home and Border Security System</title>
		<br><br>
		<style>
			@viewport
			{
				width:device-width;
				zoom:1;
			}
			table 
			{
				border-collapse: collapse;
				width: 100%;
				color: #1f5380;
				font-family: monospace;
				font-size: 20px;
				text-align: left;
			} 
			th 
			{
				background-color: #1f5380;
				color: white;
			}
			tr:nth-child(even) {background-color: #f2f2f2}
		</style>
	</head>
<?php

	//error_reporting(0); 
	
		
				echo "<body style='background-color:powderblue'>";
				//page refresh every 3 sec
					header("refresh: 3");
				//echo date('H:i:s Y-m-d'); 

				//Creates new record as per request
				//Connect to database
				$hostname = "localhost";		
				$username = "root";		
				$password = "";	
				$dbname = "dht11";

				// Create connection
				$conn = mysqli_connect($hostname, $username, $password, $dbname);

				// Check connection
				if (!$conn) 
				{
					die("Connection failed !!!");
				} 

?>
			<body>
				<center>
					<button onclick="window.location.href = 'http://localhost/Smart_Car/home_security/delete.php';">Delete All Records</button> <br> <br>
					<button onclick="window.location.href = 'http://localhost/Smart_Car/home_security/index.php';">Log Out</button> <br> <br>
					<button onclick="window.location.href = 'http://localhost/Smart_Car/email/email.php';">Report Through Email</button> <br> <br>
					<button onclick="window.location.href = 'http://localhost/Smart_Car/SMS/sms.php';">Report Through SMS</button>
					<br><br>
				</center>
				
				<table>
					<tr>
						<th>ID</th> 
						<th>Temperature</th> 
						<th>Humidity</th>
						<th>Distance</th>
						<th>Gas</th>
						<th>Pressure</th>
						<th>Time and Date</th>
					</tr>	
					<?php

						$select = "SELECT id, temperature, humidity, distance, gas, pressure,Time_and_Date FROM new_data";
						$table = mysqli_query($conn, "SELECT id, temperature, humidity, distance, gas, pressure,Time_and_Date FROM new_data"); 
						while($row = mysqli_fetch_array($table))
				{
					?>
					<tr>
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["temperature"]; ?></td>
						<td><?php echo $row["humidity"]; ?></td>
						<td><?php echo $row["distance"]; ?></td>
						<td><?php echo $row["gas"]; ?></td>
						<td><?php echo $row["pressure"]; ?></td>
						<td><?php echo $row["Time_and_Date"]; ?></td>
					</tr>
<?php
}


?>


					<?php
						
						$temp = $row["temperature"];
						$hum = $row["humidity"];
						$dis = $row["distance"];
						$gas1 = $row["gas"];
						$pres = $row["pressure"];	

						if($temp > 50 || $hum > 100 || $dis > 100 || $gas1 > 100 || $pres > 1200)
						{
							echo "<script> alert ('DANGER!!!')</script>";
							echo( "<embed name='sound_file' src='buzzer.mp3' loop='true' hidden='true' autostart='true'/>");
						}
			

		

			?>
		</table>

	</body>
</html>