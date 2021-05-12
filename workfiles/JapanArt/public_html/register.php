<?php 
	$title = 'Registration';     
	require('../incFrontEnd/incHeader.php');
?> 
<h2>Registration Form</h2>
<p>
	<img src="gallery/eisen01.jpg" width="309" height="459" class="imgRight" 
	title="" alt="Japanese woman in traditional dress, playing a stringed instrument" />
</p>
<p>Registration will entitle you to <strong>discounts</strong> on our complete range of products.</p>
<p>It will also give you the option to receive our exclusive newsletter.</p>
<h3>Please complete this form to register: </h3>  
<?php
if (isset($_POST['cmdSubmit'])) {	// FORM HAS ALREADY BEEN DISPLAYED

  // CREATE VARIABLES from form's POST data, then validate and redisplay them in the form
	$firstname = $_POST['txtFirstname'];
	$lastname = $_POST['txtLastname'];
	$email = $_POST['txtEmail'];
	$password = $_POST['work out what goes here'];
	$confirm = $_POST['work out what goes here'];
	$day = $_POST['work out what goes here'];
	$month = $_POST['work out what goes here'];
	$year = $_POST['work out what goes here'];
	$location = $_POST['cboLocation'];
	$firstnameError = "";
	$lastnameError = "";

  // VALIDATE THE FORM... first, set the error flag: 0 = no errors
   $error = 0;

  // Validate the first name
  if (empty($firstname)) {
	$firstnameError = 'First name cannot be empty';
	$error = 1;
  }

  // Validate the last name
  if (empty($lastname)) {
	$lastnameError = 'Please enter your last name';
	$error = 1;
  }

 
  // PROCESS THE FORM (here we would access the database)
  if ($error == 0) {
	// process the registration... access database, etc
	$firstnameError = 'Thank you for registering.';
  }

}
else {  
	// first time form is displayed. Initialise variables.
  	$error = 0;
  	$firstname = "";
	$lastname = "";
	$email = "";
	$password = "";
	$confirm = "";
	$day = "";
	$month = "";
	$year = "YYYY";
	$location = "";
	$firstnameError = "";
	$lastnameError = "";
} 
?>
<form id="frmRegister" action="register.php" method="post">
<p>
	<label for="txtFirstname">First Name:</label>
	<input type="text" id="txtFirstname" name="txtFirstname" size="20" 
		value="<?php print $firstname; ?>"  autofocus />
	<input type="text" id="txtFirstnameError" name="txtFirstnameError" size="40"
		class="validate" readonly="readonly" value="<?php print $firstnameError; ?>" /><br />

	<label for="txtLastname">Last Name:</label> 
	<input type="text" id="txtLastname" name="txtLastname" size="20" 
		value="<?php print $lastname; ?>" />
	<input type="text" id="txtLastnameError" name="txtLastnameError" size="40"
		class="validate" readonly="readonly" value="<?php print $lastnameError; ?>" /><br />

	<label for="txtEmail">Email Address: </label>
	<input type="email" id="txtEmail" name="txtEmail" size="20" 
		value="<?php print $email; ?>" /><br />

	<label for="txtPassword">Password: </label>
	<input type="password" id="txtPassword" name="txtPassword" size="20" 
		value="<?php print $password; ?>" /><br />

	<label for="txtConfirm">Confirm Password: </label>
	<input type="password" id="txtConfirm" name="txtConfirm" size="20" 
		value="<?php print $confirm; ?>" /><br />

	<label>Date Of Birth:</label>
	<input type="text" id="txtDay" name="txtDay" size="2"  value="<?php print $day; ?>" />

	<?php $monthList = array('Month', 'Jan', 'etc'); ?>

	<select id="cboMonth" name="cboMonth">
		<!-- for loop -->
		<option value="">Month</option>
		<option value="1">January</option>
		<option value="2">February</option>
		<option value="3">March</option>
		<option value="4">April</option>
		<option value="5">May</option>
		<option value="6">June</option>
		<option value="7">July</option>
		<option value="8">August</option>
		<option value="9">September</option>
		<option value="10">October</option>
		<option value="11">November</option>
		<option value="12">December</option>
	</select>

	<input type="text" id="txtYear" name="txtYear" size="4"  value="<?php print $year; ?>" /><br />

	<label for="cboLocation">Your location:</label>
 	<select id="cboLocation" name="cboLocation">
		<option selected="selected" value="Australia">Australia</option>
		<option value="Canada">Canada</option>
		<option value="India">India</option>
		<option value="Indonesia">Indonesia</option>
		<option value="Japan">Japan</option>
		<option value="NZ">New Zealand</option>
		<option value="Pacific">Pacific</option>
		<option value="UK">United Kingdom</option>
		<option value="USA">USA</option>
		<option value="Europe">Europe</option>
		<option value="Asia">Asia (other)</option>
		<option value="South America">South America</option>
		<option value="Africa">Africa</option>
		<option value="other">other</option>
	</select>

	<br /><br />
	<input type="submit" id="cmdSubmit" name="cmdSubmit" value="Register Now" />
	<br />
</p>
</form>
<?php
	require('../incFrontEnd/incFooter.php');
?>