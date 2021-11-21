<?php

    class User
    {
        const MARK = 123;
        public static $login = 'test';


        public static function getLogin()
        {
            echo self::$login;
        }


        public function  getMark()
        {
            echo User::MARK . "<br>";
            echo self::MARK;
        }
    }

    $abc = new User();


    echo $abc->login;