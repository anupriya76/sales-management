<html>  
<head>  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="teamsup1.css" type="text/css">
<title>update salesman</title>  
</head>  
<body> 
<div class="main">
<div class=left>
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
<li><a href="Updateproduct.php">Update product</a></li>
</ul>
</td></tr>
<tr><td class=dropdown><a href="super.php"> SUPERVISOR</a><hr>
<ul><li> <a href="superlogin.php"> Login status of Supervisor<a/></li>
<li> <a href="addsupervisor.php"> Add Supervisor<a/></li>
<li><a href="updatesupervisor.php"> Update Supervisor<a/> </li></ul></td></tr>
<tr><td class=dropdown><a href="salesman.php">SALESMAN </a><hr>
<ul><li> <a href="salelogin.php"> Login status of Salesman<a/></li>
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
<a id="icon" href="team.php" ><i class="fas fa-arrow-alt-circle-left"> click to back</i></a>
<div class=welcome>
<?php 
SESSION_START();
if($_SESSION['username']){	
echo ' <h1 id="heading">  Welcome '. $_SESSION['username'].'</h1>';
}
echo '';
?>
<a id="icon2" href=updatesalesman.php><i class="fas fa-sync-alt"> click to refresh</i></a>
<h2 >UPDATE ANY RECORD </h2>
</div>
<?php  
include_once 'connect.php';
$strSQL="select name,salesman_number, state,city,pincode,salary,phone_number   from salesman";  
$objParse = oci_parse($connection, $strSQL);  
$result=oci_execute ($objParse);  
?>  
<table border='1' class="table">  
<tr>  
<th > <div align="center">USERID  </div></th>  
<th > <div align="center">NAME </div></th>  
<th> <div align="center"> STATE</div></th>  
<th> <div align="center">  CITY</div></th>  
<th> <div align="center"> PINCODE</div></th>  
<th> <div align="center"> SALARY</div></th> 
 <th> <div align="center"> MOBILE NUMBER</div></th> 
 <th> ACTION</th>
</tr>  
<?php  
 $i=0;
while ($row= oci_fetch_array($objParse,OCI_RETURN_NULLS+OCI_ASSOC))
{
	?>
 <tr>
 <?php $ID=$row["SALESMAN_NUMBER"] ;?>
<td><?php echo $row["SALESMAN_NUMBER"]; ?></td>
<td><?php echo $row["NAME"]; ?></td>
<td><?php echo $row["STATE"]; ?></td>
<td><?php echo $row["CITY"]; ?></td>
<td><?php echo $row["PINCODE"]; ?></td>
<td><?php echo $row["SALARY"]; ?></td>
<td><?php echo $row["PHONE_NUMBER"]; ?></td>
<?php  $q1="select * from table_salesman where password='".$ID."'";
$query1=oci_parse($connection,$q1);
$result1=oci_execute($query1);
while($row1= oci_fetch_array($query1,OCI_RETURN_NULLS+OCI_ASSOC))
$status=$row1["STATUS"];?>
<td id='stat'><?php
if(($status)=='active')
{
?>
<a id='act' href="action1.php?USERID=<?php echo $row['SALESMAN_NUMBER'];?>" 
  onclick="return confirm('You Want TO Deactivate <?php echo $row["NAME"];?> Login');"> Deactivate </a>
<?php
}
if(($status)=='deactive')
{
?>
<a  id='deact'  href="action1.php?USERID=<?php echo $row['SALESMAN_NUMBER'];?>" 
onclick="return confirm(' You Want To Activate <?php echo $row["NAME"];?> Login');"> Activate</a>
<?php
}

?>
</td>

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