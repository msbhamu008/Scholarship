<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "sipsweb";
 $dbpass = "12345";
 $db = "sipsweb";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
// function CloseCon($conn)
//  {
//  $conn -> close();
//  }


	session_start();
	//connect to database
// 	$conn = mysqli_connect("localhost", "sipsweb", "12345", "sipsweb");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}else{
	   
	}
 

 ?>