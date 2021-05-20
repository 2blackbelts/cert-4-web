<?php 
	$title = ': Add a journal entry';     
	require('../includes/incHeader.php');		
	require_once('../includes/connect.php');	// connect to database
?> 
<h2>Add a new Journal Entry</h2>   
<p>
<?php
   if (isset($_POST['cmdSubmit'])) {	// FORM HAS ALREADY BEEN DISPLAYED

	$heading = $_POST['txtHeading'];
	$detail = $_POST['txtDetail'];

	// VALIDATE THE FORM 
		$message = '';

		if (empty($heading)) {
			$message = "\nERROR: Please enter a Heading";
		}
		if (empty($detail)) {
			$message = $message . "\nERROR: Please enter some details";
		}
					
	// If no errors, write the record to database
	
	if ($message == '') {
		
		// Prepare the statement
			$sql = 'INSERT into journal (jDateTime, jHeading, jDetail) VALUES (now(), ?, ?)';
			
			$stmt = $db->prepare($sql);

		// Bind parameters to placeholders in query template
			$stmt->bind_param('ss', $heading, $detail);

		// Execute the statement
			$stmt->execute();
	
		// Close the statement	
			$stmt->close();
		
		$message = 'New journal entry added successfully'; 
	}
   }
   else {
	// first time form has been displayed... initialise variables
	$message = '';
	$heading = '';
	$detail = '';
   } 
?>
<form id="frmAddRec" method="post" action="addNewRec.php">
   <p>
 	<label for="txtHeading">Heading:</label>
		<input type="text" id="txtHeading" name="txtHeading" size="30" value="<?php print $heading; ?>" />
		<br /><br />
	<label for="txtDetail">Detail:</label>
		<textarea id="txtDetail" name="txtDetail" cols="62" rows="4"><?php print $detail; ?></textarea>
		<br /><br />
	<input type="submit" name="cmdSubmit" id="cmdSubmit" value="Add this journal entry" />
		<br /><br />
	<label>&#160;</label>
	<textarea class="hidden" id="txtMessage" name="txtMessage" cols="60" rows="4" readonly="readonly"><?php print $message; ?></textarea>
		<br /><br />
   </p>
</form>
<?php 
	require('../includes/incFooter.php');	
?> 