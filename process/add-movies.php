<?php
function addMovies($judul, $mc, $rating, $sinopsis, $trailer, $linkfilm, $poster)
{
    global $koneksi;
    $query = "INSERT INTO film (judul, MC, deskripsi, rating, link_trailer, link_film, gambar) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $judul, $mc, $sinopsis, $rating, $trailer, $linkfilm, $poster);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    } else {
        return false;
    }
}

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $starring = mysqli_real_escape_string($koneksi, $_POST['starring']);
    $rating = mysqli_real_escape_string($koneksi, $_POST['rating']);
    $sinopsis = mysqli_real_escape_string($koneksi, $_POST['sinopsis']);
    $trailer = mysqli_real_escape_string($koneksi, $_POST['trailer']);
    $linkfilm = mysqli_real_escape_string($koneksi, $_POST['linkfilm']);

    $poster = $_FILES['poster']['name'];
    $tmp = $_FILES['poster']['tmp_name'];
    $dir = "../images/poster-film/";
    $path = "/images/poster-film/";
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = strtolower(pathinfo($poster, PATHINFO_EXTENSION)); // Convert to lowercase
    if(!in_array($file_extension, $allowed_extensions)) {
        showError('Format Poster Tidak Didukung!');
    }

    $result = move_uploaded_file($tmp, $dir . $poster);
    $poster = $path . $poster;

    if ($result) {
        $result = addMovies($judul, $starring, $rating, $sinopsis, $trailer, $linkfilm, $poster);

        if ($result) {
            showMessage('Berhasil Tambah Film!');
        } else {
            showError('Gagal Tambah Film!');
        }
    } else {
        showError('Gagal Upload Poster!');
    }
}

function showMessage($message)
{
    echo "<script>alert('$message'); ";
}

function showError($message)
{
    showMessage($message);
    exit;
}
?>