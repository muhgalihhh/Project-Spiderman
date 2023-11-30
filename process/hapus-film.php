<?php
    function deleteFilm($id){
        include '../koneksi.php';
        $query = "DELETE FROM film WHERE id_film = '$id'";
        $result = mysqli_query($koneksi, $query);
        return $result;
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = deleteFilm($id);
        if ($result) {
            header("location:movies-admin.php");
        } else {
            echo "<script>alert('Gagal Hapus Film!'); window.location.href='../movies-admin.php';</script>";
        }
    }

?>