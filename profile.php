<?php
session_start();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style123.css">
</head>
<body>
<form>
    <img src="<?= $_SESSION['user']['img'] ?>" width="400" alt="">
    <h2 style="margin: 10px 0;"><?php echo 'Здравствуйте ' . $_SESSION['user']['full_name'] ?></h2>
    <h4 style="margin: 10px 0;"><?php echo 'Ваш UID: ' . $_SESSION['user']['id'] ?></h4>
    <a href="index.html" style="width: 100px">На главную</a>
    <a href="logout.php" class="logout" style="width: 50px; float: right">Выход</a>
</form>
</body>
</html>