<?php 
  if(!defined("ALLOW_ACCESS"))
    die("Direct access to this file is not allowed");  
// Information required to connect to MySQL database
define ('DB_HOST', 'localhost');
define ('DB_USER', 'visitor');		// this user only has READ access to the database
define ('DB_PASSWORD', 'justlook');
define ('DB_NAME', 'dbAntiques');

// connect to the database  
$db = @new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
// make sure the connection worked...
if (mysqli_connect_errno()) {
	print "Can't connect to database. Please try again later.";
	exit;
}
?>