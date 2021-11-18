<?php


//function debug($var, bool $stop): string
//{
//    echo "<pre>";
//    print_r($var);
//    echo "</pre>";
//    if($stop) die;
//    return false;
//}
if(isset($_POST['username'])){
    echo 'Привет,  ' .  $_POST['username'];
    die;
}