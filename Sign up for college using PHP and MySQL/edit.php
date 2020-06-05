<?php 
		if(isset($_GET['edit']))
		{
			
			$edit_id = $_GET['edit']; 
			
			$select = "select * from users where id='$edit_id'";
			$run = mysqli_query($con,$select); 
			
			$row=mysqli_fetch_array($run);
			
			$user_name = $row['full_name']; 
			$user_address = $row['address']; 
			$user_email = $row['email'];
			$user_phone = $row['phone'];
			$user_DOB = $row['DOB'];
			$user_age = $row['age'];
			$user_gender = $row['gender'];
			$user_dept = $row['dept'];
			$user_college = $row['college'];
			;
			
		}
?>
		
<br/>
<form method="post" action="">
		Full Name: <input type="text" name="u_name"  value="<?php echo $user_name;?>"/><br/>
		Address: <input type="text" name="u_address" value="<?php echo $user_address;?>"/><br/>
		Email: <input type="email" name="u_email" value="<?php echo $user_email ;?>"/><br/>
		Phone: <input type="text" name="u_phone" value="<?php echo $user_phone ;?>"/><br/>
		DOB: <input type="text" name="u_DOB" value="<?php echo $user_DOB ;?>"/><br/>
		Age: <input type="text" name="u_age" value="<?php echo $user_age ;?>"/><br/>
		Gender: <input type="text" name="u_gender" value="<?php echo $user_gender ;?>"/><br/>
		Department: <input type="text" name="u_dept" value="<?php echo $user_dept ;?>"/><br/>
		College: <input type="text" name="u_college" value="<?php echo $user_college ;?>"/><br/>
		
		<input type="submit" name="update" value="Update Data"/>
	
	</form>
	<?php 
	if(isset($_POST['update'])){
	
		$update_name = $_POST['u_name'];
		$update_address = $_POST['u_pass'];
		$update_email = $_POST['u_email'];
		$update_phone = $_POST['u_phone'];
		$update_DOB = $_POST['u_DOB'];
		$update_age = $_POST['u_age'];
		$update_gender = $_POST['u_gender'];
		$update_dept = $_POST['u_dept'];
		$update_college = $_POST['u_college'];
		

		
		 $update = "update users set full_name='$update_name',address='$update_address',email='$update_email',phone='$update_phone',DOB='$update_DOB',age='$update_age',gender='$update_gender',dept='$update_dept',college='$update_college' where id='$edit_id'";
		
		$update_run = mysqli_query($con,$update);
	
		if($update_run){
		
		echo "<script>alert('Data has been updated!')</script>";
		echo "<script>window.open('admin.php','_self')</script>";
		}
	}
	
	?> 