<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RENDU POO - Profile</title>
</head>
<body>
    <h1>PROFILE</h1>
    <?php
        if(empty($_SESSION))
        {
            include './inc/login_form.php';
        }
    ?>
</body>
</html>