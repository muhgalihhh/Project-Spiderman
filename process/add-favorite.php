<?php
    session_start();
    include "../koneksi.php";
    function addFavorite($id_user, $id_film){   
        include '../koneksi.php';
        $query = "INSERT INTO favorite (id_user, id_film) VALUES ('$id_user', '$id_film')";
        $result = mysqli_query($koneksi, $query);
        return $result;
    }

    if (isset($_GET['id'])) {
        $id_user = $_SESSION['id'];
        $id_film = $_GET['id'];
        $url = $_SESSION['moviesurl'];
        // cek apakah film sudah ada di favorite
        $query = "SELECT * FROM favorite WHERE id_user = '$id_user' AND id_film = '$id_film'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo "<script>alert('Film sudah ada di favorite!'); window.location.href='../watch.php?id=$id_film';</script>";
        } else {
            $result = addFavorite($id_user, $id_film);
            if ($result) {
                echo "<script>alert('Berhasil Tambah Favorite!'); window.location.href='../watch.php?id=$id_film';</script>";
            } else {
                echo "<script>alert('Gagal Tambah Favorite!'); window.location.href='../watch.php?id=$id_film';</script>";
            }
        }
    }
?>