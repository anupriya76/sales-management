<?php
echo "helllo";
if (isset($_POST["submit"]))
{
	if( empty($_POST["msg"]))
	{
		echo '<script type="text/javascript">alert("Your mssage is Not Placed. Please Try Again Later.");window.location.href="dashboardsalesman.php"; </script>';
	}
	else{
		
		echo "values entered";
		$message= $_POST["msg"];
		echo $message;
		header( "Location:dashboardsupervisor.php?mess=$message" );
	}

}
?>