<?php
function registerUser($username, $email, $password) {
    require_once "koneksi.php";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = mysqli_query($koneksi, "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')");
    if ($query) {
        echo "<script>alert('Berhasil Daftar!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Gagal Daftar!'); window.location.href='register.php';</script>";
    }
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    registerUser($username, $email, $password);
}
?>