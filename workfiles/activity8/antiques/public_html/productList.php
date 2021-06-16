<?php
  define('ALLOW_ACCESS', 1); //define a constant to set permission to use includes  
	$title = 'Product List';     
	require('../incFrontend/incHeader.php');
	require_once('../incFrontend/connect.php'); 
?> 
    <h2>List of all Products</h2>
    <p><br /><em>Click an image to see a larger version</em></p>  
    <p>
    <table width="65%">
      <tr>
          <th class="leftText">Image</th>
          <th class="leftText">Product ID</th>
          <th class="leftText">Category</th>
          <th class="leftText">Name</th>
          <th class="rightText">Price</th>
      </tr>
<?php
// set up the SQL query to display ALL products

	// Prepare the MySQL statement
	$sql = 'SELECT p.pImage, p.productID, c.cDesc, p.pName, p.pPrice FROM Category as c, Product as p WHERE c.categoryID = p.categoryID';
	$stmt = $db->prepare($sql);

	// Execute the MySQL statement
		$stmt->execute();

	// Bind PHP variables to the output from the prepared statement
		$stmt->bind_result($pImage, $productID, $cDesc, $pName, $pPrice);
		
	// Fetch and display the output
    print "\n";
		while ($stmt->fetch()) {
			print '<tr>';
				print '<td>';
				print '<a href="gallery/' . $pImage . '">';
				print '<img src="galleryThumbs/' . $pImage . '" width="65" height="60" alt="product image" /></a>';
				print '</td>';
				print '<td>';
				print $productID;
				print '</td>';
				print '<td>';
				print $cDesc;
				print '</td>';
				print '<td>';
				print $pName;
				print '</td>';
				print '<td class="rightText">';
				printf("%0.2f", $pPrice);	// format price to 2 decimal places
				print '</td>';
			print "</tr>\n";
		}
	// Close the statement	
		$stmt->close();
	// close the database connection
		$db->close();  
?>
    </table>
    </p>
<?php require('../incFrontend/incFooter.php'); ?>