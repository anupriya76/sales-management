<?php
session_start();
?>
<html>
<head>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="../teamsup1.css" type="text/css">
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
<tr><a href="addsalesman.php"> Add New Salesman</a><hr></tr>
<tr><a href="deletesalesman.php">Login Access of Salesman </a><hr></tr>
<tr><a href="updatesalesman.php">Update Record</a><hr></tr>
<tr><a href="productsold.php">Details of Products Sold </a><hr></tr>

</table>
</div>
</div>
<div class=right>
<a id="icon" href="dashboardsupervisor.php" ><i class="fas fa-arrow-alt-circle-left"> click to go Home</i></a>
<div class=welcome>

<?php 
if($_SESSION['username']){	
echo ' <h1 id="heading">  Welcome '. $_SESSION['username'].'</h1>';
}
echo '';
?>
<a id="icon2" href=team.php><i class="fas fa-sync-alt"> click to refresh</i></a>
<h2 id="your"> Your Team </h2>
</div>

<?php
include_once '../connect.php';

$q="select upper(name),upper(salesman_number),upper(state),upper(city),upper(pincode),upper(salary),phone_number from salesman where id='".$_SESSION['password']."'";
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
?>
</div>
</div>
</body>
</html>