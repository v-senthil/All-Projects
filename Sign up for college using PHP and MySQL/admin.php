<!DOCTYPE html>
<?php
	echo "<body style='background-color:powderblue'>";
	$con = mysqli_connect("localhost","root","","test");
	//echo '<script>alert("Conneted")</script>';
?>
<html>
<head>
	<title> ADMIN Login</title>
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
<!--   <button onclick="window.location.href = 'http://localhost/Sign_up_for_college/delete.php';" name="field25" >Delete All Data</button>\    -->
<!--	<input type="submit" name="field25" />     -->
	<button onclick="window.location.href = 'http://localhost/Sign_up_for_college/delete.php';">Delete All Data</button>
</div>
<?php

		

echo"<center>";
	if(isset($_POST['field22']))
	{
		$email = $_POST['field20'];	
		$pwd = $_POST['field21'];

		if ($email=='root' && $pwd == 'root')
		{
			echo "<center><br><h2> RECORDS: <h2></center>";
			$sql = "SELECT * FROM `users`";
			$result = $con->query($sql);
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc()) 
				{
					echo "<table border=1>";
						
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
				echo "</table >";
				
				}	
				else 
				{
    				echo "<center><h2> 0 results </h2></center>";
    			}
echo"</center>";
		}
		else
 		{
 			echo "<center><h2>Invalid ID(or)PASSWORD<br></h2><h3> Please try again!</h3><button onclick= \"location.href='admin.html'\">Try again</button></center>";
 		}	
 }

?>
</body>
</html>