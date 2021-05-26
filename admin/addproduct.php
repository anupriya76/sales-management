<?php
include_once '../connect.php';
$q="select max(product_number) as pn from product";
$parse=oci_parse($connection,$q);
$exe=oci_execute($parse);
$row= oci_fetch_array($parse);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Product</title>
	<link rel="stylesheet" href="../addsalesman.css">
  </head>
  <body>
<form class="box" action="addproductdatabase.php" method="post"autocomplete="off" >
  <h1>Product Details</h1>
  <input pattern="[a-zA-Z\s]+" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ?'':'Please enter on alphabets only.');" type="text" name="name" placeholder="Name">
 <!-- <input type="email" name="" oninvalid="setCustomValidity('not correct mail')"  placeholder="Email">-->
  <input placeholder="Manufactured Date" class="date" type="text-n"  onfocus="(this.type='date')" name="date" id="date">
   <!-- <select id="gender">
  <option value="volvo">Gender</option>
  <option value="saab">Male</option>
  <option value="mercedes">Female</option>
  <option value="audi">Other</option>
</select> --> 
  <h1>Other Details</h1>
  <input pattern="[0-9]+" type="text" id="px" name="selling_price"  placeholder="Selling Price"></input>
<!--   <input placeholder="salesman_number"  type="text"  pattern="\d{4}" maxlength="4" oninvalid="setCustomValidity('not a valid year ')" id="ox"> -->
   <input pattern="[0-9]+" type="text" id = "ox" name="product_number" placeholder="Product Number" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ?'':'Please enter digits only.');" ></input>
  <input type="submit" name="submit" value="ADD">
  <input type="reset" value="Reset">
  </body>
</html>
