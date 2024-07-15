<?php

global $conn;
require_once 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
} else {
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $title = $_POST['title'];
        $description = $_POST['description'];


        $query = "INSERT INTO diary (date, name, description) VALUES ('$date', '$title', '$description')";
        $autoincrement = "ALTER TABLE diary AUTO_INCREMENT = 1";
        $autoincrement = $conn->query($autoincrement);
        $run = mysqli_query($conn, $query);

        if ($run) {
            header("Location: /public/diary.php");
        } else {
            echo "Error: ".$query."<br>".$conn->error;

        }
    }
}

$conn->close();

