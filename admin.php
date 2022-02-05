<?php
    session_start();
    if ($_SESSION['isAdmin'] === false)
    {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'profile.php';
        header("Location: http://$host$uri/$extra");
        exit;
    }
    include './inc/head.php'
?>
<section class="admin-dashboard-wrapper">
    <h1 class="text-uppercase">hello <?php echo $_SESSION['username'] ?></h1>
    <div class="user-list-wrapper">
    <?php
        require_once './objects/database.php';
        require_once './objects/user.php';
        require_once './objects/animal.php';

        $database = new Database;
        $users = $database->getUsers();

        foreach ($users as $user)
        {
            echo '
                <div class="user-list-item">
                    <span class="list-username">' . $user->username . '</span>
                    <span class="list-password">' . $user->email . '</span>
                </div>
            ';
        }
    ?>
    </div>
</section>
<?php
    include './inc/footer.php';
?>
