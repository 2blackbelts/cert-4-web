<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
</head>
<body>
    <h1>Confirmation Page</h1>

    <p>Hello <?php print $_POST["name"]; ?></p>

    <p>Thank you for signing up using your email address <?php print $_POST["email"] ?></p>

    <p>We can see that you are from <?php print $_POST["country"]; ?></p>
    
    <p>We have sent you an email confirming your sign up.</p>


    <pre>
        <?php
            // check the letter box
            // print var_dump($_POST);
        ?>
    </pre>

</body>
</html>