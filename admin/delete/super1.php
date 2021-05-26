<?php
echo "hello";
include_once 'connect.php';
$q="select id from supervisor ";
		$parse=oci_parse($connection,$q);
		oci_execute($parse);
		while ($row=oci_fetch_array($parse,OCI_RETURN_NULLS+OCI_ASSOC))
		{
			$q1="update supervisor set no_of_salesman=(select count(salesman_number) from salesman where ID='".$row["ID"]."') where id='".$row["ID"]."'";
			$par=oci_parse($connection,$q1);
			$result=oci_execute($par);
		}
		header('location:super.php');
?>