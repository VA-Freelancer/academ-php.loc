<?php
require_once('function.php');

if ($_POST['comment']) {
    $user = htmlspecialchars($_POST['user']);
    $comment = htmlspecialchars($_POST['comment']);
    $time = date("Y-m-d H:i:s");
    $safe = $connection->prepare("INSERT INTO `comments` SET user=:user, comment=:comment, date='$time'");
    $arr=['user'=>$user, 'comment'=>$comment];
//    debug($arr,  true);

    $safe->execute($arr);
//    debug($safe, true);

    header('Location: index.php');
}