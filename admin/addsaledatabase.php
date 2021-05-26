	<?php
	session_start();
	
date_default_timezone_set('Asia/Kolkata');
include_once '../connect.php';

	if (isset($_POST["submit"]))
	{
		if( empty($_POST["name"]) || empty($_POST["id"])|| empty($_POST["phone_number"])|| empty($_POST["state"])|| empty($_POST["city"])|| empty($_POST["pincode"])|| empty($_POST["salary"])|| empty($_POST["salesman_number"]) )
			{				
					echo '<script type="text/javascript">alert("Please Enter All The Fields Press OK to Continue");window.location.href="addsale.php";</script>';
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
				$q="select * from supervisor where id='".$id."'";
				$qu=oci_parse($connection,$q);
			    $re=oci_execute($qu);
				$nrow = oci_fetch_all($qu,$re);
				if($nrow>0)
				{
					$q="SELECT * from salesman where salesman_number=".$salesman_number."";
					
					
					$query=oci_parse($connection,$q);
					$result=oci_execute($query);
					
					$nrows = oci_fetch_all($query,$result);
					
					if($nrows>0)
					{
						echo '<script type="text/javascript">alert("This entry is alreday registered please check entered details");window.location.href="addsale.php";</script>';
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
								$q="update supervisor set no_of_salesman=(select count(salesman_number) from salesman where id='".$id."') where id='".$id."'";
								 $query=oci_parse($connection,$q);
								$result=oci_execute($query); 
								oci_commit($connection);
								echo $result;
								 echo '<script type="text/javascript">alert("Entry Inserted");window.location.href="dashboardadmin.php";</script>';
							}
					 }
				}
				else{
					echo '<script type="text/javascript">alert("Please check supervisor ID You entered is inncorect and Re-enter");window.location.href="addsale.php";</script>';
				}
			}
	}

?>