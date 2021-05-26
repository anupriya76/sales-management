<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css"crossorigin="anonymous">
<link rel="stylesheet" href="../dashboardadmin.css" type="text/css">

</head>
<body>
<div class="main">
<div class="left">
<div>
<ul>
<li><img src="../images/cap.png"></li><li><h3>SALES MANAGEMENT</h3></li>
</ul>
</div>
<br><br><br><br>
<hr>
<div id="menu">
<table>
<tr><td class=dropdown><a > PRODUCTS</a><hr>
<ul>
<li><a href="addproduct.php"> Add product<a/></li><hr>

<li><a href="Updateproduct.php">Update product<a/></li><hr>
</ul>
</td>
</tr>
<tr><td class=dropdown><a href="super.php"> SUPERVISOR</a><hr>
<ul><li> <a href="superlogin.php"> Login status of supervisor<a/></li><hr>
<li> <a href="addsupervisor.php"> Add supervisor<a/></li><hr>
<li><a href="updatesupervisor.php"> Update supervisor<a/> </li><hr>
</ul>
</td>
</tr>
<tr><td class=dropdown><a href="salesman.php">SALESMAN </a><hr>
<ul><li> <a href="salelogin1.php"> Login status of salesman<a/></li>
<hr>
<ul><li> <a href="addsale.php"> Add salesman<a/></li><hr>
<li><a href="Updatesale.php">Update salesman<a/> </li><hr></ul></td>
</tr>
<tr><td class=dropdown><a> PERFORMANCE</a><hr>
<ul>
<li> <a href="pp.php"> Based on product</a></li>
<hr>
<li><a href="ps.php" >Based on salesman</a> </li><hr>
</ul >
</td>
  </tr>
</table>
</div>
</div>
<div class="right">
<a id="icon" href="dashboardadmin.php" ><i class="fas fa-arrow-alt-circle-left"> click to go Home</i></a>
<p id="sold"><?php 
if($_SESSION['username']){
	?>
Welcome <?php echo $_SESSION['username'];}?><a id="icon2" href=dashboardadmin.php><i class="fas fa-sync-alt"> click to refresh</i></a> </p>
</div>
<div class="right1">
<p align="center";> DASHBOARD</p>
</div>
<div class="right2">
<div id="counter">
<?php 
include_once 'dashboardadmin.php';
include_once '../connect.php';
$q="select * from table_admin where password='" .$_SESSION['password']."'";

$p=oci_parse($connection,$q);
$r=oci_execute($p);

while ($row= oci_fetch_array($p,OCI_RETURN_NULLS+OCI_ASSOC))
{
	$date=  $row["LOGINDATE"];
	$time= $row["LOGINTIME"];
}
echo "<div class='value1'> <strong>This page was  loaded last time on " .$date."</br></br> </div>";
echo "<div class=value> At timing  ".$time."..</div> ";

/* $handle = fopen("counter.txt", "r");
 if(!$handle){
	 echo "could not open the file" ; 
	 } 
 else { 
 $counter = ( int ) fread ($handle,20) ;
 fclose ($handle) ;
 $counter++ ;
 echo "<div class=value> <strong>This page is loaded " ;
 echo $counter. " times.." ;
 echo "</strong> </div>";
 $handle = fopen("counter.txt", "w" ) ;
 fwrite($handle,$counter) ;
 fclose ($handle) ;
 }  */
?>
</div>
</div>
</div>
<a class="button" href="../logout.php"><div id="logout">  logout</div> </a>
</body>
</html>