<?php
  if(!defined('ALLOW_ACCESS'))
    die('Direct access to this file is not allowed');
  session_start();
?>
<!DOCTYPE html>     
<html lang="en">
<head>
	<meta charset="utf-8" /> 
	<meta name="robots" content="noindex, nocache" />
	<link rel="stylesheet" href="../css/main.css" />
	<link rel="shortcut icon" href="favicon.ico" />
	<!--[if lt IE 9]>
		<script src="../js/html5shiv.js"></script>
	<![endif]-->
  <title>Ye Olde Dungeon Antiques <?php print $title; ?></title> 
</head>
<body>
<div id="wrapper">
  <header role="banner">
      <div class="rightimg">
        <img src="../img/logo.jpg" width="157" height="111" alt="ornate black and white line drawing of people reading books" title="" />
      </div>
      <h1>Ye Olde Dungeon Antiques</h1>
  </header>
  <h2> *** Administration Area ***</h2>
  <nav role="navigation">
      <a href="index.php">Login</a> 
      <a href="addProduct.php">Add a new product</a> 
      <a href="updateProduct.php">Update an existing product</a> 
      <a href="deleteProduct.php">Delete a product</a>
  </nav>
  <div id="content">