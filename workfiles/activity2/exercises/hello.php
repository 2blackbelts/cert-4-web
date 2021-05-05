<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<link rel="stylesheet" href="css/main.css" />
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
    <!-- Created by Robynne on 13 July 2015 -->
    <title>PHP Refresher</title>
</head>  
<body>
  <h1>My first PHP program... for semester 2</h1>
  <p>
    Greetings Earthlings! <br /><br />
    <img src="img/world.png" width="180" height="180" alt="Planet Earth under the microscope" />
    <br /><br />
    <?php
		$greeting = 'Hello';
        // Check the time of day, and display an appropriate message
        if (date('H') < 6) {
            $greeting = 'You\'re up early!';
        }
        
        print $greeting;
        
        
        // For those who don't know what day of the week it is...
        print '<br /><br />Today is ' . date('l j M, Y');
        print ' and the time is ' . date('H:i'); 
    ?>
    <br /><br />
  </p>
  <footer>
    <p> &#169; Copyright Monica Key &#38; Associates 2015 </p>
  </footer>
</body>
</html>