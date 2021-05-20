<?php
// PHP Lesson 6:  Define the information needed to connect to a database   

define ('DB_HOST', 'localhost');    // because website and database are on same server. Otherwise, use a URL	
define ('DB_USER', 'webBoss');			// See dbJournal.sql to work out what to put here!
define ('DB_PASSWORD', 'webRhubarb');		// See dbJournal.sql to work out what to put here!
define ('DB_NAME', 'dbJournal');
    
// make the connection to the MySQL database  
$db = new mysqli (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);   

// make sure the connection worked...
if (mysqli_connect_errno()) {
	print 'Can\'t connect to database. Please try again later.';
	exit;
}
?>