<?php
$connect = mysqli_connect('localhost','root','root','online-books');

if (!$connect) {
    die ('Error connect');
}