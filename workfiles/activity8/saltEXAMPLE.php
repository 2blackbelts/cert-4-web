<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="utf-8" />  
    <link rel="stylesheet" href="css/main.css" />  
    <title>Salted password EXAMPLE</title>   
</head> 
<body>  
<h1>Examples of unsalted (less secure) and salted (more secure) password hashing algorithms</h1>
<p>
<?php
$pwd="secret";
$salt = '~Du^ge0n#';
  
// Examples of unsalted and salted passwords
  print "<strong>Password:</strong><br />";
  print $pwd;
  print "<br /><strong>Salted Password:</strong><br />";
  print $salt . $pwd;
  
  // MD5 is NOT very secure!!!
  print "<br /><br /><strong>MD5:</strong><br />";
  print md5($pwd);
  print "<br /><strong>Salted MD5:</strong><br />";
  print md5($salt . $pwd);
  
  // SHA1 is better than MD5, but if you have PHP version 5.1.2 or higher, use SHA2
  print "<br /><br /><strong>SHA1:</strong><br />";
  print sha1($pwd);
  print "<br /><strong>Salted SHA1:</strong><br />";
  print sha1($salt . $pwd);
  
  // SHA2 can be used with various values, eg sha256   sha384   sha512.  This example used sha256
  print "<br /><br /><strong>SHA2 (sha256) used with hash():</strong><br />";
  print hash('sha256', $pwd);
  print "<br /><strong>Salted SHA2:</strong><br />";
  print hash('sha256', $salt . $pwd);
  
  print "<br /><br /><strong>Whirlpool used with hash():</strong><br />";
  print hash("whirlpool", $pwd);
  print "<br /><strong>Salted Whirlpool:</strong><br />";
  print hash("whirlpool", $salt . $pwd);
   
// Note: if you wish to generate a random salt (ie, a random string), you need to store this in the
// database or it would be impossible to later match and verify passwords. If you do this,it is very
// important to store the salt in ENCRYPTED format (as a separate field from the password) in the database.
// Here is an example of generating a random salt:

// generate a random salt
  $salt = md5(uniqid(rand(), true));
  $salt = substr($salt, rand(0,20), 12);
?>
</p>
</body>
</html>