<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RENDU POO - Login</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="register-firstname" id="register-firstname">
    <input type="text" name="register-lastname" id="register-lastname">
    <input type="email" name="register-email" id="register-email">
    <input type="password" name="register-password" id="register-password">
    <input type="password" name="register-password-check" id="register-password-check">
    <input type="submit" value="Create your account">
</form>

<?php

    require_once 'user.php';
    require_once 'database.php';

    if(!empty($_POST['register-firstname']) && !empty($_POST['register-lastname']) && !empty($_POST['register-email']) && !empty($_POST['register-password']))
    {
        if($_POST['register-password'] === $_POST['register-password-check'])
        {
            $user = new User($_POST['register-email'], $_POST['register-password'], $_POST['register-firstname'], $_POST['register-lastname']);

            $database = new Database;
            $database->createUser($user);

            getUsers();
        } else {
            echo '<b>Password don\'t match.</b>';
            }
    }
?>
</body>
</html>