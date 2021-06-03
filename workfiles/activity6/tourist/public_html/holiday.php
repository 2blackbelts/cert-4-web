<?php 
	$title = 'Holiday Ideas';     
	require('../includes/incHeader.php');  
	require_once('../includes/connect.php');

if (isset($_POST['cmdSubmit'])) {	// FORM HAS ALREADY BEEN DISPLAYED  
  // CREATE VARIABLES from form's POST data, then redisplay the form and selected image  
	$locationID = $_POST['cboLocationID'];
	
  // Set up and run the database query, using the selected location
	$sql = 'SELECT * FROM Location WERE locationID = ?';
	if ($stmt = prepare($sql)) {

		$stmt->bind_param('i', $locationID);
		
		$stmt->execute();

		$stmt->bind_result($row_locationID, $row_locName, $row_locImageName, $row_locImageWidth, $row_locImageHeight,$row_locArea, $row_locAttraction, $row_locEvents, $row_locUpdate); 

		while ($stmt->fetch()) {
			$locationID = $row_locationID;
			$locImageName = $row_locImageName;
			$alt = $row_locName;
			$locImageWidth = $row_locImageWidth;
			$locImageHeight = $row_locImageHeight;

			$locArea = $row_locArea;
			$locAttraction = $row_locAttraction;
			$locEvents = $row_locEvents;
		}
		$stmt->close();
	
	else {
	 	print '*** Could not read Tourist information. Please try again later ***' . $db->error;
	}

}
else {  
	// FORM IS BEING DISPLAYED FOR FIRST TIME: Initialise variables
  	$locationID = 1;
    $locArea = '';
    $locAttraction = '';
    $locEvents = '';
  	$locImageName = 'outback.jpg';
    $locImageWidth = 379;
    $locImageHeight = 415;
    $alt = 'Sturt peas in Outback NSW';
} 

// An image is always displayed, as is the main heading
	print '<p><img src="img/' . $locImageName . '"'; 
	print ' width="' . $locImageWidth . '" height="' . $locImageHeight . '"';
	print ' alt="' . $alt . '" class="rightimg" /></p>';

	print "\n<h2>Scenic Views</h2>";
?>

<form id="frmLocation" method="post" action="holiday.php">
  <p>
  	<label>Choose a location:</label>
	<select name="cboLocationID">
		<?php
			//Set up a drop-down list of locations
			$sql = 'SELECT locationID, locname FROM Location ORDER BY locName';
			if ($stmt = $db->prepare($sql)) {
				
				$stmt->execute();
				$stmt->bind_result($row_locationID, $row_locName);

				while ($stmt->fetch()) {
					print '<option ';
					if ($row_locationID == $locationID) { print 'selected '; }
					print 'value="';
					print $row_locationID;
					print '">';
					print $row_locName;
					print '</option>';
				}
			}
			else { print 'ERROR: Locations currently unavailable.  Please try again later.';
			}
		?>
	</select>
	<input type="submit" name="cmdSubmit" id="cmdSubmit" class="button" value="Click for details" />
	<br /><br /><br />

	<label for="txtArea">Locality:</label>
	<input type="text" name="txtArea" id="txtName" size="50" value="<?php print $locArea; ?>" readonly="readonly" />
  	<br /><br />
  	
  	<label for="txtEvents">Events:</label>
	<input type="text" name="txtEvents" id="txtEvents" size="50" value="<?php print $locEvents; ?>" readonly="readonly" />
  	<br /><br />
  	
  	<label for="txtAttraction">Attractions:</label>
  	<textarea name="txtAttraction" id="txtAttraction" cols="60" rows="8" readonly="readonly"><?php print $locAttraction;?></textarea>
	<br /><br />
  </p>
</form>
<?php 
	// Close the connection to mysql
	$db->close();
	require('../includes/incFooter.php');
?>