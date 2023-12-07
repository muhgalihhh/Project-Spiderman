<?php
    session_start();
    // jika session role kosong 
    if(!isset($_SESSION['role'])){
        header('location:index.php');
    }
    session_destroy();
    header('location:index.php');
?>