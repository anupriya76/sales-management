

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
<tr><td class=dropdown><a href="detail.php"> Your details</a><hr></tr>
<tr><td class=dropdown><a href="detailproduct.php">Products sold </a><hr></tr>
<tr><td class=dropdown><a href="order.php"> Add order</a><hr></tr>
</table>
</div>
</div>
<div class=right>
<a id="icon" href="order.php" ><i class="fas fa-arrow-alt-circle-left"> click to back</i></a>
<div class=welcome>
<?php 
SESSION_START();
if($_SESSION['username']){	
echo ' <h1 id="heading">  Welcome '. $_SESSION['username'].'</h1>';
}
echo '';
?>
<a id="icon2" href=new.php><i class="fas fa-sync-alt"> click to refresh</i></a>
<h2 >UPDATE ANY RECORD </h2>
</div>

<?php  
include_once 'connect.php';
$strSQL="select *  from product WHERE PRODUCT_NUMBER=".$_GET["ORD"];  
$objParse = oci_parse($connection, $strSQL);  
$result=oci_execute ($objParse);  
?>  
<table class="table">  
<caption>  PLACE ORDER HERE </caption>
<thead>
<tr>  
<th scope="col"> <div align="center">PID  </div></th>  
<th scope="col"> <div align="center">NAME </div></th>  
<th scope="col"> <div align="center"> SELLING PRICE</div></th>  
<th scope="col"> <div align="center"> MANUF.DATE</div></th>  
<th scope="col"> <div align="center"> OrderDATE</div></th>
<th scope="col"> <div align="center"> Time</div></th>
<th scope="col"> <div align="center"> Quantity</div></th>
</tr>
</thead>
<tbody>
<?php  
 $i=0;
 $orderdate = date("d-M-Y");
 $ordertime=date("H:i:s");	
while ($row= oci_fetch_array($objParse,OCI_RETURN_NULLS+OCI_ASSOC))
{
	?>
	 <tr>
 <?php  $pid=$row["PRODUCT_NUMBER"];?>
<td ><form action="hello.php" method='post'><input id='quan' type='text' value='<?php echo $row["PRODUCT_NUMBER"]; ?>' name='pid' readonly></td>
<td><?php echo $row["PRODUCT_NAME"]; ?></td>
<td><div align="center"><?php echo $row["SELLING_PRICE"]; ?></div></td>
<td><?php echo $row["MANUF_DATE"]; ?></td>
<td><?php echo $orderdate; ?></td>
<td><?php echo $ordertime; ?></td>
<td> <input id='quan' type="number" min='1' max='100' step='1' placeholder='0' name='quant'></td>  
</tr>
<?php
}
?> 
</tbody>
</table>
</br>
<input id='submit'type='submit' name=submit > </form>
<?php  
oci_free_statement($objParse);
oci_close($connection);  
?>  
</div>
</div>
</body>  
</html>
