<?php
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
<tr><td class=dropdown><a href="order.php">Add order</a><hr></tr>
</table>
</div>
</div>
<div class="right">

<a id="icon" href="dashboardsalesman.php" ><i class="fas fa-arrow-alt-circle-left"> click to go Home</i></a>
<p id="sold"><?php 

if($_SESSION['username']){
	?>
Welcome <?php echo $_SESSION['username'];}?><a id="icon2" href=detailproduct.php><i class="fas fa-sync-alt"> click to refresh</i></a> </p>

</div>
<div class="right1">
<h2 align="center"> Details Of Products Sold</h2>

</div>
<div class="right2">
<?php  
include_once 'connect.php';

/* "SELECT product_number,sum(quantity) as quantity 
FROM product_order
WHERE salesman_number='".$_SESSION['password']."' group by product_number"; */

$strSQL="select * from product_order where salesman_number ='".$_SESSION['password']."' order by  order_num desc ,ordertime asc ";
$objParse = oci_parse($connection, $strSQL);  
$result=oci_execute ($objParse); 

?>  
<table class="table">  
<tr>  
<th > ORDER NUMBER  </th>  
<th > PRODUCT NUMBER</th>  
<th>  QUANTITY</th>  
<th>  UNIT PRICE</th>  
<th>  ORDER DATE</th> 
<th> ORDER TIME</TH>
 <TH> TOTAL AMOUNT PAID</TH>
</tr> 
<?php 
$i=0;
while ($row= oci_fetch_array($objParse,OCI_RETURN_NULLS+OCI_ASSOC))
{
	$i++;
	
	?>
 <tr>
<td><?php echo $row["ORDER_NUM"]; ?></td>
<td><?php echo $row["PRODUCT_NUMBER"]; ?></td>
<td><?php echo $row["QUANTITY"]; ?></td>
<td><?php echo $row["UNIT_PRICE"]; ?></td>
<td><?php echo $row["ORDERDATE"]; ?></td>
<td><?php echo $row["ORDERTIME"]; ?></td>
<TD> <?PHP ECHO ($row["QUANTITY"]*$row["UNIT_PRICE"]);?> </TD>
</TR>

<?php
}
?> 
</table>
</br>
<?php 

if($i<=0)
{
	echo '<script type="text/javascript">alert("NO DATA EXIST.");</script>';
	echo "<h1 id='data'> No Product is Sold By ".$_SESSION['username'].  "</h1>";
	exit;
} 
oci_free_statement($objParse);
oci_close($connection);  
?>  
</div>
</div>
</body>  
</html> 
