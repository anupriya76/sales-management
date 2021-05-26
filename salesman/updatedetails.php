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
<div class=right>
<a id="icon" href="detail.php" ><i class="fas fa-arrow-alt-circle-left"> click to back</i></a>
<div class=welcome>
<?php 
SESSION_START();
if($_SESSION['username']){	
echo ' <h1 id="heading">  Welcome '. $_SESSION['username'].'</h1>';
}
echo '';
?>
<a id="icon2" href=updatedetails.php><i class="fas fa-sync-alt"> click to refresh</i></a>
<h2 >UPDATE ANY RECORD </h2>
</div>

<?php  
include_once 'connect.php';
$strSQL="select name,salesman_number, state,city,pincode,salary,phone_number   from salesman where salesman_number='".$_SESSION['password']."'";  
$objParse = oci_parse($connection, $strSQL);  
$result=oci_execute ($objParse);  
?>  
<table class="table">  
<tr>  
<th > <div align="center">ID  </div></th>  
<th > <div align="center">NAME </div></th>  
<th> <div align="center"> STATE</div></th>  
<th> <div align="center">  CITY</div></th>  
<th> <div align="center"> PINCODE</div></th>  
<th> <div align="center"> SALARY</div></th> 
 <th> <div align="center"> MOBILE NUMBER</div></th> 
<th> <div align="center"> ACTION</div></th> 

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
<td class="edit"><a href="updatedetailsphp.php?ID=<?php echo $row["SALESMAN_NUMBER"];?>">Edit</a></td>


</TR>
<?php
}
?> 
</table>
</br>

<div id="o">
<h2 id="inst">Click On Edit  To Update </h2>
</div>

<?php  
oci_free_statement($objParse);
oci_close($connection);  
?>  
</div>
</div>
</body>  
</html> 