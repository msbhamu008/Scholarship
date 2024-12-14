<?php
include("admin/Connection.php");
$user = new Connection();
?>
      <!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.2/css/font-awesome.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
		</head>
<body>
<?php
	  $conec = new Connection();
                    $con = $conec->Open();
                    if ($con) {
						    $id = $_GET['id'];
        $selectQuery= "select * from newupdate where id=$id";
		//echo $selectQuery; exit;
		$stmt = $con->prepare($selectQuery);
        $stmt->execute();
      }

               for ($i = 0; $row = $stmt->fetch(); $i++) {
                 $desc=$row['description'];
				 $title=$row['title'];
				} 
				?>
				
<div class="container-fluid text-center">
		<h3><?php echo $title; ?></h3>
		<a href="notification.php"><button class="btn btn-primary">Back</button></a>
		<hr style="font-size:30px;">
			<b><textarea style="width:100%; border:none; background-color:white;" rows="8" disabled="true"><?php echo $desc; ?></textarea></b>
</div>



</div>
</body>
</html>