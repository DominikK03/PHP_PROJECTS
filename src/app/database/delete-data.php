<?php

global $conn;
require_once 'connection.php';

$record_id = $_GET['id'];

$query = "DELETE FROM diary WHERE id = '$record_id'";
$run = mysqli_query($conn,$query);

if($run){
    header("Location: /public/diary.php?note-deleted");
}