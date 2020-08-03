<?php 
  session_start();

  include_once("dbconfig/config.php");
  $idPost = $_POST['id'];

  $query = "DELETE from images where id= '$idPost'";
  $row = mysqli_query($con, $query);
  echo $_GET['id'];
  

 ?>
 