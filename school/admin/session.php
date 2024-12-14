<?php
include("Connection.php");
session_start();

$user_check = $_SESSION['uid'];

	  $conec = new Connection();
	  $con = $conec->Open();
	  if ($con) {
	  $selectQuery= "SELECT * FROM admin WHERE username = '$user_check'";
	  $stmt = $con->prepare($selectQuery);
	  $stmt->execute();
	  $count=$stmt->rowCount();
	  $data=$stmt->fetch(PDO::FETCH_OBJ);
	  
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['uid']=$data->username;   
      }else {
         echo '<script>alert("Please Login Again !!");</script>';
      }

if(empty($_SESSION['uid']))
{
	header("location: index.php");
}

	  }
?>