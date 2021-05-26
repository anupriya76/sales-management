<?php
	include_once 'connect.php';
	if (isset($_POST["submit"]))
	{	
	$query = oci_parse($connection, "DELETE FROM salesman WHERE salesman_number='" . $_POST["value"] . "'");
	$result = oci_execute($query);	
	if($result)  
	{  
		oci_commit($connection); 
		echo '<script type="text/javascript">alert("Entry Deleted Successfully");window.location.href="team.php";</script>';
	}
	else{
		echo "Error.";
	}
	}
?>