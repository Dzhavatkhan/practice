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
<a href="index.html">Вернуться на главную</a>
<form action="signup.php" method="post" enctype="multipart/form-data">
    <label>Ваше полное имя</label>
    <input type="text" name="full_name" placeholder="Введите полное имя" required>
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите логин" required>
    <label>Иконка</label>
    <input type="file" name="img" required>
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль" required>
    <label>Повторите пароль</label>
    <input type="password" name="confirm_password" placeholder="Введите снова пароль" required>
    <button>Зарегистрироваться</button>
    <p>
        У вас есть аккаунт? - <a href="auth.php">авторизируйтесь</a>
    </p><br>
    <?php
    if (isset($_SESSION['message'])){
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        unset ($_SESSION['message']);
    }
    ?>
</form>
</body>
</html>