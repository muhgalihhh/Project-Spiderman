<?php
    session_start();
    // jika session role kosong
    if(!isset($_SESSION['role'])){
        header('location:login.php');
    }
    
    require_once "koneksi.php";
    require_once "process/hapus-film.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="movies-admin.css">
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
                window.location.href = 'login.php';
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
    <button id="add" class="add">+ADD MOVIES</button>
    <script>
    document.getElementById('add').addEventListener('click', function() {
        window.location.href = 'addmovies.php';
    });
    </script>
    <div class="content">

        <?php
            $query = "SELECT * FROM film";
            $result = mysqli_query($koneksi, $query);
            $box = 1;
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="box box<?=$box?>">
            <img src="<?=$row['gambar']?>">
            <a href="process/hapus-film.php?id=<?=$row['id_film']?>"><button id="hapus" class="hapus">X</button></a>
            <p><?=$row['judul']?></p>
            <button class="watch" onclick="window.location.href='watch.php?id=<?=$row['id_film']?>'">Watch</button>
        </div>
        <?php
        $box++;
            }
        ?>

        <!-- <div class="box box2">
                    <img src="images/no way.jpeg">
                    <button id="hapus" class="hapus">X</button>
                    <p>Spider-Man <br> No Way Home</p>
                    <button class="watch">Watch</button>
                </div>
                <div class="box box3">
                    <img src="images/spider verse.jpg">
                    <button id="hapus" class="hapus">X</button>
                    <p>Spider-Man into <br> The Spider - Verse</p>
                    <button class="watch">Watch</button>
                </div>
                <div class="box box4">
                    <img src="images/amazing.jpeg">
                    <button id="hapus" class="hapus">X</button>
                    <p>The Amazing <br> Spider-Man 2</p>
                    <button class="watch">Watch</button>
                </div>
                <div class="box box5">
                    <img src="images/far from home.jpeg">
                    <button id="hapus" class="hapus">X</button>
                    <p>Spider-Man <br> Far From Home</p>
                    <button class="watch">Watch</button>
                </div>
                <div class="box box6">
                    <img src="images/accors.jpeg">
                    <button id="hapus" class="hapus">X</button>
                    <p>Spider-Man Across <br> The Spider-Verse</p>
                    <button class="watch">Watch</button>
                </div> -->
    </div>
</body>

</html>