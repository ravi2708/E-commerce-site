<?php 
	session_start();
	require "dbconfig/config.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style4.css">
</head>
<body style="background-color:#bdc3c7">


	<div id="main-wrapper">
		<center>
			<h2>Admin Login</h2>
	
	
		<form class="myform" action="admin.php" method="post">
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
			<input name="login" type="submit" id="login_btn" value="Login"/><br>
		</form>
		
		</center>
		<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query="select * from admin WHERE username='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				//valid
				$_SESSION['username']=$username;
				header('location:admin1.php');
			}
			else
			{
				//invalid
				echo '<script type="text/javascript">alert("Invalid credentials") </script>';
			}
		}
		?>
	</div>
</body>
</html>