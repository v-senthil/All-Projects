<!DOCTYPE html>
<html>
<head>
	<title> User Info. </title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<ul>
  <li><a class="active" href="home.html">Home</a></li>
  <li><a href="form-style-10.html">SIGN UP</a></li>
  <li><a href="show.html">LOGIN</a></li>
   <li><a href="admin.html">ADMIN</a></li>
</ul>

<?php
	echo "<body style='background-color:powderblue'>";

	$con = mysqli_connect("localhost","root","","test");
	if(!$con)
	{
		echo "<script>alert('Password does not match');document.location='http://localhost/Sign_up_for_college/form-style-10.html'</script>";
	}

	$email = $_POST['field15'];	
	$pwd = $_POST['field16'];


	if(isset($_POST['field17'])) 
	{
		
		$result = mysqli_query($con,"SELECT * FROM `users` WHERE email='$email' and pass='$pwd'");

		if($result)
		{
			echo "<h2>This is your Account</h2>";

			$sql = "SELECT * FROM `users` WHERE email='$email' and pass='$pwd'";
			$run = mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($run))
				{
					echo "<table border=1><center>";	
					echo "<br><br>
							<tr>
								<td> Full Name: </td><td>". $row["full_name"]. "</td>
							</tr>
							<tr>
								<td> Address: </td><td>" . $row["address"] ."</td>
							</tr>
								<tr><td> Email: </td><td>" . $row["email"] . "</td>
							</tr>
							<tr>
								<td> Phone: </td><td>" . $row["phone"] ."</td>
							</tr>
							<tr>
								<td> DOB: </td><td>" . $row["DOB"] ."</td>
							</tr>
							<tr>
								<td> Age: </td><td>" . $row["age"] ."</td>
							</tr>
							<tr>
								<td> Gender: </td><td>" . $row["gender"] ."</td>
							</tr>
							<tr>
								<td> Deaprtment: </td><td>" . $row["dept"] ."</td>
							</tr>
							<tr>
								<td> College: </td><td>" . $row["college"] ."</td>
							</tr>";
    			}
				echo "</table ></center>";
            

	       }
	       
	      
	    } 

 	

?>
<br><br>
<button onclick="window.location.href = 'http://localhost/Sign_up_for_college/delete_user.php';">Delete my Data</button>
<br><br>
<button onclick="window.location.href = 'http://localhost/Sign_up_for_college/home.html';">Home</button>
</body>
</html>