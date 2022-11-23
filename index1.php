<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-type: json/application');

require 'connect.php';
require 'function.php';

$method = $_SERVER['REQUEST_METHOD'];
$a = $_GET['a'];
$params = explode('/', $a);
$type = $params[0];
$name = $params[1];
if(isset($params[2])){
    $id = $params[2];
}

if ($method === 'GET') {
    if ($type === 'posts') {
        if ($name === 'author') {
            if (isset($id)) {
                getPost_author($connect, $id);

            } else {
                getPosts_author($connect);

            }

        }
        elseif ($name === 'janr') {
            if (isset($id)) {
                getPost_janr($connect, $id);

            } else {
                getPosts_janr($connect);

            }
        }
        elseif ($name === 'book') {
            if (isset($id)) {
                getPost_book($connect, $id);
            } else {
                getPosts_book($connect);

            }
        }
    }
        } elseif ($method === 'POST') {
            if ($type === 'posts') {
                if ($name === 'author'){
                addPost_author($connect, $_POST);
            }elseif ($name === 'janr') {
                    addPost_janr($connect, $_POST);
                }
                elseif ($name === 'book'){
                    addPost_book($connect, $_POST);
                }
            }
        }
        elseif ($method === 'PATCH') {
            if ($type === 'posts') {
                if ($name === 'author'){
                if (isset($id)) {
                    $data = file_get_contents('php://input/author');

                    $data = json_decode($data, true);

                    updatePost_author($connect, $id, $data);
                }}
                elseif ($name === 'janr'){
                    if (isset($id)) {
                        $data = file_get_contents('php://input');

                        $data = json_decode($data, true);

                        updatePost_janr($connect, $id, $data);
                    }}
                elseif ($name === 'book'){
                    if (isset($id)) {
                        $data = file_get_contents('php://input');
                        $data = json_decode($data, true);
                        updatePost_book($connect, $id, $data);
                    }}
            }
        }
elseif ($method === 'DELETE') {
            if ($type === 'posts') {
                if ($name === 'author'){
                if (isset($id)) {
                    deletePost_author($connect, $id);
                }}
                elseif ($name === 'janr'){
                    if (isset($id)) {
                        deletePost_janr($connect, $id);
                    }}
                elseif ($name === 'book'){
                    if (isset($id)) {
                        deletePost_book($connect, $id);
                    }}
            }
}













