<?php
include_once 'connect.php';
$year='2016';
$q= "select sum(quantity_ordered) from product_order where order_date like '%".$year."'";
$query=oci_parse($connection,$q);
$result=oci_execute($query);
echo $q;
echo $result;
echo $query;
$nrows = oci_fetch_all($query, $result);
echo $nrows;

?>