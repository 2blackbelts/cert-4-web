<?php
	$title = 'Registration';
	require('../includes/incHeader.php');  
?>
<h2>Registration Form</h2>
<p>Register NOW to receive our exclusive newsletter!!!!!!</p>
<h3>Please complete this form to register: </h3>      

<form id="frmRegister" action="registervalidate.php" method="post">
<p>
	<label for="txtFirstname">First Name:</label>
	<input type="text" id="txtFirstname" name="txtFirstname" size="20" /><br /><br />
	<!-- firstname_error -->

	<label for="txtLastname">Last Name:</label> 
	<input type="text" id="txtLastname" name="txtLastname" size="20" /><br /><br />

	<label for="txtEmail">Email Address: </label>
	<input type="text" id="txtEmail" name="txtEmail" size="20" /><br /><br />

	<label for="txtPassword">Password: </label>
	<input type="password" id="txtPassword" name="txtPassword" size="20" /><br /><br />

	<label for="txtConfirm">Confirm Password: </label>
	<input type="password" id="txtConfirm" name="txtConfirm" size="20" /><br /><br />

	<input type="submit" id="cmdSubmit" name="cmdSubmit" value="Register Now" />
	<br />
</p>
</form>
<?php
	require('../includes/incFooter.php');
?>