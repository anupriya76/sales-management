<?php
	$username='experiment';
$password='experiment';
$connection_string='localhost/anupriya';
$connection= oci_connect(
	$username,
	$password,
	$connection_string
);
if(!$connection)
{
	echo "sorry! can't connect to oracle.";
	exit;
	}
	?>