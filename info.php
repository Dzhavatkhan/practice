<?php
require_once 'connect.php';
$author = mysqli_query($connect,"SELECT * FROM `author` WHERE id = 1");
while ($row = $author->fetch_assoc()) {
    $da = $row['name'] . $row['surname'];
}
$id = $_GET['id'];
$check = mysqli_query($connect, "SELECT * FROM `author and book` INNER JOIN `author` on `author and book`.`id_a`=`author`.`id`
INNER JOIN `book` on `author and book`.`id_b`=`book`.`id` WHERE `author`.`id` = '$id'");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="cont">
    <div class="post-full">

        <h5 class="card-name">Автор(ы): </h5>

        <p class="card-namebook">Название книги: ${response.namebook}</p>

        <p class="description">Краткое описание: ${response.description}</p>

        <h1>Оставьте отзыв о товаре</h1>

        <form action="grade.php" method="post">
            <label>Ваша оценка</label>
            <div class="rating-area">
                <input type="radio" id="star-5" name="rating" value="5">
                <label for="star-5" title="Оценка «5»"></label>\t
                <input type="radio" id="star-4" name="rating" value="4">
                <label for="star-4" title="Оценка «4»"></label>
                <input type="radio" id="star-3" name="rating" value="3">
                <label for="star-3" title="Оценка «3»"></label>
                <input type="radio" id="star-2" name="rating" value="2">
                <label for="star-2" title="Оценка «2»"></label>
                <input type="radio" id="star-1" name="rating" value="1">
                <label for="star-1" title="Оценка «1»"></label>
            </div>

            <label>Отзыв</label>
            <textarea name="text"></textarea>
            <button type="submit">Отправить</button>
        </form>
        <a href="index.html" class="back-info" onclick="clearbbb()">Назад</a>

    </div>
</div>
</body>
</html>