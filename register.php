<?php 
	require "dbconfig/config.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">


	<div id="main-wrapper">
		<center>
			<h2>Sign up</h2>
		</center>
	
		<form class="myform" action="register.php" method="post">
			<label><b>Full name:</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Enter your fullname" required /><br>
			<label><b>Gender:</b></label><br>
			<input name="gender" type="radio" class="radiobtns" value="male" checked required>Male
			<input name="gender" type="radio" class="radiobtns" value="female"  required>Female<br>
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Your username" required /><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required /><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required /><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/>	
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript">alert("Sign Up button clicked") </script>';
				
				$fullname = $_POST['fullname'];
				$gender = $_POST['gender'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query="select * from userinfotable WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						//there is already a user with the same username
						echo '<script type="text/javascript">alert("User already exists") </script>';
					}
					else
					{
						$query = "insert into userinfotable values('','$username','$fullname','$gender','$password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript">alert("User Registered...go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript">alert("Error!") </script>';
						}
					}
					
					
				}
				else{
					echo '<script type="text/javascript">alert("Password and confirm password not matched") </script>';
				}
				
				
			}
		?>
	</div>
</body>
</html>