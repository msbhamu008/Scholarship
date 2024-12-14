<?php
include("Connection.php");
$user = new Connection();
?>

<?php
//echo "<pre>"; print_r($_POST);exit;
	  $conec = new Connection();
       $con = $conec->Open();
      if ($con) {
	$startDate = date('Y-m-d H:i:s');
	$endDate =date('Y-m-d', strtotime("+4 days"));
		if($_POST['insert']){
			$Insertsql = "INSERT INTO newupdate (title,description, start_date, end_date)
        VALUES ('".$_POST['title']."','".$_POST['desc']."','".$startDate."','".$endDate."')";
		//echo $sql ; exit;
		$stmt = $con->prepare($Insertsql);
        $stmt->execute();
		
		echo '<script>alert("Notification Added Successfully !!");
			window.location="adminActivityPage";
		</script>';
		}else{
			echo "Not Inserted";
		}
 
      }
?>