<?php
echo"hello";
	include_once 'connect.php';
	if (isset($_POST["submit"]))
	{	
		$q="select id from salesman where salesman_number='". $_POST["value"] . "'";
		$parse=oci_parse($connection,$q);
		oci_execute($parse);
		$row=oci_fetch_array($parse,OCI_ASSOC+OCI_RETURN_NULLS);
		foreach($row as $val){
			$id= $val;
		}
		$qu="delete  from product_order where salesman_number='". $_POST["value"] . "'";
		$par=oci_parse($connection,$qu);
		$exe=oci_execute($par);
		
	$query = oci_parse($connection, "DELETE FROM salesman WHERE salesman_number='" . $_POST["value"] . "'");
	$result = oci_execute($query);	
	if($result)  
	{  
		oci_commit($connection); 
		$q="update supervisor set no_of_salesman=(select count(salesman_number) from salesman where ID='".$id."') where id='".$id."'";
		$parse=oci_parse($connection,$q);
		if(oci_execute($parse))
		{
		echo '<script type="text/javascript">alert("Entry Deleted Successfully");window.location.href="salesman.php";</script>';
		}
		else{
			print '<script type="text/javascript">alert("Some Problem Occoured.");window.location.href="salesman.php";</script>';
	}
	}
	}
	else{
		print '<script type="text/javascript">alert("Error Please Try again Later.");window.location.href="salesman.php";</script>';
	}
	
	?>