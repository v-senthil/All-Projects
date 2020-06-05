<!DOCTYPE html>
<?php
	echo "<body style='background-color:powderblue'>";
	$con = mysqli_connect("localhost","root","","test");

?>
<html>
<head>
	<title> Delete table</title>
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
	<button onclick="window.location.href = 'http://localhost/Sign_up_for_college/admin.html';">Log out</button>
<?php
		$delete = "DELETE FROM users";
		$run_delete = mysqli_query($con,$delete); 
		
		if($run_delete)
		{
			echo "<h2>All data has been deleted!</h2>";
			//echo "<script> window.open('form.php','_self') </script>";
		}
		else
		{
			echo "<h2>Failed</h2>";
		}

	
?>
</body>
</html>