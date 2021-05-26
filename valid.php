	<?php
date_default_timezone_set('Asia/Kolkata');
include_once 'connect.php';
session_start();
	if (isset($_POST["submit"]))
		{		
		if($_POST["role"]=='admin')
		{
			if( empty($_POST["username"]) || empty($_POST["password"]))
			{
				echo '<script> alert("All the fields are required") </script>';
			}
			else
			{
				$username=$_POST["username"];
				//echo $username;
				$password=$_POST["password"];	
				$logindate = date("d-m-Y");
				$logintime = date("g:i a" , time());						
				$q="SELECT * from table_admin where username='".$username."' and password='".$password ."'";
				$query=oci_parse($connection,$q);
				//echo $query;
				$result=oci_execute($query);
				$nrows = oci_fetch_all($query, $result);
				
				if($nrows>0)
				{
					$q1="update table_admin set logindate='".$logindate."', logintime='".$logintime."' where username='".$username."' and password='".$password ."'";
					$query1=oci_parse($connection,$q1);
					$result1=oci_execute($query1);
					if($result1)
					{
					$_SESSION["username"]=$username;
					$_SESSION["password"]=$password;
					if($_SESSION["password"])
						{
						header("Location:admin/dashboardadmin.php");
						}
					}
				}
				else
				{
					 echo '<script type="text/javascript">alert("worng Credentials"); window.location.href="login.php";</script>';
				}
			}
		}
			if($_POST["role"]=='supervisor')
			{
			if( empty($_POST["username"]) || empty($_POST["password"]))
			{
				echo '<script type="text/javascript">alert("All fileds are required"); window.location.href="login.php";</script>';
				}
			
			else
			{
				$username=$_POST["username"];
				echo $username;
				$password=$_POST["password"];
				echo $password; 				
				$logindate = date("d-m-Y");
				$logintime = date("g:i a", time());						
				$q="SELECT * from table_supervisor where username='".$username."' and password='".$password ."'";
				$query=oci_parse($connection,$q);
				//echo $query;
				$result=oci_execute($query);
				while ($row = oci_fetch_array($query,OCI_RETURN_NULLS+OCI_ASSOC))
				{
					$status=$row["STATUS"];
				}
				echo $status;
				if($status=='active'){
					echo "you can login";
					$q1="update table_supervisor set logindate='".$logindate."', logintime='".$logintime."' where username='".$username."' and password='".$password ."'";
					$query1=oci_parse($connection,$q1);
					$result1=oci_execute($query1);
					if($result1)
					{
						$_SESSION["username"]=$username;
						$_SESSION["password"]=$password;
						if($_SESSION["password"])
						{
							header("Location:supervisor/dashboardsupervisor.php");
						}
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("worng Credentials"); window.location.href="login.php";</script>';
				}
			} 
		}
		if($_POST["role"]=='salesman')
		{
			if( empty($_POST["username"]) || empty($_POST["password"]))
			{
				echo '<script type="text/javascript">alert("worng Credentials"); window.location.href="login.php";</script>';
				}
			else
			{
				$username=$_POST["username"];
				echo $username;
				$password=$_POST["password"];
				echo $password; 				
				$logindate = date("d-m-Y");
				$logintime = date("g:i a" , time());						
				$q="SELECT * from table_salesman where username='".$username."' and password='".$password ."'";
				echo $q;
				$query=oci_parse($connection,$q);
				//echo $query;
				$result=oci_execute($query);
				
				while ($row = oci_fetch_array($query,OCI_RETURN_NULLS+OCI_ASSOC))
				{
					echo "hello";
					$status=$row["STATUS"];
				}
				echo $status;
				if($status=='active'){
					echo "you can login";
					$q1="update table_salesman set logindate='".$logindate."', logintime='".$logintime."' where username='".$username."' and password='".$password ."'";
					$query1=oci_parse($connection,$q1);
					$result1=oci_execute($query1);
					if($result1)
					{
						$_SESSION["username"]=$username;
						$_SESSION["password"]=$password;
						if($_SESSION["password"])
						{
							header("Location:salesman/dashboardsalesman.php");
						}
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("worng Credentials"); window.location.href="login.php";</script>';
				}
			} 
		}
			
	}
		?>