<?php   
// This file sets up database connection for ADMIN user
if(!defined('ALLOW_ACCESS'))
    die('Direct access to this file is not allowed');
// Information required to connect to MySQL database
define ('DB_HOST', 'localhost');
define ('DB_USER', 'webBoss');		
define ('DB_PASSWORD', 'webRhubarb');  
define ('DB_NAME', 'dbAntiques');
// connect to the database
$db = @new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check whether the connection worked...
if (mysqli_connect_errno()) {
	print '<br />Can\'t connect to database. Please try again later.';
	exit;
}
?>