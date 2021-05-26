<?php
session_start();
?>
<html>
<head>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="teamsup1.css" type="text/css">
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
<li><a href="deleteproduct.php">delete product</a></li>

</ul>
</td></tr>
<tr><td class=dropdown><a href="super.php"> SUPERVISOR</a><hr>

<ul><li> <a href="addsupervisor.php"> Add Supervisor<a/></li><li><a href="deletesupervisor.php"> Delete Supervisor<a/> </li></ul></td></tr>

<tr><td class=dropdown><a href="salesman.php">SALESMAN </a><hr>

<ul><li> <a href="addsale.php"> Add Salesman<a/></li>
<li><a href="deletesale.php"> Delete Salesman<a/> </li></ul></td>
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
<a id="icon" href="dashboardadmin.php" ><i class="fas fa-arrow-alt-circle-left"> click to back</i></a>
<div class=welcome>
<?php 
if($_SESSION['username']){	
echo ' <h1 id="heading">  Welcome '. $_SESSION['username'].'</h1>';
}
echo '';
?>
<a id="icon2" href=salesman.php><i class="fas fa-sync-alt"> click to refresh</i></a>
<h2 id="your"> Your Team </h2>
</div>

<?php
include_once 'connect.php';
$q="select name,salesman_number,state,city,pincode,salary,phone_number from salesman";
$query=oci_parse($connection,$q);
$result=oci_execute($query);

print "<table class=table >";
print '<th> Name </th>';
print '<th> ID </th>';
print '<th> State </th>';
print '<th> City</th>';
print '<th>Pincode </th>';
print '<th> Salary </th>';
print '<th> Mobile </th>';

while ($row= oci_fetch_array($query,OCI_RETURN_NULLS+OCI_ASSOC))
{
	PRINT '<tr>';
	foreach($row as $val)
	{
		print '<td>'.($val!==null ? htmlentities($val, ENT_QUOTES) : '&nbsp'). '</td>' ;
	}	
	print '</tr>';
}
print '</table>';
oci_free_statement($query);
print '<form action=deletesalephp.php method=post autocomplete="off">'; 
print '<input id="value" type="text"  name="value" palceholder="input salesman number you want to delete"></input> <input id="delete" type="submit" value="Delete" name="submit" > </input>';
print '</form>';
?>
</div>
</div>
</body>
</html>