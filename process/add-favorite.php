<?php
session_start();
    function addFavorite($id_user, $id_film){
        include '../koneksi.php';
        $query = "INSERT INTO favorite (id_user, id_film) VALUES ('$id_user', '$id_film')";
        $result = mysqli_query($koneksi, $query);
        return $result;
    }

    if (isset($_GET['id'])) {
        $id_user = $_SESSION['id'];
        $id_film = $_GET['id'];
        $result = addFavorite($id_user, $id_film);
        if ($result) {
            echo "<script>alert('Berhasil Tambah Favorite!'); window.location.href='../favorite.php';</script>";
        } else {
            echo "<script>alert('Gagal Tambah Favorite!'); window.location.href='../movies.php';</script>";
        }
    }
?>