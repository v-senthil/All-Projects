<!DOCTYPE html>
<?php

	echo "<body style='background-color:powderblue'>";
	$con = mysqli_connect("localhost","root","","test");

?>
<html>
<head>
	<title>Delete User</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<ul>
  <li><a class="active" href="home.html">Home</a></li>
  <li><a href="form-style-10.html">SIGN UP</a></li>
  <li><a href="show.html">LOGIN</a></li>
   <li><a href="admin.html">ADMIN</a></li>
</ul>
<br><br>
	<button onclick="window.location.href = 'http://localhost/Sign_up_for_college/home.html';">Home</button>
	<br><br>
	<button onclick="window.location.href = 'http://localhost/Sign_up_for_college/show.html';">Log out</button>
	<br><br>

<?php
	
	$delete_email = $_GET['email'];
	$delete = "DELETE FROM users WHERE email = '$delete_email'";
	$run_delete = mysqli_query($con,$delete); 
		
		if($run_delete)
		{
			echo "<h2>Data has been deleted!</h2>";
		}
		else
		{
			echo "<h2>Failed</h2>";
		}

?>
</body>
</html>