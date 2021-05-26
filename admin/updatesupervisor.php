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
<li><img src="../images/cap.png"></li><li><h3>SALES MANAGEMENT</h3></li>
</ul>
</div>
<br><br><br><br>
<hr>
<div id="menu">
<table>
<tr><td class=dropdown><a > PRODUCTS</a><hr>
<ul>
<li><a href="addproduct.php"> ADD PRODUCT<a/></li>
<li><a href="Updateproduct.php">Update product</a></li>
</ul>
</td></tr>
<tr><td class=dropdown><a href="super.php"> SUPERVISOR</a><hr>
<ul><li> <a href="superlogin.php"> Login status of Supervisor<a/></li>
<li> <a href="addsupervisor.php"> Add Supervisor<a/></li>
<li><a href="updatesupervisor.php"> Update Supervisor<a/> </li></ul></td></tr>
<tr><td class=dropdown><a href="salesman.php">SALESMAN </a><hr>
<ul><li> <a href="addsale.php"> Add Salesman<a/></li>
<li><a href="Updatesale1.php"> Update Salesman<a/> </li></ul></td>
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
include_once '../connect.php';
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
<th> update </th>
</tr>  
<?php  
 $i=0;
while ($row= oci_fetch_array($query,OCI_RETURN_NULLS+OCI_ASSOC) )
{
	?>
 <tr>
<td><?php echo $row["NAME"]; ?></td>
<?php $ID=$row["ID"] ;?>
<td><?php echo $row["ID"]; ?></td>
<td align="center";><?php echo $row["NO_OF_SALESMAN"]; ?></td>
<td><?php echo $row["PHONE_NUMBER"]; ?></td>
<?php  $q1="select * from table_supervisor where password='".$ID."'";
$query1=oci_parse($connection,$q1);
$result1=oci_execute($query1);
while($row1= oci_fetch_array($query1,OCI_RETURN_NULLS+OCI_ASSOC))
$status=$row1["STATUS"];?>
<td ID="NEW"  ><a  href="ateam.php?id=<?php echo $row["ID"];?>">SEE TEAM MEMBERS</a></td>
<td ID="NEW"  ><a  href="updatesupervisorphp.php?ID=<?php echo $row["ID"];?>">UPDATE</a></td>
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
<div id="ent">
<h2 class=add> Click To Add Supervisor <a id="entry" href="addsupervisor.php">New Entry</a></h2>
</div>
</div>
</div>
</body>
</html>