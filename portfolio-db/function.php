<?php
include_once('config.php');
function debug($var, bool $stop): string
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";

    if ($stop) die;

    return false;
}
function get_url(string $page = ''): string
{
    return HOST . "/$page";
}

class ConnectionDB
{
    protected $host;
    protected $dbname;
    protected $charset;
    public function __construct($host = "localhost", $dbname = "practice_db", $charset = "utf8", $username = "root", $password = "")
    {

        $this->host = $host;
        $this->dbname = $dbname;
        $this->charset = $charset;
        $this->username = $username;
        $this->password = $password;
    }
    public function getQueryDateFetchAllDB($table)
    {
        $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}", "{$this->username}", "{$this->password}",  [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $connection->query("SELECT * FROM $table")->fetchAll();
    }
    public function getQueryDateFetchDB($table)
    {
        $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}", "{$this->username}", "{$this->password}", [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $connection->query("SELECT * FROM $table")->fetch();
    }
}

$connect = new ConnectionDB();
$aboutDate = $connect->getQueryDateFetchDB('about');
$educationData = $connect->getQueryDateFetchAllDB('education');
$langData =  $connect->getQueryDateFetchAllDB('language');
$intData =  $connect->getQueryDateFetchAllDB('interests');
$careers =  $connect->getQueryDateFetchAllDB('careers');
$aboutCareer =  $connect->getQueryDateFetchDB('aboutcareer');
$skills =  $connect->getQueryDateFetchAllDB('skills');
$introProjects =  $connect->getQueryDateFetchAllDB('intro');
$projects =  $connect->getQueryDateFetchAllDB('projectslist');
$avatar = $aboutDate['avatar'];


$connection = new PDO('mysql:host=localhost;dbname=practice_db;charset=utf8', 'root', '');



$allComments = $connection->query("SELECT * FROM comments SORT  ORDER BY id DESC;")->fetchAll();
// получения данных для авторизации и регистрации пользователя
function logged_in(): bool
{
    return isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']);
}
function get_user_info($login)
{
    return db_query("SELECT * FROM `users` WHERE `login` = '$login';")->fetch();
}
function login($auth_data)
{
    if (
        empty($auth_data) ||
        !isset($auth_data['login']) || empty($auth_data['login']) ||
        !isset($auth_data['password']) || empty($auth_data['password'])
    ) return false;
    $user = get_user_info($auth_data['login']);
    if (empty($user)) {
        $_SESSION['error'] = "Логин или пароль не найдены";
        redirect_page();
        die;
    }
    if (password_verify($auth_data['password'], $user['pass'])) {
        $_SESSION['user'] = $user;
        $_SESSION['error'] = '';

        //        redirect_page('user-posts.php?id=' .  $_SESSION['user']['id']);
        die;
    } else {
        $_SESSION['error'] = 'Пароль не верный';
        redirect_page();
    }
    die;
}
