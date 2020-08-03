<?php
  $db = mysqli_connect('localhost','root','','samplelogindb');
    
?>
<!DOCTYPE html>
<html>
<head>
<title>ADMIN</title>
<link rel = "stylesheet" type = "text/css" href = "style4.css">
<script src="jquery-3.4.1.min.js"></script>
</head>
<body>
	<form method ="post" action ="admin1.php" class = "">
	<!--<div class ="header">
       <h1><span>USER-</span>DATA</h1>
    </div>-->
	</form>
	 <center><h1><span>USER-</span>DATA</h1></center>
  
	 <?php
      $sql = "SELECT * FROM images ";
      $result = mysqli_query($db, $sql);
      ?> 
	<div class = "container">
    <?php include 'dbconfig/config.php';?>
	
	 <?php
         $i = 1;
         echo "<form action='' method='get'>";
         echo "<table border='1'>
         <tr>
         <th>ID</th>
         <th>Username</th>
         <th>Title</th>
         <th>Check</th>
         </tr>";
             while ($row = mysqli_fetch_array($result)) {
               echo '<tr>';
               echo '<td>' . $row['id'] . '</td>';
               echo '<td>' . $row['image'] . '</td>';
               echo '<td>' . $row['text'] . '</td>';
		
			   echo"<td><input id='$row[id]' type='button' name='$row[id]' value='delete' onclick='del(this.id)'/></td>";
				
				//echo "<td><input type='hidden' name='action' value='' id='action' /><?";
			   echo '</tr>';
               $i++;
             }
          echo '</table>';
          echo '</form>';
      ?>
	  
	  </div>
	  
	  <script>
		function del(ID){    
		var a = ID;
		$.post('temp.php',{id:a},
        function(data){
            window.location.href = "admin1.php";
        });
  }
	  </script>
</body>
</html>