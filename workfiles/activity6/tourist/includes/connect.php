<?php 
// Information required to connect to MySQL database  
define ('DB_HOST', 'localhost');
define ('DB_USER', 'visitor');
define ('DB_PASSWORD', 'tomatosauce');
define ('DB_NAME', 'dbDungeon');

// make the connection to the MySQL database    
$db = new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// make sure the connection worked...
if (mysqli_connect_errno()) {
	print 'Can't connect to database.<br /> \n Error message: ' . mysqli_connect_error();
	exit;
}
?>