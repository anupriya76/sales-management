	<?php
	session_start();
	
date_default_timezone_set('Asia/Kolkata');
include_once '../connect.php';

	if (isset($_POST["submit"]))
	{
		if( empty($_POST["name"]) || empty($_POST["id"])|| empty($_POST["phone_number"]))
			{
				
					echo '<script type="text/javascript">alert("Please Enter All The Fields Press OK to Continue");window.location.href="updatesupervisor.php";</script>';
			}
			else
			{
				$name=$_POST["name"];
				$phone_number=$_POST["phone_number"];
				$state=$_POST["no_of_salesman"];
				$id=$_POST["id"];
				
				$q= "update supervisor set name='".$_POST['name']."', phone_number=".$_POST["phone_number"].",ID='".$_POST['id']."',no_of_salesman=".$_POST["no_of_salesman"]."WHERE ID='".$_POST["id"]."'";
				$query=oci_parse($connection,$q);
				$result=oci_execute($query);
				if($result)
				{
					echo '<script type="text/javascript">alert("Entry Updated.");window.location.href="super.php";</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Can not update. May be samething missing please check again.");</script>';

				}
					
			}
	}