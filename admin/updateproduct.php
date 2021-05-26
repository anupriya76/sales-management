<html>  
<head>  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="../teamsup1.css" type="text/css">
<title>update salesman</title>  
</head>  
<body>  
<div class="main">
<div class=left>
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
<ul><li> <a href="salelogin1.php"> Login status of Salesman<a/></li>
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
<div class=right>
<a id="icon" href="dashboardadmin.php" ><i class="fas fa-arrow-alt-circle-left"> click to back</i></a>
<div class=welcome>
<?php 
SESSION_START();
if($_SESSION['username']){	
echo ' <h1 id="heading">  Welcome '. $_SESSION['username'].'</h1>';
}
echo '';
?>
<a id="icon2" href="updateproduct.php"><i class="fas fa-sync-alt"> click to refresh</i></a>
<h2 >UPDATE ANY RECORD </h2>
</div>

<?php  
include_once '../connect.php';
$strSQL="select *  from product order by product_name desc";  
$objParse = oci_parse($connection, $strSQL);  
$result=oci_execute ($objParse);  
?>  
<table class="table">  
<tr>  
<th > <div align="center">PID  </div></th>  
<th > <div align="center">NAME </div></th>  
<th> <div align="center"> SELLING PRICE</div></th>  
<th> <div align="center">  MANUF. DATE</div></th>  

<th> <div align="center"> ACTION</div></th> 
</tr>  
<?php  
 $i=0;
while ($row= oci_fetch_array($objParse,OCI_RETURN_NULLS+OCI_ASSOC))
{
	?>
 <tr>
<td><?php echo $row["PRODUCT_NUMBER"]; ?></td>
<td><?php echo $row["PRODUCT_NAME"]; ?></td>
<td><?php echo $row["SELLING_PRICE"]; ?></td>
<td><?php echo $row["MANUF_DATE"]; ?></td>
<td class="edit"><a href="updateproductphp.php?PID=<?php echo $row["PRODUCT_NUMBER"];?>">Edit</a></td>
</TR>
<?php
}
?> 
</table>
</br>
<div id="o">
<h2 id="inst">Click On Edit Whose Record You want To Update </h2>
</div>
<?php  
oci_free_statement($objParse);
oci_close($connection);  
?>  
</div>
</div>
</body>  
</html> 