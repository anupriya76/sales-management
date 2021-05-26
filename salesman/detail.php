<?php
session_start();
?>
<html>
<head>
<title>
Supervisor Details
</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="../dashboardadmin.css" type="text/css">
</head>
<body>
<div class="main">
<div class="left">
<div>
<ul>
<li><img src="cap.png"></li><li><h3>SALES MANAGEMENT</h3></li>
</ul>
</div>
<br><br><br><br>
<hr>
<div id="menu">
<table>
<tr><td class=dropdown><a href="detail.php"> Your details</a><hr></tr>
<tr><td class=dropdown><a href="updatedetails.php"> Update details</a><hr></tr>
<tr><td class=dropdown><a href="detailproduct.php">Products sold </a><hr></tr>
<tr><td class=dropdown><a href="order.php"> Add order</a><hr></tr>
</table>
</div>
</div>
<div class="right">
<a id="icon" href="dashboardsalesman.php" ><i class="fas fa-arrow-alt-circle-left"> click to go Home</i></a>
<p id="sold"><?php 
if($_SESSION['username']){
	?>
Welcome <?php echo $_SESSION['username'];}?><a id="icon2" href=detail.php><i class="fas fa-sync-alt"> click to refresh</i></a> </p>
</div>
<div class="right1">
<p> DASHBOARD</p>
</div>
<div class="right2">
<?php
include_once 'connect.php';
$q="select * from salesman where salesman_number='".$_SESSION["password"]."'";
$query=oci_parse($connection,$q);
$result=oci_execute($query);
?>
<table class="table">  
<tr>  
<th> <div align="center"> ID</div></th>
<th > <div align="center">NAME </div></th>  
<th> <div align="center"> STATE</div></th> 
<th> <div align="center"> CITY</div></th>  
<th> <div align="center"> PINCODE</div></th> 
<th> <div align="center"> SALARY</div></th> 
 <th> <div align="center"> MOBILE NUMBER</div></th> 
</tr>  
<?php  
 $i=0;
while ($row= oci_fetch_array($query,OCI_RETURN_NULLS+OCI_ASSOC))
{
	?>
 <tr>
<td><?php echo $row["SALESMAN_NUMBER"]; ?></td>
<td><?php echo $row["NAME"]; ?></td>
<td><?php echo $row["STATE"]; ?></td>
<td><?php echo $row["CITY"]; ?></td>
<td><?php echo $row["PINCODE"]; ?></td>
<td><?php echo $row["SALARY"]; ?></td>
<td><?php echo $row["PHONE_NUMBER"]; ?></td>
</TR>
<?php
}
?> 
</table>
<br>
<br>
<?php
oci_free_statement($query);
?>

</div>
</div>
</body>
</html>