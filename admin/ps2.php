<?php
$val=$_GET["SALESMAN"];

session_start();
?>
<html>
<head>
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
<ul><li> <a href="addsupervisor.php"> Add Supervisor<a/></li>
<li><a href="updatesupervisor.php"> Update Supervisor<a/> </li></ul></td></tr>
<tr><td class=dropdown><a href="salesman.php">SALESMAN </a><hr>
<ul><li> <a href="addsale.php"> Add Salesman<a/></li>
<li><a href="Updatesale.php"> Update Salesman<a/> </li></ul></td>
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
Welcome <?php echo $_SESSION['username'];}?></p>
</div>
<div class="right1">
<h2 align="center"> Detail Of salesman</h2>
</div>
<div class="right2">
<?php  

include_once '../connect.php';
$strSQL="SELECT * FROM salesman WHERE salesman_number=".$val;
$objParse = oci_parse($connection, $strSQL);  
$result=oci_execute ($objParse); 

?>  
<table border="1" class="table">  
<tr>  
<th> Name</th>
<th> salesman Number</th>
<th > Phone number</th>  
<th>  City</th> 
 <th>SUPERVISOR ID</th> 

</tr> 
<?php  
while ($row= oci_fetch_array($objParse,OCI_RETURN_NULLS+OCI_ASSOC) )
{
	?>
 <tr>
 <td> <?php echo $row["NAME"]; ?></td>
<td><?php echo $row["SALESMAN_NUMBER"]; ?></td>
<td><?php echo $row["PHONE_NUMBER"]; ?></td>
<td><?php echo $row["CITY"]; ?></td>

<td><?php echo $row["ID"]; ?></td>
</TR>
<?php
}
?> 
</table>
</br>
<?php  

oci_free_statement($objParse);
oci_close($connection);  
?>  
</div>
</div>
</body>  
</html> 				