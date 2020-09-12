
<?php
		  
		include_once("server.php");

		  $userId = $_SESSION['user_id'];
		  $preference = $_POST["preference"];
    	$sql = "UPDATE user SET preference="preference" WHERE id='".$userId."'";
    	$result=mysqli_query($conn, $sql);
     ?>