	<?php
	session_start();
date_default_timezone_set('Asia/Kolkata');
include_once '../connect.php';
	if (isset($_POST["submit"]))
	{
		if( empty($_POST["name"]) || empty($_POST["id"])|| empty($_POST["phone_number"])|| empty($_POST["state"])|| empty($_POST["city"])|| empty($_POST["pincode"])|| empty($_POST["salary"])|| empty($_POST["salesman_number"]) )
			{
				
			   echo '<script type="text/javascript">alert("Please Enter All The Fields Press OK to Continue");window.location.href="addsalesman.php";</script>';
			}
			else
			{
				$name=$_POST["name"];
				$phone_number=$_POST["phone_number"];
				$state=$_POST["state"];
				$city=$_POST["city"];
				$pincode=$_POST["pincode"];
				$id=$_POST["id"];
				$salesman_number=$_POST["salesman_number"];
				$salary=$_POST["salary"];
				$q1= "update table_salesman set username='".$_POST['name']."'WHERE password=".$_POST["salesman_number"];
				$query1=oci_parse($connection,$q1);
				$result1=oci_execute($query1);
				$q= "update salesman set name='".$_POST['name']."', phone_number=".$_POST["phone_number"].",state='".$_POST["state"]."',city='".$_POST["city"]."',pincode=".$_POST["pincode"].",salesman_number=".$_POST["salesman_number"].",salary=".$_POST["salary"]."WHERE salesman_number=".$_POST["salesman_number"];
				$query=oci_parse($connection,$q);
				$result=oci_execute($query);
				oci_commit($connection);
				if($result)
				{
					echo '<script type="text/javascript">alert("Entry Updated.");window.location.href="team.php";</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Can not update. May be samething missing please check again.");window.location.href="updatesalesmanphp.php";</script>';
				}
					
			}
	}