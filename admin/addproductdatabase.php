	<?php
	session_start();
include_once '../connect.php';
	if (isset($_POST["submit"]))
	{
		if( empty($_POST["name"]) || empty($_POST["date"])|| empty($_POST["selling_price"])|| empty($_POST["product_number"]) )
			{				
				echo '<script type="text/javascript">alert("Please Enter All The Fields Press OK to Continue"); window.location.href="addsale.php";</script>';
			}
			else
			{
				$name=$_POST["name"];
				$product_number=$_POST["product_number"];
				$manufacture_date=$_POST["date"];
				$time = strtotime($_POST["date"]);
if ($time) {
  $new_date = date('d-M-Y', $time);
  echo $new_date;
} else {
   echo 'Invalid Date: ' . $_POST['dateFrom'];
}
				$selling_price=$_POST["selling_price"];
	 
		  $q="SELECT * from product where product_number=".$product_number."";
					$query=oci_parse($connection,$q);
					$result=oci_execute($query);
					$nrows = oci_fetch_all($query,$result);
					if($nrows>0)
					{
						echo '<script type="text/javascript">alert("This entry is alreday registered please check entered details");window.location.href="addproduct.php";</script>';
					}
					else{
						echo "you can enter this entry into database";
						   $q="insert into product (product_name,product_number,manuf_date,selling_price) values('".$name."',".$product_number.",'".$new_date."',".$selling_price.")";
						   
						   $query=oci_parse($connection,$q);
						   $result=oci_execute($query); 
						   oci_commit($connection);
						   echo '<script type="text/javascript">alert("Entered. Press Ok to Continue."); window.location.href="dashboardadmin.php";</script>';
						   
					 }
			}
	}  
 
?>