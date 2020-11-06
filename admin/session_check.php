<?php
    @session_start();
    if(!$_SESSION['logged_in'] && !isset($_SESSION['user_id'])){
        $_SESSION['error']='Please login first';
        header('Location:../../login.php');
    }
?>