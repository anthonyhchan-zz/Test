<?php
ob_start();
include('mysql_connect.php');


if (isset($_POST['title'])) {
	$title = mysql_escape_string($_POST['title']);
}
if (isset($_POST['name'])) {
	$name = mysql_escape_string($_POST['name']);
}
if (isset($_POST['email'])) {
	$email = mysql_escape_string($_POST['email']);
}
if (isset($_POST['datetime1'])) {
	$datetime[1] = mysql_escape_string($_POST['datetime1']);
}
if (isset($_POST['datetime2'])) {
	$datetime[2] = mysql_escape_string($_POST['datetime2']);
}
if (isset($_POST['datetime3'])) {
	$datetime[3] = mysql_escape_string($_POST['datetime3']);
}

$r1 = mysql_query("INSERT INTO event VALUE (NULL, '$title', '$name', '$email')", $dbc);

$last_id = mysql_insert_id();

for ($i=1; $i<=3; $i++) {
$r2 = mysql_query("INSERT INTO datetime VALUE ('$last_id', '{$datetime[$i]}', NULL, 0 , 0)", $dbc);
}
mysql_close($dbc);
header('Location: index.php#view');
ob_end_flush();
?>