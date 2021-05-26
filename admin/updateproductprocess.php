	<?php
	session_start();
date_default_timezone_set('Asia/Kolkata');
include_once '../connect.php';
	if (isset($_POST["submit"]))
	{
		if( empty($_POST["product_name"]) || empty($_POST["manuf_date"])|| empty($_POST["selling_price"])|| empty($_POST["product_number"]) )
			{	
			   echo '<script type="text/javascript">alert("Please Enter All The Fields Press OK to Continue");window.location.href="addproduct.php";</script>';
			}
			else
			{
				$name=$_POST["product_name"];
				$product_number=$_POST["product_number"];
				$selling=$_POST["selling_price"];
				$manuf=$_POST["manuf_date"];
				$q= "update product set product_name='".$_POST['product_name']."', product_number=".$_POST["product_number"].",selling_price=".$_POST["selling_price"].",manuf_date='".$_POST["manuf_date"]."'WHERE product_number=".$_POST["product_number"];
				$query=oci_parse($connection,$q);
				$result=oci_execute($query);
				if($result)
				{
					echo '<script type="text/javascript">alert("Entry Updated.");window.location.href="updateproduct.php";</script>';
				}
				else{
					echo '<script type="text/javascript">alert("Can not update. May be samething missing please check again.");window.location.href="updateproductphp.php";</script>';
				}
					
			}
	}