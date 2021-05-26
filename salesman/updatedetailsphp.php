<?php
$val= $_GET["ID"];
session_start();
if($_SESSION['username'])
{
	$super= $_SESSION['username'];
}
include_once 'connect.php';
$q="select name,salesman_number,state,city,pincode,salary,phone_number,id,products_saled from salesman where salesman_number=".$val;
$query=oci_parse($connection,$q);
$result=oci_execute($query);
$row=oci_fetch_array($query);

if(!$row)
{
	echo '<script type="text/javascript">alert("Id Mentioned is nor registered. Please Add This Id To your Team First.");window.location.href="updatedetails.php";</script>';
}
?>					
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>Update Salesman</title>
    <link rel="stylesheet" href="../addsalesman.css">
  </head>
  <body>
<form class="box" action="updatedetailprocess.php" method="post"autocomplete="off" >
  <h1>Salesman Details</h1>
  <input pattern="[a-zA-Z\s]+" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ?'':'Please enter on alphabets only.');" type="text" name="name" value="<?php echo $row["NAME"] ?>">

 <!-- <input type="email" name="" oninvalid="setCustomValidity('not correct mail')"  placeholder="Email">-->
  <input pattern="\d{10}" id="no"  type="text" name="phone_number" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid?'':'Please enter 10 numbers only. ');"   value="<?php echo $row["PHONE_NUMBER"] ?>"></input>
 
 <!-- <input placeholder="Birthday" class="textbox-n" type="text" onfocus="(this.type='date')" id="date"> -->
   <!-- <select id="gender">
  <option value="volvo">Gender</option>
  <option value="saab">Male</option>
  <option value="mercedes">Female</option>
  <option value="audi">Other</option>
</select> --> 
  <input type="text" name="state" id="ox"  value="<?php echo $row["STATE"] ?>">
  <input type="text" name="city" id="ox" value="<?php echo $row["CITY"] ?>">
  <input type="text" name="pincode" id="ox" value="<?php echo $row["PINCODE"] ?>"> 
  <h1>Other Details</h1>
  <input pattern="[a-zA-Z0-9]+" type="text" id="px" name="id"   value="<?php echo $row["ID"] ?>" readonly></input>
<!--   <input placeholder="salesman_number"  type="text"  pattern="\d{4}" maxlength="4" oninvalid="setCustomValidity('not a valid year ')" id="ox"> -->
   <input pattern="\d{4}" type="text" id = "ox" name="salesman_number"  value="<?php echo $row["SALESMAN_NUMBER"] ?>"oninvalid="setCustomValidity('not a valid ID Enter 4 digit number.')" readonly>
 <input  type="text"  value="<?php echo $row["SALARY"] ?>" name="salary" oninvalid="setCustomValidity('not a valid')" readonly >
  
  </br><input type="submit" name="submit" value="UPDATE">
  <input type="reset" value="Reset">
</form>
  </body>
</html>


