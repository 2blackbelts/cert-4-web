<?php
	$title = 'Registration validation';
	require('../includes/incHeader.php');  
?>
<h2>Registration Form is being processed</h2>

<h3>If you need to correct anything, please press the BACK button</h3>      

<p>
<?php
	// collect data
	$firstname = $_POST['txtFirstname'];
	$lastname = $_POST['txtLastname'];
	$msg = "Everything is cool.";

	//check data (validation)
	if(empty($firstname) || empty($lastname)) {
		$msg = "Not cool man";
	}

	if(strlen($firstname) < 2) {
		$msg = "Not cool man";
	}




	// show errors OR show success message (save to database)
	print $msg;
	
	
?>	

	
</p>

<?php
	require('../includes/incFooter.php');
?>