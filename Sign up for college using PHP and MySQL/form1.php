<!DOCTYPE html>
<?php
	
	echo "<body style='background-color:powderblue'>";

	$con = mysqli_connect("localhost","root","","test") or die("Connection was not created!");

	$full_name = $_POST['field1'];
	$address = $_POST['field2'];
	$email = $_POST['field3'];
	$phone = $_POST['field4'];
	$DOB = $_POST['field5'];
	$age = $_POST['field6'];
	$gender = $_POST['field7'];
	$dept = $_POST['field8'];
	$college = $_POST['field9'];
	$pass = $_POST['field10'];
	$cpass = $_POST['field11'];

	if (!( $pass == $cpass))
	{
		echo "<script>alert('Password does not match');document.location='http://localhost/Sign_up_for_college/form-style-10.html'</script>";
	}

	
?>
<html>
<head>
	<title>PHP link</title>
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

	if ( $pass == $cpass)
	{	
		if(isset($_POST['field12']))
	    {
			$full_name = $_POST['field1'];
			$address = $_POST['field2'];
			$email = $_POST['field3'];
			$phone = $_POST['field4'];
			$DOB = $_POST['field5'];
			$age = $_POST['field6'];
			$gender = $_POST['field7'];
			$dept = $_POST['field8'];
			$college = $_POST['field9'];
			$pass = $_POST['field10'];
			$cpass = $_POST['field11'];
			

		 	$insert = "INSERT INTO users (full_name,address,email,phone,DOB,age,gender,dept,college,pass,cpass) VALUES ('$full_name','$address','$email','$phone','$DOB','$age','$gender','$dept','$college','$pass','$cpass')";
		
			$run = mysqli_query($con,$insert);
	
			if($run)
			{
				echo "<h3>Registration Successful, Thanks!</h3>";
			}

		}
	}	
	
?>


	<table 	width="900" align="center" border="1">
	
		<tr>
			<th>S.N</th>
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Phone</th>
			<th>DOB</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Department</th>
			<th>College</th>
			<th>Password</th>

		</tr>
<?php
	
	// select user_name from users where id='thisid'
			$select = "select * from users order by RAND() LIMIT 0,5 ";
			
			$run = mysqli_query($con,$select); 
			
			$i = 0;
			while($row=mysqli_fetch_array($run))
			{

				
				$user_full_name = $row['full_name'];
				$user_address = $row['address'];
				$user_email = $row['email'];
				$user_phone = $row['phone'];
				$user_DOB = $row['DOB'];
				$user_age = $row['age'];
				$user_gender = $row['gender'];
				$user_dept = $row['dept'];
				$user_college = $row['college'];
				$user_pass = $row['pass'];

			
				$i++;
			}	
			
?>			
		
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $user_full_name ;?></td>
					<td><?php echo $user_address ;?></td>
					<td><?php echo $user_email ;?></td>
					<td><?php echo $user_phone ;?></td>
					<td><?php echo $user_DOB ;?></td>
					<td><?php echo $user_age ;?></td>
					<td><?php echo $user_gender ;?></td>
					<td><?php echo $user_dept ;?></td>
					<td><?php echo $user_college ;?></td>
					<td><?php echo $user_pass 	;?></td>
				</tr>

				<button onclick="window.location.href = 'http://localhost/Sign_up_for_college/form-style-10.html';">Logout</button>
				<br><br>
				<button onclick="window.location.href = 'http://localhost/Sign_up_for_college/home.html';">Home</button>
				
		            
		    
		
	
</table>
</body>
</html>