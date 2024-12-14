<?php
include("navigation.php");
?>
<style>
    label{
        font-size:12px;
        color:black;
    }

    .noprofile { 
        position: relative; 
        width: 100%; /* for IE 6 */
    }

    .noprofile p { 
        position: absolute; 
        top: 100px; 
        left: 0; 
        width: 100%; 
        color:#2874A6;
    }
    #tctable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tctable td, #tctable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tctable tr:nth-child(even){background-color: #337ab7;}

#tctable tr:hover {background-color: #ddd;}

#tctable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #337ab7;
  color: white;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('#busfacility').on('change', function () {
            var selectValue = $(this).val();


            if (selectValue == "byes") {
                $('#buswhere').removeAttr('disabled');
            } else {
                $('#buswhere').attr('disabled', 'disabled');
            }

        });

        $('#phydis').on('change', function () {
            var selectValue = $(this).val();


            if (selectValue == "phyyes") {
                $('#physpecify').removeAttr('disabled');
            } else {
                $('#physpecify').attr('disabled', 'disabled');
            }

        });
    });

</script>
<br><br><br><br><br>
<div class="container wow fadeInUp">
    <div class="row">
        <div class="col-md-12">
            <h3 class="section-title">Tranfer Certificate</h3>
            <div class="section-title-divider"></div>
        </div>
    </div>
</div>

<?php
$self = $_SERVER['PHP_SELF'];
?>
<div class="container-fluid  text-center">
    <center>
        <div class="panel panel-primary" style="width:70%;">
            <div class="panel-heading">
                <h4>Search Student Tranfer Certificate</h4>
            </div>
            <div class="panel-body">
                <form action="<?=$self?>" method="GET">
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">First Name:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                   <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label for="scholar">Admission Number</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="scholar" name="rollno">							
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr style="border-width: 2px; border-color: #2874A6;">

                  
                     </div>
                      
                    <div class="row">
                        <input type="hidden" name="search" />
                        <br>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                   
                </form>
           
        </div>
        <br><br><br>
    </center>
</div>



<!--<form action="<?=$self?>" method="GET">-->
<!--Enter First Name : <input type="text" name="name" /><br><br>-->
<!--Enter Admission No : <input type="text" name="rollno" />-->
<!--<input type="hidden" name="search" />-->
<!--<input type="submit" value = "Search" />-->

<!--</form>-->
<?php

if(isset($_GET['search'])) {
//echo("sds");exit;
$conn = mysqli_connect("localhost", "sipsweb", "12345", "sipsweb");

$nme=$_GET["name"];
$rollno=$_GET["rollno"];
echo "<p>Searching for $nme...</p>";

//$sql = "SELECT * FROM persons WHERE firstName COLLATE UTF8_GENERAL_CI like '%$nme%'" ;
//$sql = "SELECT * FROM persons WHERE firstName COLLATE UTF8_GENERAL_CI like '%$nme%'" ;

$sql = "SELECT * FROM persons WHERE firstName = '$nme' AND rollno = '$rollno' ";
//print_r($sql); exit;

$query = mysqli_query($conn, $sql);

//print_r($query); exit;
if(mysqli_num_rows($query) > 0) {
?>
<div class="container-fluid  text-center">
    <center>
<table border="1" class="table table-bordered" style="border-collapse:collapse; color:#404040" id="tctable">
    <thead>
 
<tr>
 <th>First Name</th>
 <th>Last Name</th>
                    <th>Admission No</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
               <th>TC Link</th>
</tr>
</thead>
<?php

while ($row=mysqli_fetch_array($query))
{
echo "<tr> <td>$row[1]</td> <td>$row[2]</td>";
echo "<td>$row[6]</td><td>$row[3]</td> <td>$row[5]</td> <td> <a href='$row[4]' target='_blank'>View </a> </td> </tr>";
}
} else
echo "<p><b> No matches found... </b></p>";
mysql_free_result($row);
mysql_close($dbh);
}
?>
</table>
</center>
</div>

 <?php
                    include("footer.html");
                    ?>