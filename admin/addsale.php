					
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Salesman</title>
    <link rel="stylesheet" href="../addsalesman.css">
  </head>
  <body>
<form class="box" action="addsaledatabase.php" method="post"autocomplete="off" >
  <h1>Salesman Details</h1>
  <input pattern="[a-zA-Z\s]+" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ?'':'Please enter on alphabets only.');" type="text" name="name" placeholder="Name">

 <!-- <input type="email" name="" oninvalid="setCustomValidity('not correct mail')"  placeholder="Email">-->
  <input pattern="\d{10}" id="no"  type="text" name="phone_number" oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid?'':'Please enter 10 numbers only. ');"  placeholder="Phone_Number">
 <!-- <input placeholder="Birthday" class="textbox-n" type="text" onfocus="(this.type='date')" id="date"> -->
   <!-- <select id="gender">
  <option value="volvo">Gender</option>
  <option value="saab">Male</option>
  <option value="mercedes">Female</option>
  <option value="audi">Other</option>
</select> --> 
  <input type="text" name="state" id="ox" placeholder="State">
  <input type="text" name="city" id="ox" placeholder="City">
  <input type="text" name="pincode" id="ox" placeholder="Pincode"> 
  <h1>Other Details</h1>
  <input pattern="[a-zA-Z0-9]+" type="text" id="px" name="id"  placeholder="Supervisor ID">
<!--   <input placeholder="salesman_number"  type="text"  pattern="\d{4}" maxlength="4" oninvalid="setCustomValidity('not a valid year ')" id="ox"> -->
   <input pattern="\d{4}" type="text" id = "ox" name="salesman_number" placeholder="Salesman_number" oninvalid="setCustomValidity('not a valid ID Enter 4 digit number.')" ></input>
 <input  type="text"  placeholder="Salesman Salary" name="salary" oninvalid="setCustomValidity('not a valid')" ></input>
  <input type="submit" name="submit" value="ADD">
  <input type="reset" value="Reset">
</form>
  </body>
</html>
