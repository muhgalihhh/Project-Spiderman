<?php
    function deleteFilm($id){
        include '../koneksi.php';
        $query = "SELECT * FROM film WHERE id_film = '$id'";
        $result = mysqli_query($koneksi, $query);
        $film = mysqli_fetch_assoc($result);
        $poster = $film['gambar'];
        unlink("../".$poster);
        $query = "DELETE FROM film WHERE id_film = '$id'";
        $result = mysqli_query($koneksi, $query);
        return $result;
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = deleteFilm($id);
        if ($result) {
            echo "<script>alert('Berhasil Hapus Film!'); window.location.href='../movies-admin.php';</script>";
        } else {
            echo "<script>alert('Gagal Hapus Film!'); window.location.href='../movies-admin.php';</script>";
        }
    }

?>