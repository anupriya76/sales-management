<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="../dashboardsupervisor.css" type="text/css">
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
<tr><a href="team.php"> Your Salesman Team</a><hr>

</tr>

<tr><a href="productsold.php">Details of Products Sold </a><hr></tr>

<tr><td class=dropdown><a> Performance</a><hr>
<ul>
 <li> <a href="performanceproduct.php"> Based on product</a></li>
 <hr>
<li><a href="performancesalesman.php" >Based on Salesman</a></li><hr>
</ul >
</td>
  </tr>
</table>
</div>
</div>
<div class="right">
<p><?php 

if($_SESSION['username']){
	?>
welcome <?php echo $_SESSION['username'];}?></p>
</div>
<div class="right1">
<p> DASHBOARD</p>

</div>
<div class="right2">

<div id="counter">

<?php

include_once '../connect.php';
$q="select * from table_supervisor where password='" .$_SESSION['password']."'";
$p=oci_parse($connection,$q);
$r=oci_execute($p);

while ($row= oci_fetch_array($p,OCI_RETURN_NULLS+OCI_ASSOC))
{
	$date=  $row["LOGINDATE"];
	$time= $row["LOGINTIME"];
}
echo "<div class='value1'> <strong>This page was  loaded last time on " .$date."</br></br> </div>";
echo "<div class=value1> At timing  ".$time."..</div> ";
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
</div >


</div>
<a class="button" href="../logout.php"><div id="logout">  logout</div> </a>
</body>
</html>