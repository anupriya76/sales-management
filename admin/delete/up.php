<?PHP
ECHO "HELLO";
echo $_GET["userid"];
$val=$_GET["userid"];
$q="select name,salesman_number,state,city,pincode,salary,phone_number,id,products_saled from salesman where salesman_number=".$val." and id='".$_SESSION['password']."'" ;
echo $q;
$query=oci_parse($connection,$q);
$result=oci_execute($query);
$row=oci_fetch_array($query);
?>