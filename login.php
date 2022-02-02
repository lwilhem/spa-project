<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>RENDU POO - Login</title>
</head>
<body>
<header class="header-wrapper">

</header>
<section class="login-wrapper">
    <form action="" method="post"> <!-- REGISTER FORM -->
        <label for="register-firstname">
            <span>First Name : </span>
            <input type="text" name="register-firstname" id="register-firstname">
        </label>
        <label for="register-lastname">
            <span>Last Name : </span>
            <input type="text" name="register-lastname" id="register-lastname">
        </label>
        <label for="register-email">
            <span>Email : </span>
            <input type="email" name="register-email" id="register-email">
        </label>
        <label for="register-password">
            <span>Password : </span>
            <input type="password" name="register-password" id="register-password">
        </label>
        <label for="register-password-check">
            <span>Confirm Password : </span>
            <input type="password" name="register-password-check" id="register-password-check">
        </label>

        <input type="submit" value="Create your account">
    </form>
</section>
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

            //$database->getUsers();
        } else {
            echo '<b>Password don\'t match.</b>';
            }
    }
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>