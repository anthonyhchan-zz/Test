<?php
ob_start();
include('mysql_connect.php');

$i = 0;

$name = $_POST['name'];
while (list($key, $value) = each($HTTP_POST_VARS))
{
	if( $key <> "name" )
	{
		$r1 = mysql_query("INSERT INTO person VALUE ('$name', '$key','$value')", $dbc);	
	};
};

echo "123";

mysql_close($dbc);
ob_end_flush();
?>