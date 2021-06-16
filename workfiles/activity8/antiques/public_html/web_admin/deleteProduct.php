<?php
  define('ALLOW_ACCESS', 1); //define a constant to give permission to use include files
	$title = 'Delete a product';  
	require('../../incAdmin/incHead.php');
	require_once('../../incAdmin/adminConnect.php');
?>
<h2>Choose the product you wish to DELETE:</h2>
<?php
if ($_SESSION['loggedIn']) {

if (isset($_POST['cmdSubmit'])) {
  
  // Check if a radio button has been selected
  $message = '';
  if (empty($_POST['rdoChooseRec'])) {
	$message = 'ERROR: Please choose a product';
  }
  
  // If no errors, REDIRECT to deleteAction.php
  if ($message == '') {
	$_SESSION['deleteID'] = $_POST['rdoChooseRec'];
	// start defining the URL
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	
	// check for trailing slash
	if ((substr($url, -1) == '/') OR (substr($url, -1) == '\\') ) {
		$url = substr($url, 0, -1); // get rid of slash
	}

	// add the page name and create the header 
	$url .= '/deleteAction.php';
	header("Location: $url");
	exit(0);
  }

}
else {  // this is the first time form will be displayed. Initialise variable
    $message = '';
    $_SESSION['deleteID'] = '';
}
?>
<form id="frmDeleteProduct" method="post" action="deleteProduct.php">
<p><br />
<input type="submit" name="cmdSubmit" id="cmdSubmit" value="Proceed with DELETE" />
<span style="color:#F00;"><?php print $message; ?></span>
  	<br /><br />
<?php
// set up the SQL query
$sql = 'SELECT c.cDesc, p.productID, p.pName, p.pPrice, p.pImage FROM Category as c, Product as p WHERE c.categoryID = p.categoryID';
$stmt = $db->prepare($sql);
	
// Execute the statement
	$stmt->execute();

// Bind PHP variables to the output from the prepared statement
		$stmt->bind_result($cDesc, $productID, $pName, $pPrice, $pImage);

// Set up the table headings
	print '<table width="70%">';
	print '<tr><th>&#160;</th>';
	print '<th class="leftText">Category</th>';
	print '<th class="leftText">Product ID</th>';
	print '<th class="leftText">Product Name</th>';
	print '<th class="leftText">Image name</th>';
	print '<th class="rightText">Price</th></tr>';

// Fetch and display the output
	while ($stmt->fetch()) {
	    print "\n<tr>";
		print '<td>';
			print '<input type="radio" name="rdoChooseRec" id="rdoChooseRec" value="' . $productID . '" />'; 
		print '</td>';
		print '<td>';
			print $cDesc;
		print '</td>';
		print '<td>';
			print $productID;
		print '</td>';
		print '<td>';
			print $pName;
		print '</td>';
		print '<td>';
			print $pImage;
		print '</td>';
		print '<td class="rightText">';
			printf("%0.2f", $pPrice);	// format price to 2 decimal places
		print '</td>';
	    print '</tr>';
	}
// Close the statement	
	$stmt->close();
?>
</table>
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