<?php 
  define('ALLOW_ACCESS', 1); //define a constant to set permission to use includes  
	$title = 'Home page';         
	require('../incFrontend/incHeader.php');
?> 
    <div class="rightimg">
      <img src="img/dungeon.jpg" width="353" height="353" alt="Line drawing of a fortress, which might possibly have a dungeon" />
    </div>
    <h2>Welcome to our online Antique Shoppe</h2>
    <p>
        <br />We have an unusual and rather specialised range of antiques.<br /><br />
        Please take some time to browse our product list, and if you're studying Cert 4 Web Design, feel free to browse our  
        top secret source code. This website will teach you lots of important things about
        using MySQL databases to generate dynamic content for PHP pages.
        <br /><br /><br />
        We hope to hear from you soon.  
    </p>
<?php require('../incFrontend/incFooter.php'); ?>