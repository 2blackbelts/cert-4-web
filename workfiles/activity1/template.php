<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/main.css" />
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
	<!-- Created by Saim on 29/04/21 -->
   <title> </title>
</head>   
<body>
  <h1>This is a main heading</h1> 
  <p>
     <?php
        $hour = date('H');
        // $hour = 05;
        $username = "saim";

        // check if it's before 12 pm
        if ($hour < 12) {
          // good morning
          print "Good Morning, " . $username;
        }
        // check if it's before 5pm
        elseif ($hour < 17) {
          // good afternoon
          print "Good Afternoon, " . $username;
        } 
        // check if it's past 5pm
        elseif ($hour >= 17) {
          // good evening
          print "Good Evening, " . $username;
        } 
        // fallback 'if all else fails'
        else {
          print "Hi";
        }


     ?>
  </p>
  <footer>
    <p>
          &#169; Copyright Dungeon Algorithm Agency 2021
    </p>
  </footer>
</body>
</html>