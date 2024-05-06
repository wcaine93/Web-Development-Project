<?php
/**
 * Connect to CSIS_3743_project database via MySql
 * 
 * @see DatabaseStructure.md
 */


$err = false;

// create connection
$mysqli = new mysqli("localhost", "root", "");

// check connection
if ($mysqli === false) $err = true;

// select database
$db_name = 'CSIS_3743_project';
if ($mysqli->select_db($db_name) === FALSE) $err = true;


// terminate and display error screen if unable to select database
if ($err) {
	readfile('500Error.html.php');
	$mysqli->close();
	die();
}
?>