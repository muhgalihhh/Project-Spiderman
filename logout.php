<?php
    session_start();
    // jika session role kosong 
    if(!isset($_SESSION['role'])){
        header('location:login.php');
    }
    session_destroy();
    header('location:login.php');
?>