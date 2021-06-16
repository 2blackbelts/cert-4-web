<?php 
  define('ALLOW_ACCESS', 1); //define a constant to set permission to use includes  
	$title = 'SEARCH for a Product';     
	require('../incFrontend/incHeader.php');
	require_once('../incFrontend/connect.php');  
?> 
<h2>Product Search</h2>
<?php
if (isset($_POST['cmdSubmit'])) {	// FORM HAS ALREADY BEEN DISPLAYED  

  // CREATE VARIABLES from form's POST data, so data can be retained when the form is redisplayed
	$searchField = $_POST['cboSearchField'];
	$searchValue = $_POST['txtSearchValue'];
	
  // VALIDATE THE FORM - always validate user input... trust no-one!!
  $message = "";
  if (empty($searchValue)) {
	$message = "Please enter a search value";
  }

}
else {  
	// FORM IS BEING DISLAYED FOR FIRST TIME: Initialise variables
  	$message = '';
  	$searchField = '';
    $searchValue = '';
} 
?>
<form id="frmSearch" action="productSearch.php" method="post">
<p><br />	Choose a field to search:
	<select id="cboSearchField" name="cboSearchField">
		<option value="pName" <?php if ($searchField=='pName') print 'selected="selected"'; ?> >Product name </option>
		<option value="productID" <?php if ($searchField=='productID') print 'selected="selected"'; ?> >Product ID </option>
	</select>
	 
	<br /><br />Enter a search value:
	<input id="txtSearchValue" name="txtSearchValue" type="text" value="<?php print $searchValue; ?>" />
		&#160; &#160;
	<input type="submit" id="cmdSubmit" name="cmdSubmit" value="Search the database" />
	<span style="color:#F00;"><?php print $message; ?></span><br /><br />
</p>
</form>
<?php
if (isset($_POST['cmdSubmit']) && $message == '') { // NOT first time, and NO validation errors: OK to access database

	// Prepare the MySQL statement
	$sql = "SELECT *  FROM Product WHERE " . $searchField . " LIKE '%" . $searchValue  ."%'";
	$stmt = $db->prepare($sql);

	// Execute the MySQL statement
		$stmt->execute();

	// Bind PHP variables to the output from the prepared statement
		$stmt->bind_result($productID, $categoryID, $pName, $pPrice, $pImage);

	// Print the search results

	// First, set up the table headings
	print '<h3>Search Results:</h3>';
	print '<table width="60%">';
	print '<tr><th class="leftText">Image</th>';
	print     '<th class="leftText">Product ID</th>';
	print     '<th class="leftText">Category</th>';
	print     '<th class="leftText">Name</th>';
	print     '<th class="rightText">Price</th></tr>';

	// Fetch and display the output
		while ($stmt->fetch()) {
		   print "\n<tr>";
			print '<td>';
			print '<img src="galleryThumbs/' . $pImage . '" width="65" height="60" alt="product image" />'; 
			print '</td>';
			print '<td>';
			print $productID;
			print '</td>';
			print '<td>';
			print $categoryID;
			print '</td>';
			print '<td>';
			print $pName;
			print '</td>';
			print '<td class="rightText">';
			printf("%0.2f", $pPrice);	// format price to 2 decimal places
			print '</td>';
		   print '</tr>';
		}
		print '</table><br />';

	// Close the statement	
		$stmt->close();
}
?>
<?php require('../incFrontend/incFooter.php'); ?>