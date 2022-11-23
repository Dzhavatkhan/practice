<?php

function getPosts_author($connect) {
    $posts = mysqli_query($connect,'SELECT * FROM `author and book` INNER JOIN `book` on `author and book`.`id_b`=`book`.`id`
    INNER JOIN `author` on `author and book`.`id_a`=`author`.`id`');
    $postList = [];
    while ($post = mysqli_fetch_assoc($posts)){
        $postList[] = $post;
    }
    echo json_encode($postList);
}

function getPost_author($connect, $id) {

    $post = mysqli_query($connect,"SELECT * FROM `author and book` INNER JOIN `author` on `author and book`.`id_a`=`author`.`id`
    INNER JOIN `book` on `author and book`.`id_b`=`book`.`id` WHERE `author`.`id` = '$id'");
    $post = mysqli_fetch_assoc($post);
    echo json_encode($post);
}

function addPost_author($connect, $data) {

    $name = $data['name'];
    $surname = $data['surname'];
    $sql = "INSERT INTO `author` (`name`, `surname`) VALUES ('$name', '$surname')";
    mysqli_query($connect, $sql) or die('бд не работает: ' . mysqli_error($connect));
    http_response_code(201);
    $res = [
      "status" => true,
      "post_id" => mysqli_insert_id($connect)
    ];
    echo json_encode($res);
}

function updatePost_author($connect, $id, $data) {
    $name = $data['name'];
    $surname = $data['surname'];
    mysqli_query($connect, "UPDATE `author` SET `name` = '$name', `surname` = '$surname' WHERE `author`.`id` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "Post is update"
    ];
    echo json_encode($res);
}
function deletePost_author($connect, $id) {
    mysqli_query($connect, "DELETE FROM `author` WHERE `id` = '$id'");
    $res = [
        "status" => true,
        "message" => "Post is delete"
    ];
    echo json_encode($res);
}
function getPosts_book($connect) {
    $posts = mysqli_query($connect,'SELECT * FROM `book and janr` INNER JOIN `janr` on `book and janr`.`id_j`=`janr`.`id`
INNER JOIN `book` on `book and janr`.`id_b`=`book`.`id`');
    $postList = [];
    while ($post = mysqli_fetch_assoc($posts)){
        $postList[] = $post;
    }
    echo json_encode($postList);
}

function getPost_book($connect, $id) {

    $post = mysqli_query($connect,"SELECT * FROM `book and janr` INNER JOIN `janr` on `book and janr`.`id_j`=`janr`.`id`
INNER JOIN `book` on `book and janr`.`id_b`=`book`.`id`  WHERE `id_b` = '$id'");
    $post = mysqli_fetch_assoc($post);
    echo json_encode($post);
}

function addPost_book($connect, $data) {
    $namebook = $data['namebook'];
    $sql = "INSERT INTO `book` (`namebook`) VALUES ('$namebook')";
    mysqli_query($connect, $sql) or die('бд не работает: ' . mysqli_error($connect));
    http_response_code(201);
    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];
    echo json_encode($res);
}

function updatePost_book($connect, $id, $data) {
    $namebook = isset($data['namebook']) ? $data['namebook'] : null;
    mysqli_query($connect, "UPDATE `book` SET `namebook` = '$namebook' WHERE `book`.`id` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "Post is update"
    ];
    echo json_encode($res);
}
function deletePost_book($connect, $id) {
    mysqli_query($connect, "DELETE FROM `book` WHERE `id` = '$id'");
    $res = [
        "status" => true,
        "message" => "Post is delete"
    ];
    echo json_encode($res);
}
function getPosts_janr($connect) {
    $posts = mysqli_query($connect,'SELECT * FROM `janr`');
    $postList = [];
    while ($post = mysqli_fetch_assoc($posts)){
        $postList[] = $post;
    }
    echo json_encode($postList);
}

function getPost_janr($connect, $id) {

    $post = mysqli_query($connect,"SELECT * FROM `janr` WHERE `id` = '$id'");
    $post = mysqli_fetch_assoc($post);
    echo json_encode($post);
}

function addPost_janr($connect, $data) {

    $namejanr = $data['namejanr'];
    $sql = "INSERT INTO `blogs` (`namejanr`) VALUES ('$namejanr')";
    mysqli_query($connect, $sql) or die('бд не работает: ' . mysqli_error($connect));
    http_response_code(201);
    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];
    echo json_encode($res);
}

function updatePost_janr($connect, $id, $data) {
    $namejanr = isset($data['namejanr']) ? $data['namejanr'] : null;
    mysqli_query($connect, "UPDATE `janr` SET `namejanr` = '$namejanr' WHERE `janr`.`id` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "Post is update"
    ];
    echo json_encode($res);
}
function deletePost_janr($connect, $id) {
    mysqli_query($connect, "DELETE FROM `janr` WHERE `id` = '$id'");
    $res = [
        "status" => true,
        "message" => "Post is delete"
    ];
    echo json_encode($res);
}