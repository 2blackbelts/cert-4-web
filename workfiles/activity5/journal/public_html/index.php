<?php 
	$title = ': Display Journal Entries';     
	require('../includes/incHeader.php');
	require_once('../includes/connect.php');	 // connect to database
?> 
<h2>Journal Entries so far...</h2>
<p>
<?php
	

	// put the script here... see example 2 in your lesson notes (page 4)
	$sql = 'SELECT journalID, jDateTime, jHeading, jDetail FROM journal ORDER BY jDateTime';

	$stmt = $db->prepare($sql);

	// Execute the SQL statement
	$stmt->execute();

	// Bind PHP variables to the OUTPUT from the SQL statement
	$stmt->bind_result($journalID, $datetime, $heading, $detail);

	// Fetch and display the output
	while ($stmt->fetch()) {

		print '<strong> #' . $journalID . ' ' . $heading . '

		</strong>';

		print $datetime . '<br />';
		print $detail . '<br /><br />';

	}

// Close the SQL statement
$stmt->close();

	
?>
</p>
<?php 
	require('../includes/incFooter.php');	
?> 