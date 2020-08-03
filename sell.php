<?php
	//session_start();
  // Create database connection
 // $db = mysqli_connect("localhost", "root", "");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	
	$image = $_FILES['image']['name'];
	$text = $_POST['text'];
	$target = "images/".basename($image);
	
	$db = mysqli_connect("localhost", "root", "","samplelogindb");
	  	
	//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
	
  	$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
	mysqli_query($db,$sql);
  	// execute query
  	//mysqli_query($db, $sql);
	//echo $r;

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  //$result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style3.css">
	<link rel="stylesheet" href="style2.css">
</head>
<body style="background-color:#83D6DE">
<div class="menu">
			
			<div class="leftmenu">
                        <div class="logo">
                        <img src="olx.jpg" alt="olx">
                        </div>
			</div>

			<div class="rightmenu">
				<ul>
					<li><a href="buysell.php"> HOME </a></li>
					<li><a href="index.php"> LOGOUT </a></li>
					<li><a href="sell.php"> Buy and Sell </a></li>
					<li><a href="about1.html"> About Us </a></li>
					<li><a href="contact_us.html"> Contact </a></li>
				</ul>
			</div>

		</div>

<div id="content">
<h1>THINGS YOU CAN BUY:</h1>
<?php
    $db = mysqli_connect("localhost","root","","samplelogindb");
	$sql = "SELECT * FROM images";
	$result = mysqli_query($db,$sql);
	while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
		echo "<a href='comment.php'>COMMENT</a>";
      echo "</div>";
	
    }
  ?>
 
  <form method="post" action="sell.php" enctype="multipart/form-data">
  	<h1>SELL YOUR PRODUCTS BELOW:</h1>
	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	name="text" 
      	cols="40" 
      	rows="4" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<input type="submit" name="upload" value="Upload Image">
  	</div>
  </form>
</div>
</body>
</html>