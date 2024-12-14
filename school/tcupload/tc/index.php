
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Search for contact</title>
</head>
<body  text = "#660099">
<h1> Search for Contacts </h1>

<?php
$self = $_SERVER['PHP_SELF'];
?>
<form action="<?=$self?>" method="GET">
Enter Name : <input type="text" name="name" /><br><br>
Enter Admission No : <input type="text" name="rollno" />
<input type="hidden" name="search" />
<input type="submit" value = "Search" />

</form>
<?php

if(isset($_GET['search'])) {
//echo("sds");exit;
$conn = mysqli_connect("localhost", "root", "root", "crud");

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

<table border="1" style="border-collapse:collapse; color:#404040">
<tr>
 <th>First Name</th>
                    <th>Last Name</th>
                    <th>Admission No</th>

                    <th>Gender</th>
                    <th>Date of Birth</th>
               <th>TC Link</th>
</tr>
<?php
//echo("sdad");exit;
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
</body>
</html>