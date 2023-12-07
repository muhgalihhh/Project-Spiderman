    <?php
    session_start();
    require_once "koneksi.php";
    // jika session role kosong
    if (!isset($_SESSION['role'])) {
        header('location:index.php');
    }
            if (isset($_POST['hapus'])) {
            $idFavorite = $_POST['hapus'];
            $sqlDeleteFavorite = "DELETE FROM favorite WHERE id_favorite = $idFavorite";
            $koneksi->query($sqlDeleteFavorite);
        }

// Query untuk mengambil data favorit
         $sqlSelectFavorite = "SELECT favorite.id_favorite, film.gambar, film.judul FROM favorite
                      JOIN film ON favorite.id_film = film.id_film WHERE favorite.id_user = " . $_SESSION['id'];
        $resultFavorite = $koneksi->query($sqlSelectFavorite);
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="favorite.css">
        <title>Favorite</title>
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
                    window.location.href = 'logout.php';
                });
                </script>
            </div>
        </div>
        <button id="back" class="back">BACK</button>
        <script>
        document.getElementById('back').addEventListener('click', function() {
            window.location.href = '<?=$_SESSION['homeurl']?>';
        });
        </script>
        <h1>FAVORITE</h1>
        <div class="content">
            <!-- <div class="box">
                <button id="hapus">X</button>
                <img src="images/no way.jpeg">
                <p>Spider-Man<br>No Way Home</p>
            </div>
            <div class="box">
                <button id="hapus">X</button>
                <img src="images/spiderman comics.jpeg">
                <p class="text">Spider-Man</p>
            </div>
            <div class="box">
                <button id="hapus">X</button>
                <img src="images/spider verse.jpg">
                <p>Spider-Man into The<br>Spider-Verse</p>
            </div> -->
            <?php
                while ($rowFavorite = mysqli_fetch_array($resultFavorite)) {
                ?>
            <div class="box">
                <button type="button" name="hapus" onclick="hapusFavorite(<?=$rowFavorite['id_favorite']?>)">X</button>
                <img src="<?=$rowFavorite['gambar']?>">
                <p><?=$rowFavorite['judul']?></p>
            </div>

            <?php
                }
                ?>
        </div>
        <script>
        function hapusFavorite(id) {
            if (confirm('Apakah Anda yakin ingin menghapus favorite ini?')) {
                window.location.href = 'process/hapus-fav.php?id=' + id;
            }
        }
        </script>
    </body>

    </html>