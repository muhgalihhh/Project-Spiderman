<?php
    function deleteFavorite($id){
        include '../koneksi.php';
        $query = "DELETE FROM favorite WHERE id_favorite = '$id'";
        $result = mysqli_query($koneksi, $query);
        return $result;
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = deleteFavorite($id);
        if ($result) {
            echo "<script>alert('Berhasil Hapus Favorite!'); window.location.href='../favorite.php';</script>";
            header("location:../favorite.php");
        } else {
            echo "<script>alert('Gagal Hapus Favorite!'); window.location.href='../favorite.php';</script>";
        }
    }

?>