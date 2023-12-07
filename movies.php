<?php
session_start();
// jika session role bukan user
if ($_SESSION['role'] != "user") {
    header('location:index.php');
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="movies.css">
    <title>Movies</title>
</head>

<body>
    <div class="header">
        <img src="images/spiderman-clipart.png" class="icon">
        <div class="nav">
            <a href="<?=$_SESSION['homeurl']?>" class="link">HOME</a>
            <a href="<?=$_SESSION['moviesurl']?>" class="movies">MOVIES</a>
            <a href="favorite.php" class="link">FAVORITE</a>
            <button id="button" class="logout">LOGOUT</button>
            <script>
            document.getElementById('button').addEventListener('click', function() {
                alert('Berhasil Logout!');
                window.location.href = 'index.php';
            });
            </script>
        </div>
    </div>
    <img src="images/spiderman-clipart.png" class="title">
    <button id="back" class="back">BACK</button>
    <script>
    document.getElementById('back').addEventListener('click', function() {
        window.location.href = 'home.php';
    });
    </script>
    <div class="content">
        <div class="left">
            <?php
            $box = 1;
            $sql = "SELECT * FROM film";
            $result = $koneksi->query($sql);

            // Menampilkan data dalam card dan membaginya menjadi dua bagian (left dan right)
            $films = $result->fetch_all(MYSQLI_ASSOC);
            $halfCount = ceil(count($films) / 2);
            $leftFilms = array_slice($films, 0, $halfCount);
            $rightFilms = array_slice($films, $halfCount);
        // Looping untuk setiap data film di bagian kiri
        foreach ($leftFilms as $row) {
            ?>
            <div class="box box<?=$box?>">
                <img src="<?=$row['gambar']?>" alt="<?=$row['judul']?>">
                <p><?=$row['judul']?></p>
                <button onclick="window.location.href = 'watch.php?id=<?=$row['id_film']?>'">Watch</button>
            </div>
            <?php
        }
        ?>
        </div>

        <div class="right">
            <?php
        // Looping untuk setiap data film di bagian kanan
        foreach ($rightFilms as $row) {
            ?>
            <div class="box box<?=$box?>">
                <img src="images/<?=$row['gambar']?>" alt="<?=$row['judul']?>">
                <p><?=$row['judul']?></p>
                <button onclick="watchMovie('<?=$row['id']?>')">Watch</button>
            </div>
            <?php
            $box++;
        }
        ?>
        </div>
    </div>
</body>

</html>