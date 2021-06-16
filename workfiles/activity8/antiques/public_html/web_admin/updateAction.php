<?php
  define('ALLOW_ACCESS', 1);
	$title = 'Update details';  
	require('../../incAdmin/incHead.php');
	require_once('../../incAdmin/adminConnect.php');
?>
<h2>Update fields for product ID <?php print $_SESSION['updateID']; ?></h2>
<?php
if ($_SESSION['loggedIn']) {

if (isset($_POST['cmdSubmit'])) {
  // CREATE VARIABLES from form's POST data
  $new_categoryID = $_POST['cboCategoryID'];
  $new_pName  = $_POST['txtName'];
  $new_pPrice = $_POST['txtPrice'];
  $new_pImage = $_POST['txtImage'];
 
  // VALIDATE THE FORM (This is very basic. In your Japan Art Print website, make the validation more comprehensive)
  $message = '';

  if (empty($new_pName)) {
	$message = "ERROR: Product name is required";
  }
  if (empty($new_pPrice)) {
	$message = $message . "\nERROR: Product price is required";
  }

  // If no errors, update the record in the database
  if ($message == '') {
     $productID = $_SESSION['updateID'];
  $sql = "UPDATE Product SET categoryID = $new_categoryID, pName ='$new_pName', pPrice = $new_pPrice, pImage = '$new_pImage' WHERE productID = $productID";
	if ($stmt = $db->prepare($sql)) {
		$stmt->execute();
		$message = "Update successful. \nNumber of records amended: " . $stmt->affected_rows;
		$stmt->close();
	}
	else {
		$message = "Error while attempting to update the record.";
	}

  }
}
else {  // first time form is displayed: Initialise variables and obtain record from database
   $new_categoryID = '';
   $message = '';

   // run the database query to find requested record
   $sql = 'SELECT c.cDesc, p.categoryID, p.productID, p.pName, p.pPrice, p.pImage FROM Category as c, Product as p WHERE c.categoryID = p.categoryID and p.productID = ' . $_SESSION['updateID'];
   if ($stmt = $db->prepare($sql)) {
	$stmt->execute();

   	// Bind PHP variables to the output from the prepared statement
	$stmt->bind_result($old_cDesc, $old_categoryID, $old_productID, $old_pName, $old_pPrice, $old_pImage);

   	// Fetch and the record so it can be displayed in the form
	while ($stmt->fetch()) {
		$new_categoryID = $old_categoryID;
		$new_pName = $old_pName;
		$new_pPrice = $old_pPrice;
		$new_pImage = $old_pImage;
   	}
	$stmt->close();
  }
  else {
	$message = "*** ERROR: Could not read table to find requested record. \nPlease try again later.";
  }
}
?>
<form id="frmUpdate" method="post" action="updateAction.php">
  <p><br />
  	<label>Category:</label>
	<select name="cboCategoryID">
		<?php
			//Set up a drop-down list of categories
			$sql = 'SELECT * FROM Category ORDER BY cDesc';
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($row_categoryID, $row_cDesc);

			while ($stmt->fetch()) {
				print "\n<option ";
				if ($row_categoryID == $new_categoryID) { print 'selected '; }
				print 'value="';
				print $row_categoryID;
				print '">';
				print $row_cDesc;
				print '</option>';
			}
			$stmt->close();
		?>
	</select>
	<br /><br />

  	<label>Product Name:</label> 
	<input type="text" name="txtName" id="txtName" size="70" value="<?php print $new_pName; ?>" />
  	<br /><br />
  
  	<label>Product price: &#160;&#160;&#160; $</label> 
	<input type="text" name="txtPrice" id="txtPrice" size="8" value="<?php printf('%0.2f', $new_pPrice); ?>" />    
 	 <br /><br />

	<label>Image filename:</label> 
	<input type="text" name="txtImage" id="txtImage" size="30" value="<?php print $new_pImage; ?>" />
 	 <br /><br />
 
  	<input type="submit" name="cmdSubmit" id="cmdSubmit" value="Update this record" />
  	<br /><br />
  
  	<label>Report:</label>
  	<textarea name="txtMessage" id="txtMessage" cols="60" rows="4" readonly="readonly"
		style="background-color:#FFFFFF;color:#000000; overflow:hidden;"><?php print $message;?></textarea>
  </p>
</form>  
<!----------------------------------------------------------------------------->
<?php
}
else {
    	print 'ERROR: you are not authorised to access this page';
} 
	require('../../incAdmin/incFoot.php');
?>