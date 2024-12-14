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
        <link rel="shortcut icon" href="images/sips_logo.ico" />
        <meta name="theme-color" content="#2874A6">
	<style type="text/css">
		.liclass { margin:0 auto; border-bottom:1px #808080 dashed; font-size:20px; font-family:Tahoma, Geneva, sans-serif; padding:15px;}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script><script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>


    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="60">

      
      <div class="jumbotron" id="main" style="background-color:white;">
		<div class="row">			
			<div class="col-sm-3">
			<div class="container-fluid text-center">
			<div class="notificationArea">
					<?php
					  $conec = new Connection();
									$con = $conec->Open();
									if ($con) {
						$selectQuery= "select * from newupdate where end_date > CURDATE() order by id DESC limit 10";
						$stmt = $con->prepare($selectQuery);
						$stmt->execute();
					  }
						
					?>
					<marquee behavior="scroll" scrollamount="5" direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=250 >
					   <ul class="ulclass" style="color:#2874A6;">
							 <?php 
							   for ($i = 0; $row = $stmt->fetch(); $i++) {
								 $id=$row['id'];
								 $feed=$row['title'];
								 $startDate=$row['start_date'];
							   ?>
						   <li class="liclass" style="color:#2874A6;">
								 <?php echo '<a href="notificationDescription.php?id='.$row['id'].'" style="color:#2874A6;">'.$feed.'</a>';  
								  if(!($startDate < date('Y-m-d'))){

								 ?>
									<sup style="color:red;" id="newSup" class="newSup">new</sup>				 
								 <?php }  } ?>
							</li>
							
					  </ul>
							   
			  </marquee>
			  </div>
			</div>
			</div>
		</div>	
	</div>  
   
</body>
</html>

