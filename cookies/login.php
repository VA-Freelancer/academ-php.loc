<?php

    ini_set('session.gc_maxlifetime', 3600);

    session_start();
    $connection = new PDO('mysql:host=localhost;dbname=practice_db;charset=utf8', 'root', '');
    $login = $connection->query('SELECT * FROM `login`')->fetchAll();
    if($_POST['login']){
        foreach($login as $log){

            if ($_POST['login'] === $log['login'] && $_POST['password'] === $log['password']){
                $_SESSION['login'] = $log['login'];
                $_SESSION['password'] = $log['password'];
                header("Location: content.php");
            }
        }

        echo "Неверные логин или пароль";
}
?>

<style>
    body{
        margin: 200px 200px;
    }
    input, p{
        font-size: 30px;
        margin: 10px;
    }
</style>

<form method="POST">
    <p>Авторизуйтесь</p>
    <input type="text" name="login" required placeholder="Логин"><br>
    <input type="password" name="password" required placeholder="Пароль"><br>
    <input type="submit">
</form>