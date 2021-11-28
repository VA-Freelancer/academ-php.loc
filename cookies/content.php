<?php
session_start();

if(!$_SESSION['login'] || !$_SESSION['password']){
    header("Location: login.php");
    die();
}

if($_POST['unlogin']){
    session_destroy();
    header("Location: login.php");
}
?>

<body style="font-size: 40px">
    <p>Сайт только для авторизованных пользователей</p>
    <?php echo "Привет, " . $_SESSION['login'] . "<br>"; ?>
    <img src="1.jpg" alt="" alt="Pictore" width="600" style="display: block" >
    <form action="" method="POST" style="margin: 40px; font-size: 40px">
        <input type="submit" name="unlogin" value="НА СТРАНИЦУ АВТОРИЗАЦИИ">
    </form>
</body>
