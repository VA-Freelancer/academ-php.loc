<?php
include_once('../portfolio-db/function.php');
if (isset($_POST['submit'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];
    $fileSize = $_FILES['file']['size'];


    $fileExtension = strtolower(end(explode('.', $fileName)));
    $fileName = explode('.', $fileName)[0];

    $fileName = preg_replace('/[0-9]/', '', $fileName);
    $allowedExtensions = ['jpg', 'jpeg', 'png'];


    if (in_array($fileExtension, $allowedExtensions)) {
        if ($fileSize < 5000000) {
            if ($fileError === 0) {
                // debug($fileName, true);
                $connection->query("INSERT INTO `images` (`imgname`, `extension`) VALUES ('$fileName', '$fileExtension');");
                $lastID = $connection->query("SELECT MAX(id) FROM `images`;");
                $lastID = $lastID->fetchAll();
                $lastID = $lastID[0][0];
                $fileNameNew = $lastID . $fileName . '.' . $fileExtension;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo  "Успех";
                header("Location: index.php");
            } else {
                echo "Что-то пошло не так";
            }
        } else {
            echo "Слишкий большой размер файла";
        }
    } else {
        echo 'Неверный тип файлов';
    }
} else {
    header("Location: index.php");
}
