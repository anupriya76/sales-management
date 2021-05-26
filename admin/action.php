<?php
include('../connect.php');
if(isset($_GET['id']))
{
$ID=$_GET['id'];
echo $ID;
$select=oci_parse($connection,"select * from table_supervisor where password='".$ID."'");
$ex=oci_execute($select);
while($row= oci_fetch_array($select,OCI_RETURN_NULLS+OCI_ASSOC))
{
$status= $row["STATUS"];
echo $status;
if($status=='active')
{
$status='deactive';

}
else
{
$status='active';

}
$update=oci_parse($connection,"update table_supervisor set status='".$status."' where password='".$ID."'");
$exe=oci_execute($update);
if($update)
{
	oci_commit($connection);
header("Location:super.php");
}
else
{
echo "error occoured";
}
}
?>
<?php
}
?>