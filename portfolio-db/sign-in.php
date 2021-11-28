<?php
    include_once 'function.php';
    debug($_POST, true);
    if(isset($_POST['login'])) login($_POST);
