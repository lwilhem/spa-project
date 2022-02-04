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
        var_dump($_POST);
    }
?>
