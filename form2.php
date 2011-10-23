<?php
ob_start();
include('mysql_connect.php');

$id = $_POST['event_id'];
	
$i = 0;

$name = $_POST['name'];
while (list($key, $value) = each($HTTP_POST_VARS))
{
	if( $key <> "name" )
	{
		$r1 = mysql_query("INSERT INTO person VALUE ('$name', '$key','$value')", $dbc);	
		if( $value == 1 )
			$r2 = mysql_query("UPDATE datetime set yes = yes + 1 WHERE datetime_id = $key", $dbc);
		else
			$r3 = mysql_query("UPDATE datetime set no = no + 1 WHERE datetime_id = $key", $dbc);
	};
};

header("Location: detailed_view.php?id=$id&status=1");
mysql_close($dbc);
ob_end_flush();
?>