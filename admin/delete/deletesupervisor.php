<?php
session_start();
?>
<html>
<head>
<title>
Supervisor Details
</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="dashboardadmin.css" type="text/css">
</head>
<body>

<div class="main">
<div class="left">
<div>
<ul>
<li><img src="images/cap.png"></li><li><h3>SALES MANAGEMENT</h3></li>
</ul>
</div>
<br><br><br><br>
<hr>
<div id="menu">
<table>
<tr><td class=dropdown><a > PRODUCTS</a><hr>
<ul>
<li><a href="addproduct.php"> ADD PRODUCT<a/></li>
<li><a href="deleteproduct.php">delete product</a></li>
</ul>
</td></tr>
<tr><td class=dropdown><a href="super.php"> SUPERVISOR</a><hr>
<ul><li> <a href="addsupervisor.php"> Add Supervisor<a/></li><li><a href="deletesupervisor.php"> Delete Supervisor<a/> </li></ul></td></tr>
<tr><td class=dropdown><a href="salesman.php">SALESMAN </a><hr>
<ul><li> <a href="addsale.php"> Add Salesman<a/></li>
<li><a href="deletesale.php"> Delete Salesman<a/> </li></ul></td>
</tr>
<tr><td class=dropdown><a> PERFORMANCE</a><hr>
<ul>
 <li> <a href="pp.php"> Based on product</a></li>
 <hr>
<li><a href="ps.php" >Based on Salesman</a> </li> <hr>
</ul >
</td>
  </tr>
</table>
</div>
</div>
<div class="right">
<a id="icon" href="dashboardadmin.php" ><i class="fas fa-arrow-alt-circle-left"> click to go Home</i></a>
<p id="sold"><?php 
if($_SESSION['username']){
	?>
Welcome <?php echo $_SESSION['username'];}?><a id="icon2" href=super1.php><i class="fas fa-sync-alt"> click to refresh</i></a> </p>
</div>
<div class="right1">
<p> DASHBOARD</p>
</div>
<div class="right2">
<?php
include_once 'connect.php';
$q="select * from supervisor";
$query=oci_parse($connection,$q);
$result=oci_execute($query);
?>
<table class="table">  
<tr>  
<th > <div align="center">NAME </div></th>  
<th> <div align="center"> ID</div></th>  
<th> <div align="center"> NO. OF SALESMAN</div></th>  
 <th> <div align="center"> MOBILE NUMBER</div></th> 
<th> <div align="center"> ACTION</div></th> 
</tr>  
<?php  
 $i=0;
while ($row= oci_fetch_array($query,OCI_RETURN_NULLS+OCI_ASSOC))
{
	?>
 <tr>
<td><?php echo $row["NAME"]; ?></td>
<td><?php echo $row["ID"]; ?></td>
<td align="center";><?php echo $row["NO_OF_SALESMAN"]; ?></td>
<td><?php echo $row["PHONE_NUMBER"]; ?></td>
<td ID="NEW"><a onclick="return confirm(' All The Salesman Under This Supervisor Will also be Deleted.Are you sure to delete.?')" href="deletesupervisorphp.php?ID=<?php echo $row["ID"];?>">Delete</a></td>
</TR>
<?php
}
?> 
</table>
<br>
<br>
<?php
oci_free_statement($query);
oci_close($connection);
?>

</div>
</div>
</body>
</html>