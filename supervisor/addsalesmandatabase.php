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
				
				if($_SESSION['username']){
				
				$welcome=$_SESSION['password'];
				}
				if($welcome==$id)
				{
					$q="SELECT * from salesman where salesman_number=".$salesman_number."";
					
					
					$query=oci_parse($connection,$q);
					$result=oci_execute($query);
					
					$nrows = oci_fetch_all($query,$result);
					
					if($nrows>0)
					{
						echo '<script type="text/javascript">alert("This entry is alreday registered please check entered details");window.location.href="addsalesman.php";</script>';
					}
					else{
					
						echo "you can enter this entry into database";
						   $q="insert into salesman (name,phone_number,state,city,pincode,id,salesman_number,salary) values('".$name."',".$phone_number.",'".$state."','".$city."',".$pincode.",'".$id."',".$salesman_number.",".$salary.")";
						   $query=oci_parse($connection,$q);
						   $result=oci_execute($query); 
						   oci_commit($connection);
						   echo $result;
							if($result)
							{
								 echo '<script type="text/javascript">alert("Entry Inserted");window.location.href="dashboardsupervisor.php";</script>';
								 $q="update supervisor set no_of_salesman=(select count(salesman_number) from salesman where id='".$_SESSION["password"]."') where id='".$_SESSION["password"];
								 $query=oci_parse($connection,$q);
								$result=oci_execute($query); 
								oci_commit($connection);
								echo $result;
							}
					 }
				}
				else{
					echo '<script type="text/javascript">alert("Please check supervisor ID You entered is inncorect and Re-enter");window.location.href="addsalesman.php";</script>';
				}
			}
	}

?>