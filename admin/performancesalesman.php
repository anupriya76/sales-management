<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">

<link rel="stylesheet" href="../dashboardsupervisor.css" type="text/css">

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
<tr><a href="team.php"> Your Salesman Team</a><hr></tr>
<tr><a href="productsold.php">Details of Products Sold </a><hr></tr>

<tr><td class=dropdown><a> Performance</a><hr>
<ul>
 <li> <a href="performanceproduct.php"> based on product</a></li>
 <hr>
<li><a href="performancesalesman.php" >based on Salesman</a> </li> <hr>
</ul >
</td>
  </tr>
</table>
</div>
</div>
<div class="right">

<a id="icon" href="dashboardsupervisor.php" ><i class="fas fa-arrow-alt-circle-left"> click to go Home</i></a>
<p id="sold"><?php 

if($_SESSION['username']){
	?>
Welcome <?php echo $_SESSION['username'];}?><a id="icon2" href=team.php><i class="fas fa-sync-alt"> click to refresh</i></a> </p>

</div>
<div class="right1">
<h2 align="center"> Details Of Products Sold</h2>

</div>
<div class="right2">
<?php  
include_once 'connect.php';

$strSQL="SELECT salesman_number,sum(quantity) as quantity
FROM product_order
WHERE salesman_number IN (
  SELECT salesman_number
  FROM salesman
  WHERE id='".$_SESSION['password']."') group by salesman_number";
$objParse = oci_parse($connection, $strSQL);  
$result=oci_execute ($objParse); 

?>  
<table border="1" class="producttable">  
<tr>  
 
<th > SALESMAN NUMBER</th>  
 
<th>  QUANTITY</th>  

</tr> 
<?php  
while ($row= oci_fetch_array($objParse,OCI_RETURN_NULLS+OCI_ASSOC) )
{
	?>
 <tr>

<td><?php echo $row["SALESMAN_NUMBER"]; ?></td>

<td><?php echo $row["QUANTITY"]; ?></td>
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
