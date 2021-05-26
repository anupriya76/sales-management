<?php
date_default_timezone_set('Asia/Kolkata');
if (isset($_POST["submit"]))
{
	if( empty($_POST["pid"]) || empty($_POST["quant"]))
	{
		echo "values are not entered";
		echo $_POST["quant"];
		echo $_POST["pid"];
	}
	else{
		echo "values entered";
		echo $_POST["quant"];
		echo $_POST["pid"];
	}
}
 SESSION_START();
include_once 'connect.php';
$orderdate = date("d-M-Y");
 $ordertime=date("H:i:s" , time());
$q1="select * from product_order where ( product_number=".$_POST["pid"]." and salesman_number=".$_SESSION['password'].")";
echo $q1;
$query1=oci_parse($connection,$q1);
$result1=oci_execute($query1);
$i=0;
while($row1= oci_fetch_array($query1,OCI_RETURN_NULLS+OCI_ASSOC)){
	$i++;
	$name= $_POST["quant"];
}

 $q1="select * from product where product_number=".$_POST["pid"];
echo $q1;
$query1=oci_parse($connection,$q1);
$result1=oci_execute($query1);
$i=0;
while($row1= oci_fetch_array($query1,OCI_RETURN_NULLS+OCI_ASSOC)){
	$i++;
	$price= $row1["SELLING_PRICE"];
	ECHO $price;
}
$q1="select  max( order_num) as large from product_order";
echo $q1;
$query1=oci_parse($connection,$q1);
$result1=oci_execute($query1);
 while($row1= oci_fetch_array($query1,OCI_RETURN_NULLS+OCI_ASSOC)){
	 $lar=$row1["LARGE"];
	 $lar=($lar+1);
 }
 echo $lar; 
  $q="insert into product_order  values(".$lar.",".$_POST["quant"].",".$_SESSION['password'].",".$price.",".$_POST["pid"].",'".$orderdate."','".$ordertime."')";
 $query=oci_parse($connection,$q);
 $result=oci_execute($query); 
 oci_commit($connection);
echo $result;  
if($result>0)
{
	echo '<script type="text/javascript">alert("Your Order is notified to Supervisor ");window.location.href="detailproduct.php"; </script>';
}
else{
	echo '<script type="text/javascript">alert("Your Order is Not Placed. Please Try Again Later.");window.location.href="detailproduct.php"; </script>';
}
?>