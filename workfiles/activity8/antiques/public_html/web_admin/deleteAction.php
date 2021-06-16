<?php
  define('ALLOW_ACCESS', 1); 
	$title = 'confirm DELETE';
	require('../../incAdmin/incHead.php');
	require_once('../../incAdmin/adminConnect.php');
?>
<h3>Click the DELETE button to confirm delete for product ID <?php print $_SESSION['deleteID']; ?></h3>
<?php
if ($_SESSION['loggedIn']) {

if (isset($_POST['cmdSubmit'])) {
  // CREATE VARIABLES from form's POST data
  $cDesc  = $_POST['txtCategory'];
  $pName  = $_POST['txtName'];
  $pPrice = $_POST['txtPrice'];
  $pImage = $_POST['txtImage'];
 
  // Proceed with deleting the record from the database
 	$productID = $_SESSION['deleteID'];
	
	// Prepare the statement
 	$sql = 'DELETE FROM Product WHERE productID = ? LIMIT 1';
	if ($stmt = $db->prepare($sql)) {
	
		// Bind parameter to placeholder
		$stmt->bind_param('i', $productID);
		
		// Execute the statement
		$stmt->execute();
		
		$message = "DELETE successful. \nNumber of records deleted: " . $stmt->affected_rows;
		$stmt->close();
	}
	else {
		$message = "Error while attempting to delete the record. \nPlease try again later.";
	}
}
else {  // first time form is displayed: Initialise variables and obtain record from database
    $cDesc  = '';
  	$pName  = '';
  	$pPrice = '';
  	$pImage = '';
   	$message = '';

   // run the database query to find requested record
   $sql = 'SELECT c.cDesc, p.categoryID, p.productID, p.pName, p.pPrice, p.pImage FROM Category as c, Product as p WHERE c.categoryID = p.categoryID and p.productID = ' . $_SESSION['deleteID']; 
   if ($stmt = $db->prepare($sql)) {
	$stmt->execute();

   	// Bind PHP variables to the output from the prepared statement
	$stmt->bind_result($row_cDesc, $row_categoryID, $row_productID, $row_pName, $row_pPrice, $row_pImage);

   	// Fetch and the record so it can be displayed in the form
	while ($stmt->fetch()) {
		$cDesc = $row_cDesc;
		$pName = $row_pName;
		$pPrice = $row_pPrice;
		$pImage = $row_pImage;
   	}
	$stmt->close();
  }
  else {
	$message = "ERROR: Could not read table to find requested record. \nPlease try again later\n";
  }
}
?>
<form id="frmDelete" method="post" action="deleteAction.php">
  <p><br />
	<input type="submit" name="cmdSubmit" id="cmdSubmit" value="DELETE this record" />
  	<br /><br />
  	<label>Category:</label>
	<input type="text" class="noBorder" name="txtCategory" id="txtCategory" size="30" value="<?php print $cDesc; ?>" />
	<br /><br />

  	<label>Product Name:</label> 
	<input type="text" class="noBorder" name="txtName" id="txtName" size="70" value="<?php print $pName; ?>" />
  	<br /><br />
  
  	<label>Product price: &#160;&#160;&#160;&#160;&#160;&#160;&#160; $</label> 
	<input type="text" class="noBorder" name="txtPrice" id="txtPrice" size="8" value="<?php printf('%0.2f', $pPrice); ?>" />    
 	 <br /><br />

	<label>Image filename:</label> 
	<input type="text" class="noBorder" name="txtImage" id="txtImage" size="30" value="<?php print $pImage; ?>" />
 	 <br /><br />
 
  	<label>Report:</label>
  	<textarea name="txtMessage" id="txtMessage" cols="60" rows="4" readonly="readonly"
		style="background-color:#FFFFFF;color:#000000; overflow:hidden;"><?php print $message;?></textarea>
  </p>
</form>

<?php
}
else {
    	print 'ERROR: you are not authorised to access this page';
} 
	require('../../incAdmin/incFoot.php');
?>