<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/main.css" />
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
	<!-- PHP script created by YOUR NAME on TODAY'S DATE -->
	<title>Introduction to PHP</title>
</head>   
<body>
  <h1>My first PHP script</h1>  
  <p>
    <img src="img/world.png" width="180" height="180" alt="Planet Earth under the microscope" />
    <?php
        $msg = "Hello World!";
        print $msg;

        print '<br>Hello ' . date('y');
    ?>
  </p>
  <footer>
    <p>
          &#169; Copyright Dungeon Algorithm Agency <?php print date('Y'); ?>
    </p>
  </footer>
</body>
</html>