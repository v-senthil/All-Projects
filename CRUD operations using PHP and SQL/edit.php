<?php 
		if(isset($_GET['edit'])){
			
			$edit_id = $_GET['edit']; 
			
			$select = "select * from users where id='$edit_id'";
			$run = mysqli_query($con,$select); 
			
			$row=mysqli_fetch_array($run);
			
			$user_name = $row['name']; 
			$user_pass = $row['pass']; 
			$user_email = $row['email'];
			
			}
		?>
		
<br/>
<form method="post" action="">
		<input type="text" name="u_name" value="<?php echo $user_name;?>"/><br/>
		<input type="password" name="u_pass" value="<?php echo $user_pass;?>"/><br/>
		<input type="text" name="u_email" value="<?php echo $user_email ;?>"/><br/>
		<input type="submit" name="update" value="Update Data"/>
	
	</form>
	<?php 
	if(isset($_POST['update'])){
	
		$update_name = $_POST['u_name'];
		$update_pass = $_POST['u_pass'];
		$update_email = $_POST['u_email'];
		
		 $update = "update users set name='$update_name',pass='$update_pass',email='$update_email' where id='$edit_id'";
		
		$update_run = mysqli_query($con,$update);
	
		if($update_run){
		
		echo "<script>alert('Data has been updated!')</script>";
		echo "<script>window.open('form.php','_self')</script>";
		}
	}
	
	?> 