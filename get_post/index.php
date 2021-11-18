

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get and Post</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="username">
        <input type="text" name="text2">
        <input type="submit">
    </form>
</body>
</html>
<?php
echo date('d-m-Y H:i:s');
echo "<br>";
echo microtime();
echo "<br>";
echo time();
function debug($var, bool $stop): string
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";

    if($stop) die;

    return false;
}
debug($_REQUEST, true);
