<?php

if (isset($_GET['addnote'])) {
    header("Location: /public/addnote.php");
}elseif (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header('Location: /public/index.php');
    exit();
}