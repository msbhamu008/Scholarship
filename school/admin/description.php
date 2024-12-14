<?php
include("/admin/Connection.php");
$user = new Connection();

?>

<div>
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
	  ?>
	  <p>Desription</p>
	  
	  <?php 
               for ($i = 0; $row = $stmt->fetch(); $i++) {
                 $desc=$row['description'];
               ?>
			   
			   <?php echo $desc; ?>
			    <?php }  ?>
			   
</div>