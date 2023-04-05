<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: /student_dropout_analysis/login/login.php");
        exit();
    }
?>