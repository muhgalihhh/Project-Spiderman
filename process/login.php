<?php
function loginUser($email, $password) {
    include '../koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
    $data = mysqli_fetch_array($query);

    if ($data && password_verify($password, $data['password'])) {
        session_start();
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        $_SESSION["role"] = $data['role']; // Ganti "role" dengan kolom yang sesuai pada tabel

        if ($_SESSION["role"] == "admin") {
            $_SESSION['id'] = $data['id'];
            $_SESSION['moviesurl'] = "movies-admin.php";
            $_SESSION["homeurl"] = "home-admin.php";
            echo "<script>alert('Berhasil Login!');</script>";
            header("location:../home-admin.php");
        } else if ($_SESSION["role"] == "user") {
            $_SESSION['id'] = $data['id'];
            $_SESSION['moviesurl'] = "movies.php";
            $_SESSION["homeurl"] = "home.php";
            echo "<script>alert('Berhasil Login!');</script>";
            header("location:../home.php");
        }
    } else {
        echo "<script>alert('Gagal Login!'); window.location.href='../login.php';</script>";
    }
}

// Cek apakah tombol login sudah dipencet atau belum
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    loginUser($email, $password);
}

?>