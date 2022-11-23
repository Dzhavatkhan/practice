<?php
session_start();
if (isset($_SESSION['user'])){
    header('Location: profile.php');
}
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
<a href="index.html" class="check">Вернуться на главную</a>
<form action="signin.php" method="post" enctype="multipart/form-data">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите логин">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <button type="submit">Войти</button>
    <p>
        У вас нет аккаунта? - <a href="register.php">зарегистрируйтесь</a>
    </p><br>
    <?php
    if (isset($_SESSION['message'])){
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
    }
    unset($_SESSION['message'])
    ?>
</form>
</body>
</html>