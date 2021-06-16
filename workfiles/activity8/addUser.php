<?php
define('ALLOW_ACCESS', 1); //define a constant to give permission to use include files
?>
<!DOCTYPE html>     
<html lang="en">
<head>
  <meta charset="utf-8" />  
  <!--[if lt IE 9]>
       <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="antiques/public_html/css/main.css" />
  <title>Ye Olde Dungeon Antiques - Add new admin user</title>
  <?php require_once('antiques/incAdmin/adminConnect.php'); ?> 
</head>
<body>
<div id="wrapper">
  <header>
      <div class="rightimg">
          <img src="antiques/public_html/img/logo.jpg" width="157" height="111" alt="ornate black and white line drawing of people reading books" title="" />
      </div>
      <h1>Ye Olde Dungeon Antiques</h1>
  </header>
  <nav><a href="antiques/public_html/web_admin/index.php">Go to Admin backend</a></nav>
  <div id="content">
  <h2>Add a new user to the Admin table</h2>
<?php
if (isset($_POST['cmdSubmit'])) {
  // CREATE VARIABLES from form's POST data
  $adminID = $_POST['txtUsername'];
  $password = $_POST['txtPassword'];
  $confirm = $_POST['txtConfirm'];

  // VALIDATE THE FORM (you can make the validation more comprehensive)
  // You might like to set rules for usernames and passwords, for example: 
  // 				minimum length 8 characters 
  // 				password must not be same as username
  $message = "";

  if (empty($adminID)) {
	$message = "ERROR: Please enter a user name";
  }
  if (empty($password)) {
	$message = $message . "\nERROR: Please enter a password";
  }
  else {
		if ($password == 'password') {
			$message = $message . "\nERROR: password is too easy to guess! Try again.";
		}
  }
  if ($password != $confirm) {
	$message = $message . "\nERROR: Confirm password doesn\'t match password";
  }

  // If no errors, write the record to database
  if ($message == '') {
	
      // prepare the statement 
      $sql = 'INSERT INTO Admin (adminID, aPassword) VALUES (?, ?)';
      $stmt = $db->prepare($sql);

      // Encrypt the password then bind parameters to the placeholders
	  $encPassword = sha1($password);
      $stmt->bind_param('ss', $adminID, $encPassword);

      // Execute the statement
      $stmt->execute()
        OR die ('<p>*** ERROR: record not written to database: ***</p>');

      // Close the statement
      $stmt->close();

      $message = 'Record has successfully been added to database';
	
  }
}
else {  // this is the first time form will be displayed. Initialise variables.
    $adminID = '';
    $password = '';
    $confirm = '';
    $message = '';
}
?>
<form id="frmAddUser" method="post" action="addUser.php">
  <p><br />
  	<label>User name:</label>
	<input type="text" name="txtUsername" id="txtUsername" size="16" value="<?php print $adminID; ?>" />
  	<br /><br />
  	<label>Password:</label>
	<input type="password" name="txtPassword" id="txtPassword" size="16" value="<?php print $password; ?>" />
  	<br /><br />
  	<label>Confirm password:</label> 
	<input type="password" name="txtConfirm" id="txtConfirm" size="16" value="<?php print $confirm; ?>" />
  	<br /><br />
  	 
  	<input type="submit" name="cmdSubmit" name="cmdSubmit" value="Add user to database" />
  	<br /><br />
  </p>
  <h3>Report:</h3>
  <p> 
  <textarea name="txtMessage" cols="60" rows="4" readonly="readonly"
	style="background-color:#FFF;color:#000; overflow:hidden;"><?php print $message;?></textarea>
  </p>
</form>
<?php require('antiques/incAdmin/incFoot.php'); ?>