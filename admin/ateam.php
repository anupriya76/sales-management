<?php
SESSION_START();
if($_SESSION['username']){	
include_once '../connect.php';
$id=$_GET["id"];
$strSQL="select * from salesman where id='".$_GET["id"]."'";
$objParse = oci_parse($connection, $strSQL);  
$result=oci_execute ($objParse); 
}
?>
<html>  
<head>  
<title>
Team-mates
</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="../teamsup1.css" type="text/css">

<title>team members of supervisor</title>  
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
<li><a href="addproduct.php"> Add product<a/></li><hr>

<li><a href="Updateproduct.php">Update product<a/></li><hr>
</ul>
</td>
</tr>
<tr><td class=dropdown><a href="super.php"> SUPERVISOR</a><hr>
<ul><li> <a href="superlogin.php"> Login status of supervisor<a/></li><hr>
<li> <a href="addsupervisor.php"> Add supervisor<a/></li><hr>
<li><a href="updatesupervisor.php"> Update supervisor<a/> </li><hr>
</ul>
</td>
</tr>
<tr><td class=dropdown><a href="salesman.php">SALESMAN </a><hr>
<ul><li> <a href="salelogin1.php"> Login status of salesman<a/></li>
<hr>
<ul><li> <a href="addsale.php"> Add salesman<a/></li><hr>
<li><a href="Updatesale.php">Update salesman<a/> </li><hr></ul></td>
</tr>
<tr><td class=dropdown><a> PERFORMANCE</a><hr>
<ul>
<li> <a href="pp.php"> Based on product</a></li>
<hr>
<li><a href="ps.php" >Based on salesman</a> </li><hr>
</ul >
</td>
  </tr>
</table>
</div>
</div>
<div class=right>
<a id="icon" href="super.php" ><i class="fas fa-arrow-alt-circle-left"> click to back</i></a>
<div class=welcome>
<?php 
echo ' <h1 id="heading">  Welcome '. $_SESSION['username'].'</h1>';
?>
<h2 >Team Members Of Selected Supervisor </h2>
</div>
<?php  
 
?>  
<table class="table">  
<tr>  
<th > <div align="center">USERID  </div></th>  
<th > <div align="center">NAME </div></th>  
<th> <div align="center"> STATE</div></th>  
<th> <div align="center">  CITY</div></th>  
<th> <div align="center"> PINCODE</div></th>  
<th> <div align="center"> SALARY</div></th> 
 <th> <div align="center"> MOBILE NUMBER</div></th> 

</tr>  
<?php  
 $i=0;
while ($row= oci_fetch_array($objParse,OCI_RETURN_NULLS+OCI_ASSOC))
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

<?php  
oci_free_statement($objParse);
oci_close($connection);  
?>  
</div>
</div>
</body>  
</html> 