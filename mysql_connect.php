<?php

ini_set('display_errors', 1);
ini_set( 'magic_quotes_gpc', 0 );

define ('HOST', 'localhost');
define ('USER', 'anthonyhchan');
define ('PASS', 'Mapsma88');

$dbc = mysql_connect(HOST, USER, PASS);

if (!$dbc) 
{
	die(mysql_error($dbc));
}

mysql_select_db('doodle', $dbc);
?>