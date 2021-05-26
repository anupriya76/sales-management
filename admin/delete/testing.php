<?php
SESSION_START();
$conn = oci_connect('experiment','experiment','localhost/anupriya');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$q="select name,salesman_number,state,city,pincode,salary,phone_number,products_saled from salesman where id='".$_SESSION['password']."'";
$stid = oci_parse($conn,$q );
oci_execute($stid);
print "<table border='2' class=table >";
print '<th> Name </th>';
print '<th> ID </th>';
print '<th> State </th>';
print '<th> City</th>';
print '<th>Pincode </th>';
print '<th> Salary </th>';
print '<th> Mobile </th>';
print '<th> Products Sold </th>';
print '<th> Action</th>';
while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
	PRINT '<tr>';
    echo '<td>'.$row['NAME'].'</td>';
    echo '<td>'.$row['SALESMAN_NUMBER']."</td>"; 
	echo '<td>'.$row['STATE']."</td>";
	echo '<td>'.$row['CITY']."</td>";
	echo '<td>'.$row['PINCODE']."</td>";
	echo '<td>'.$row['SALARY']."</td>";
	echo '<td>'.$row['PHONE_NUMBER']."</td>";
	echo '<td>'.$row['PRODUCTS_SALED']."</td>";
	echo '<td><a href="updatesalesmanphp.php?id=<?php echo $row["salesman_number"];?>">Edit</a></td>';
    unset($row); 
	PRINT '</tr>';
}
print '</table>';
oci_free_statement($stid);
oci_close($conn);

?>