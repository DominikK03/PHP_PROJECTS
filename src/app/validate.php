<?php
session_start();

$correctPassword = '123';  // Ustaw tutaj swoje hasło

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];

    if ($password === $correctPassword) {
        $_SESSION['authenticated'] = true;
        header('Location: /public/diary.php');
    } else {
        header('Location: /public/index.php?error=1');
    }
} else {
    header('Location: /public/index.php');
}
exit();

