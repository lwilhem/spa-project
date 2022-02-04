<?php
    session_start();
    include './inc/head.php'
?>
    <section class="bg-primary">
    <?php
    if (empty($_SESSION['userId'])){
        include './inc/login_form.php';
    }
    ?>
    </section>

<?php
    include './inc/footer.php';