<form action="" method="post">
    <label for="login-firstname">
        <input type="text" name="login-firstname">
    </label>
    <label for="login-lastname">
        <input type="text" name="login-lastname">
    </label>
    <label for="login-lastname">
        <input type="password" name="login-password">
    </label>
    <input type="submit" name="login-submit">
</form>
<?php
    if(!empty($_POST['login-lastname']) && !empty($_POST['login-firstname']) && !empty($_POST['login-password']))
    {
        require_once './objects/database.php';
        require_once './objects/auth.php';

        $database = new Database;
        $userAuth = new Auth($_POST['login-firstname'], $_POST['login-lastname'], $_POST['login-password']);

        $database->userLogin($userAuth);

    }
?>
