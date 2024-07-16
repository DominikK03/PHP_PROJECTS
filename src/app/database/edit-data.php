<?php

global $conn;
require_once 'connection.php';

$id = $_POST['data_id'];
$date = $_POST['date'];
$title = $_POST['title'];
$description = $_POST['description'];

$query = "UPDATE diary SET date = '$date', name = '$title', description = '$description' WHERE id = '$id'";

$run = mysqli_query($conn, $query);

if ($run){
    header("Location: /public/diary.php?note-updated");
}