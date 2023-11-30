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
    <div class="content">
        <div class="left">
            <div class="box box1">
                <img src="images/spiderman comics.jpeg">
                <p>Spider-Man</p>
                <button id="watch1">Watch</button>
                <script>
                document.getElementById('watch1').addEventListener('click', function() {
                    window.location.href = 'watch.php';
                });
                </script>
            </div>
            <div class="box box2">
                <img src="images/no way.jpeg">
                <p>Spider-Man <br> No Way Home</p>
                <button>Watch</button>
            </div>
            <div class="box box3">
                <img src="images/spider verse.jpg">
                <p>Spider-Man into <br> The Spider - Verse</p>
                <button>Watch</button>
            </div>
        </div>
        <div class="right">
            <div class="box box1">
                <img src="images/amazing.jpeg">
                <p>The Amazing <br> Spider-Man 2</p>
                <button>Watch</button>
            </div>
            <div class="box box2">
                <img src="images/far from home.jpeg">
                <p>Spider-Man <br> Far From Home</p>
                <button>Watch</button>
            </div>
            <div class="box box3">
                <img src="images/accors.jpeg">
                <p>Spider-Man Across <br> The Spider-Verse</p>
                <button>Watch</button>
            </div>
        </div>
    </div>
</body>

</html>