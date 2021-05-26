<?PHP
include_once 'connect.php';
$val= $_GET["ID"];
$q="delete from salesman where ID='".$val."'";
$parse=oci_parse($connection,$q);
$exe=oci_execute($parse);
if($exe>0)
{
	$query="delete from supervisor where ID='".$val."'";
	$Parse=oci_parse($connection,$query);
	$result=oci_execute($Parse);
	if($result>0)
	{
			echo '<script type="text/javascript">alert("Deleted Successfully.");window.location.href="super.php";</script>';
	}
}
else
{
	echo '<script type="text/javascript">alert("Something Went Wrong.");window.location.href="super.php";</script>';
}
?>