<form action="" method="post">
    <label for="login-firstname">
        <input type="text" name="login-username">
    </label>
    <label for="login-lastname">
        <input type="password" name="login-password">
    </label>
    <input type="submit" name="login-submit">
</form>
<?php
    if(!empty($_POST['login-username']) && !empty($_POST['login-password']))
    {
        require_once './objects/database.php';
        require_once './objects/auth.php';

        $database = new Database;
        $userAuth = new Auth($_POST['login-username'], $_POST['login-password']);

        $database->userLogin($userAuth);

    }
?>
