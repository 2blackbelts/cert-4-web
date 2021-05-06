<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
</head>
<body>

<?php
    // init variables (check the mail)
    $name = $_POST["name"];
    $email = $_POST["email"];
    $name_message = "";
    $email_message = "";
    $error = 0;


    // validation
    if (empty($name)) {
        $name_message = "Name field is required. Please return to sign up.";
        $error = 1;
    }

    if (empty($email)) {
        $email_message = "Email field is required. Please return to sign up.";
        $error = 1;
    }

?>
    <h1>Confirmation Page</h1>
    <p style="color:red;">
        <?php 
            print $name_message; 
            print '<br>';
            print $email_message;
        ?>
    </p>

    <?php
        // no errors
        if($error == 0) {
    ?>
        <p>Hello <?php print $_POST["name"]; ?></p>

        <p>Thank you for signing up using your email address <?php print $_POST["email"] ?></p>

        <p>We can see that you are from <?php print $_POST["country"]; ?></p>
        
        <p>We have sent you an email confirming your sign up.</p>

    <?php
        };
    ?>


    <pre>
        <?php
            // check the letter box
            // print var_dump($_POST);
        ?>
    </pre>

</body>
</html>