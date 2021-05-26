<?php
$val= $_GET["PID"];
session_start();
if($_SESSION['username'])
{
	$super= $_SESSION['username'];
}
include_once '../connect.php';
$q="select * from product where product_number=".$val;
$query=oci_parse($connection,$q);
$result=oci_execute($query);
$row=oci_fetch_array($query);

if(!$row)
{
	echo '<script type="text/javascript">alert("Id Mentioned is nor registered. Please Add This Id To your Team First.");window.location.href="updateproduct.php";</script>';
}
?>					
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>Update product</title>
    <link rel="stylesheet" href="../addsalesman.css">
  </head>
  <body>
<form class="box" action="updateproductprocess.php" method="post"autocomplete="off" >
  <h1>Product Details</h1>
  <input pattern="[a-zA-Z\s]+" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ?'':'Please enter on alphabets only.');" type="text" name="product_name" value="<?php echo $row["PRODUCT_NAME"] ?>">
 <!-- <input type="email" name="" oninvalid="setCustomValidity('not correct mail')"  placeholder="Email">-->
 <!-- <input placeholder="Birthday" class="textbox-n" type="text" onfocus="(this.type='date')" id="date"> -->
   <!-- <select id="gender">
  <option value="volvo">Gender</option>
  <option value="saab">Male</option>
  <option value="mercedes">Female</option>
  <option value="audi">Other</option>
</select> --> 
  <h1>Other Details</h1>
  <P style="color:#e39dbc;" > PRODUCT NUMBER</P>  <input placeholder="product_number" name="product_number" type="text"  pattern="[0-9]+" oninvalid="setCustomValidity('not a valid year ')" id="ox"  value="<?php echo $row["PRODUCT_NUMBER"] ?>">
<P style="color:#e39dbc;"> SELLING PRICE</P>    <input pattern="[0-9]+" type="text" id = "ox" name="selling_price"  value="<?php echo $row["SELLING_PRICE"] ?>"oninvalid="setCustomValidity('not a valid ID Enter  digit number.')">
  <input placeholder="Manufactured Date" class="date" type="text-n"  onfocus="(this.type='date')" name="manuf_date" id="date" value="<?php echo $row["MANUF_DATE"] ?>">
  </br><input type="submit" name="submit" value="UPDATE">
  <input type="reset" value="Reset">
</form>
  </body>
</html>