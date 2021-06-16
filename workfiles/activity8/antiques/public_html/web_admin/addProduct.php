<?php
  define('ALLOW_ACCESS', 1); //define a constant to give permission to use include files
	$title = 'Add a product';
	require('../../incAdmin/incHead.php');
	require_once('../../incAdmin/adminConnect.php');
?>
<h2>Add a new product to the Antiques database</h2>  
<?php
if ($_SESSION['loggedIn']) {

if (isset($_POST['cmdSubmit'])) {
  // CREATE VARIABLES from form's POST data
  $categoryID = $_POST['cboCategoryID'];
  $productID = $_POST['txtProductID'];
  $pName = $_POST['txtName'];
  $pPrice = $_POST['txtPrice'];
  $pImage = $_POST['txtImage'];
 
  // VALIDATE THE FORM (this is very basic - you could make the validation more comprehensive)
  $message = '';

  if (empty($productID)) {
	$message = "ERROR: Please enter a product ID number";
  }
  if (empty($pName)) {
	$message = $message . "\nERROR: Please enter the product name";
  }

  // If no errors, write the record to database
  if ($message == '') {

  $sql = "INSERT INTO Product (categoryID, productID, pName, pPrice, pImage) VALUES ('$categoryID','$productID','$pName','$pPrice','$pImage')";
	if ($stmt = $db->prepare($sql)) {
	 	$stmt->execute();
		$stmt->close();
	 	$message = 'Record has successfully been added to database';
	}
	else {
		// an error has occurred, so the statement wasn't executed
		print 'Database error while attempting to add record: ' . $db->error;	
    	}
  }
}
else {  // this is the first time form will be displayed. Initialise variables.
    $categoryID = '';
    $productID = '';
    $pName = '';
    $pPrice = '';
    $pImage = 'placeholder.jpg';
    $message = '';
}
?>
<form id="frmAddProduct" method="post" action="addProduct.php">
  <p><br />
  	<label>Category:</label>
	<select name="cboCategoryID">
	    	<?php
			//Set up a drop-down list of categories
			$stmt = $db->prepare('SELECT * FROM Category ORDER BY cDesc');
			$stmt->execute();
			$stmt->bind_result($OUTPUTcategoryID, $OUTPUTcDesc);
			// while setting up the drop-down list, retain any PREVIOUSLY SELECTED option
			while ($stmt->fetch() ) {
				print '<option ';
				if ($OUTPUTcategoryID == $categoryID) { print 'selected '; }
				print 'value="';
				print $OUTPUTcategoryID;
				print '">';
				print $OUTPUTcDesc;
				print '</option>';
			}
			$stmt->close();
	    	?>
	</select>
	<br /><br />
  	
  	<label>Product ID :</label>
	<input type="text" name="txtProductID" id="txtProductID" size="8" value="<?php print $productID; ?>" />
  	<br /><br />
  	<label>Product Name:</label> 
	<input type="text" name="txtName" id="txtName" size="70" value="<?php print $pName; ?>" />
  	<br /><br />
  
  	<label>Product price: &#160;&#160;&#160; $</label> 
	<input type="text" name="txtPrice" id="txtPrice" size="8" value="<?php print $pPrice; ?>" />
 	 <br /><br />
 
	<label>Image filename:</label> 
	<input type="text" name="txtImage" id="txtImage" size="30" value="<?php print $pImage; ?>" />
 	 <em>(must include file extension, eg seascape.jpg)</em><br /><br />

  	<input type="submit" name="cmdSubmit" id="cmdSubmit" value="Add record to database" />
  	<br /><br />
  
  	<label>Report:</label>
  	<textarea name="txtMessage" id="txtMessage" cols="60" rows="4" readonly="readonly"
		style="background-color:#FFF;color:#000; overflow:hidden;"><?php print $message;?></textarea>
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