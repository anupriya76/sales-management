<?php
$val= $_GET["ID"];
session_start();

include_once '../connect.php';
$q="select * from supervisor where ID='".$val."'";
$query=oci_parse($connection,$q);
$result=oci_execute($query);
$row=oci_fetch_array($query);

if(!$row)
{
	echo '<script type="text/javascript">alert("Id Mentioned is nor registered. Please Add This Id To your Team First.");window.location.href="updatesale.php";</script>';
}
?>					
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>Update Supervisor</title>
    <link rel="stylesheet" href="../addsalesman.css">
  </head>
  <body>
<form class="box" action="updateSupervisor1.php" method="post"autocomplete="off" >
  <h1>Supervisor Details</h1>
 <input pattern="[a-zA-Z+0-9]+" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ?'':'Please enter on alphabets only.');" type="text" name="name" placeholder="Name" value="<?php echo $row["NAME"] ?>">

 <!-- <input type="email" name="" oninvalid="setCustomValidity('not correct mail')"  placeholder="Email">-->
  <input pattern="\d{10}" id="no"  type="text" name="phone_number" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid?'':'Please enter 10 numbers only. ');"  placeholder="Phone_Number" value="<?php echo $row["PHONE_NUMBER"] ?>">
 <!-- <input placeholder="Birthday" class="textbox-n" type="text" onfocus="(this.type='date')" id="date"> -->
   <!-- <select id="gender">
  <option value="volvo">Gender</option>
  <option value="saab">Male</option>
  <option value="mercedes">Female</option>
  <option value="audi">Other</option>
</select> --> 
  <input pattern="[a-zA-Z0-9]+" type="text" id="px" name="id"  placeholder="Supervisor ID" value="<?php echo $row["ID"] ?>">
<!--   <input placeholder="salesman_number"  type="text"  pattern="\d{4}" maxlength="4" oninvalid="setCustomValidity('not a valid year ')" id="ox"> -->
   <input pattern="[0-9]+" type="text" id = "ox" name="no_of_salesman" placeholder="No Of Salesman" oninvalid="setCustomValidity('not a valid...Enter digit.')"  value= "<?php echo $row["NO_OF_SALESMAN"] ?>"></input>
  <input type="submit" name="submit" value="ADD">
  <input type="reset" value="Reset">
</form>
  </body>
</html>