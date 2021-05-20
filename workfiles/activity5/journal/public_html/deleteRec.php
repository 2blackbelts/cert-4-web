<?php 
	$title = ': Delete a journal entry';     
	require('../includes/incHeader.php');		
	require_once('../includes/connect.php');	// connect to database
?> 
<h2>Delete a specific journal entry</h2>
<h3>Click the DELETE button to delete the journal entry with an ID = 5 (if it exists)</h3>
<div class="redText">  
<?php
if (isset($_POST['cmdSubmit'])) {
		
   // put the script here... see example 4 in your notes  
     
}
?>
</div>
<form id="deleteRec" method="post" action="deleteRec.php">
	<p>
	<input type="submit" name="cmdSubmit" id="cmdSubmit" value="DELETE" />
	<br /><br />
	</p>
</form>
<?php require('../includes/incFooter.php'); ?> 