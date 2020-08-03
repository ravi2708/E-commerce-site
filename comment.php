<?php
if($_POST){
	$name = $_POST['name'];
	$content = $_POST['commentContent'];
	$pname = $_POST['pname'];
	$handle = fopen("comment.html","a");
	fwrite($handle,"<b>" . $name . "</b>:<br/>" . $content . "<br/>" . $pname . "<br/>");
	fclose($handle);
}
?>


<html>
<body style="background-color:#bdc3c7">
<form action = "" method = "POST">
<center>Name: <input type ="text" name = "name"><br/></center>
<center>Comments:<textarea cols = "50" name = "commentContent"></textarea><br/></center>
<center>Product Name: <input type ="text" name = "pname"><br/></center>
<center><input type = "submit" value = "Post"><br/></center>
</form>
<?php include "comment.html"; ?>
</body>
</html>