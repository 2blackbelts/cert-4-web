<?php
  define('ALLOW_ACCESS', 1); //define a constant to give permission to use include files
	$title = 'Admin Login';
	require('../../incAdmin/incHead.php');
	require_once('../../incAdmin/adminConnect.php');
?>
<h2>You must log in before carrying out admin tasks</h2>
<p>
<?php
if (isset($_POST['cmdSubmit'])) {
  // CREATE VARIABLES from form's POST data
  $adminID = mysqli_real_escape_string($db, trim($_POST['txtUsername']));
  $password = mysqli_real_escape_string($db, trim($_POST['txtPassword']));
  
  // VALIDATE THE FORM
  $msgUsername = '';
  $msgPassword = '';
  $error = 0;  		// 0 = no errors   1 = errors

  if (empty($adminID)) {
	$msgUsername = 'ERROR: Please enter your user name';
	$error = 1;
  }
  if (empty($password)) {
	$msgPassword = 'ERROR: Please enter your password';
	$error = 1;
  }
  
  // If no errors, check for a match in the Admin table in database
  if ($error == 0) {
    
		// Prepare the statement
	if ($stmt = $db->prepare('SELECT * FROM Admin WHERE adminID = ? LIMIT 1') ) {

		// Bind input variable to the statement
		$stmt->bind_param('s', $adminID);

		// Execute the statement
		$stmt->execute();

		// Bind PHP variables to the output from the prepared statement
		$stmt->bind_result($OUTPUTadminID, $OUTPUTpassword);
		
		// Fetch the output from the query, and check if password matches
		while ($stmt->fetch()) {

			if ($OUTPUTpassword == sha1($password))  {
				$_SESSION['loggedIn'] = true;
				$_SESSION['loginName'] = $adminID;
				$msgUsername = '*** Login successful for ' . $_SESSION['loginName'] . '***';
			}
		}

		// Close the statement
		$stmt->close();
    	}
   	else {
		// an error has occurred, so the statement wasn't executed
		print 'Database error while attempting to check login. Try again later. ';	
    	}


	if ($_SESSION['loggedIn'] == false) {
		$msgUsername = 'ERROR: No match found for this username and password';
		$error = 1;
	}
	
  }
}
else {  //   First time form is displayed. Initialise variables.  
    $adminID = '';
    $password = '';
    $msgUsername = '';
    $msgPassword = '';
    $error = 0;  	
    $_SESSION['loggedIn'] = false;
    $_SESSION['loginName'] = '';
}
?>
</p>
<form id="frmLogin" method="post" action="index.php">
  <p> <br />
  	<label>User name:</label>
	<input type="text" name="txtUsername"  id="txtUsername" size="16" value="<?php print $adminID; ?>" />
	<span style="color:#F00;"><?php print $msgUsername; ?></span>
  	<br /><br />

  	<label>Password:</label>
	<input type="password" name="txtPassword"  id="txtPassword" size="16" value="<?php print $password; ?>" />
	<span style="color:#F00;"><?php print $msgPassword; ?></span>
  	<br /><br />
 
	<label>&#160;</label>
  	<input type="submit" name="cmdSubmit" id="cmdSubmit" value="Click to log in" />
  	<br /><br />
  
  </p>
</form>
<?php
	require('../../incAdmin/incFoot.php');
?>