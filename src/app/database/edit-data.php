<?php

global $conn;
require_once "connection.php";

$id = $_GET['id'];
$query = "SELECT * FROM diary WHERE id = '$id'";
$run = mysqli_query($conn, $query);
$row = mysqli_fetch_array($run);