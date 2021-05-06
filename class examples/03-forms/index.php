<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <form action="confirm.php" method="POST">
        <label for="name">Full Name: </label>
        <input type="text" name="name" id="name">
        <br><br>

        <label for="email">Email Address: </label>
        <input type="email" name="email" id="email">
        <br><br>

        <label for="country">Country: </label>
        <input type="text" name="country" id="country">
        <br><br>

        <input type="submit" value="Sign Up">
    </form>
</body>
</html>