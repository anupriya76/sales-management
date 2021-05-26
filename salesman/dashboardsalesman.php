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
<li><img src="cap.png"></li><li><h3>SALES MANAGEMENT</h3></li>
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
<div class="right">
<a id="icon" href="dashboardsalesman.php" ><i class="fas fa-arrow-alt-circle-left"> click to go Home</i></a>
<p id="sold"><?php 
if($_SESSION['username']){
	?>
Welcome <?php echo $_SESSION['username'];} ?> <a id="icon2" href=dashboardsalesman.php><i class="fas fa-sync-alt"> click to refresh</i></a> </p>
</div>
<div class="right1">
<p align="center";> DASHBOARD</p>
</div>
<div class="right2">
<div id="counter">
<?php 
include_once 'connect.php';
$q="select * from table_salesman where password=" .$_SESSION['password'];
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
 ?><br><br></br></br></br>
 <p align='center';> Salesman Dashboard </p>

</div>

</div>
</div>
<a class="button" href="../logout.php"><div id="logout">  logout</div> </a>
</body>
</html>