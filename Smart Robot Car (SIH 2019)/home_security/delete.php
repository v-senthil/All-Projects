<!DOCTYPE html>
<?php
	echo "<body style='background-color:powderblue'>";
	$con = mysqli_connect("localhost","root","","dht11");
	if(! $con)
	{
		echo "Database not Connected";
	}

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Delete table</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<br><br>
	<button onclick="window.location.href = 'http://localhost/Smart_Car/read_db.php';">Back</button>
	<br><br>
	<button onclick="window.location.href = 'http://localhost/Smart_Car/index.php';">Log out</button>
<?php
		$delete = "DELETE FROM new_data";
		$run_delete = mysqli_query($con,$delete); 
		
		if($run_delete)
		{
			echo "<h2>All data has been deleted!</h2>";
			echo "<script> window.open('read_db.php','_self') </script>";
			//header("Location: read_db.php");
			echo "<h2>All data has been deleted!</h2>";
		}
		else
		{
			echo "<h2>Failed</h2>";
		}

	
?>
</body>
</html>