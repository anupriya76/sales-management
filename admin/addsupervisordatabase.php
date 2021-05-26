	<?php
	session_start();
	
date_default_timezone_set('Asia/Kolkata');
include_once '../connect.php';

	if (isset($_POST["submit"]))
	{
		if( empty($_POST["name"]) || empty($_POST["id"])|| empty($_POST["phone_number"])|| empty($_POST["no_of_salesman"]))
			{
				echo '<script type="text/javascript">alert("Please Enter All The Fields Press OK to Continue");window.location.href="addsupervisor.php";</script>';
			}
			else
			{
				$name=$_POST["name"];
				$phone_number=$_POST["phone_number"];
				
				$id=$_POST["id"];
				$no_of_salesman=$_POST["no_of_salesman"];	
				echo "you can enter this entry into database";
			   $q="insert into supervisor (name,phone_number,id,no_of_salesman) values('".$name."',".$phone_number.",'".$id."',".$no_of_salesman.")";
				$query=oci_parse($connection,$q);
				$result=oci_execute($query); 
				oci_commit($connection);
				echo $result;
				if($result)
				{
					echo '<script type="text/javascript">alert("Entry Inserted"); window.location.href="dashboardadmin.php";</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Please check supervisor ID You entered is inncorect and Re-enter");window.location.href="addsupervisor.php";</script>';
				}
			}
	}

?>