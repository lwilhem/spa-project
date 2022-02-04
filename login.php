<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>RENDU POO - Login</title>
</head>
<body>
<section class="container">
    <form action="" method="post" class="d-flex flex-column"> <!-- REGISTER FORM -->
        <label for="register-firstname" class="form-label">
            <span>First Name : </span>
            <input type="text" name="register-firstname" id="register-firstname" class="form-control">
        </label>
        <label for="register-lastname" class="form-label">
            <span>Last Name : </span>
            <input type="text" name="register-lastname" id="register-lastname" class="form-control">
        </label>
        <label for="register-email" class="form-label">
            <span>Email : </span>
            <input type="email" name="register-email" id="register-email" class="form-control">
        </label>
        <label for="register-password" class="form-label">
            <span>Password : </span>
            <input type="password" name="register-password" id="register-password" class="form-control">
        </label>
        <label for="register-password-check" class="form-label">
            <span>Confirm Password : </span>
            <input type="password" name="register-password-check" id="register-password-check" class="form-control">
        </label>

        <input type="submit" value="Create your account">
    </form>
</section>
<?php

    require_once './objects/user.php';
    require_once './objects/database.php';

    if(!empty($_POST['register-firstname']) && !empty($_POST['register-lastname']) && !empty($_POST['register-email']) && !empty($_POST['register-password']))
    {
        if($_POST['register-password'] === $_POST['register-password-check'])
        {
            $user = new User($_POST['register-email'], $_POST['register-password'], $_POST['register-firstname'], $_POST['register-lastname']);

            $database = new Database;
            $database->createUser($user);

            //$database->getUsers();
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'profile.php';
            header("Location: http://$host$uri/$extra");
            exit;
        } else {
            echo '<b>Password don\'t match.</b>';
            }
    }
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>