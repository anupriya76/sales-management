<?php
include_once 'connect.php';
$q='select * from user_table';
$query=oci_parse($connection,$q);
$result=oci_execute($query);
echo $result;
print '<table border="2">';

while ($row= oci_fetch_array($query,OCI_RETURN_NULLS+OCI_ASSOC))
{
	PRINT '<tr>';
	foreach($row as $value)
	{
		print '<td>'.($value!==null ? htmlentities($value, ENT_QUOTES) : '&nbsp'). '</td>' ;
	}
	print '<tr>';
}
print '</table>';
oci_free_statement($query);
?>
