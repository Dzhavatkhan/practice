<?php
session_start();
require_once 'connect.php';
$login = $_POST['login'];
$img = $_FILES['img'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$full_name = $_POST['full_name'];
$status = 'user';
if ($password === $confirm_password){
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_user) < 1){
    $password = md5($password);
    header('Location: index.html');
    $_SESSION['message'] = 'Регистрация прошла успешна';
    $path = 'img/' . time() . $_FILES['img']['name'];
    if (move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
        $_SESSION['message'] = 'Успешная регистрация';
        mysqli_query($connect,"INSERT INTO `users` (`id`, `login`, `password`, `img`, `full_name`, `status`) VALUES (NULL, '$login' , '$password' ,'$path', '$full_name', '$status')");
        header('Location: auth.php');
    } else {
        $_SESSION['message'] = 'Не удалось загрузить фотографию';
        header('Location: register.php');
    }
    }
    else {
        header('Location: register.php');
        $_SESSION['message'] = 'Такой логин существует придумайте пожалуйста другой';
    }
}
else {
    header('Location: register.php');
    $_SESSION['message'] = 'Пароли не совпадают';
}
