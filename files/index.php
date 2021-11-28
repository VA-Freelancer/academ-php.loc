<?php
include_once('../portfolio-db/function.php');


$data = $connection->query("SELECT * FROM `images`;");
?>
<style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container form {
        padding: 15px;
        border-radius: 15px;
    }

    .container form input {
        margin-bottom: 15px;
    }

    code pre {
        background-color: black;
        padding: 15px;
        color: white;
    }
</style>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="../portfolio-db/assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../portfolio-db/assets/plugins/font-awesome/css/font-awesome.css">
    <title>Document</title>
</head>

<body>
    <div style='display:flex; align-items: flex-end; flex-wrap: wrap;'>
        <?php
        foreach ($data as $img) {
            $delete = "delete" . $img['id'];
            $image = "uploads/" . $img['id'] . $img['imgname'] . '.' . $img['extension'];
            if (isset($_POST[$delete])) {
                $imageID = $img['id'];
                $connection->query("DELETE FROM `practice_db`.`images` WHERE id='$imageID'");
                if (file_exists($image)) {
                    unlink($image);
                }
            }

            if (file_exists($image)) {
        ?>
                <div>
                    <img width="200" height="200" class="img-thumbnail" src="<?= $image; ?>">
                    <form method="POST">
                        <button class="btn btn-danger" name="<?= "delete" . $img['id'] ?>" style='display:block; margin:auto;'>
                            Удалить
                        </button>
                    </form>
                </div>
            <?php } ?>
        <?php } ?>

    </div>
    <div class="container">
        <form method="POST" action="addimage.php" enctype="multipart/form-data" class="bg-dark text-white">
            <input type="file" name="file" required class="form-control">
            <button name="submit" class="btn btn-info">Отправить</button>
        </form>
    </div>

</body>

</html>