<?php
    session_start();
    // jika session role kosong 
    if(!isset($_SESSION['role'])){
        header('location:login.php');
    }
    
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
    <!–[if lt IE 9]>
        <script src=”http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js”></script>
        <![endif]–>
    </head>
    <body>
        <div class="header">
            <img src="images/spiderman-clipart.png" class="icon">
            <div class="nav">
                <a href="#" class="home">HOME</a>
                <a href="movies-admin.php" class="link">MOVIES</a>
                <a href="#" class="link"><?=strtoupper($_SESSION['role'])?></a>
                <button id="button" class="logout">LOGOUT</button>
                <script>
                    document.getElementById('button').addEventListener('click', function() {
                        window.location.href = 'logout.php'; 
                    });
                </script>
            </div>
        </div>
        <div class="box"></div>
        <img src="images/Homem aranha 1.png" class="img">
        <div class="content">
            <h1>SUPERHERO <br> SPIDER-MAN</h1>
            <h2>Peter Parker</h2>
            <p>Superhero and photographer. Petter was <br>
                bitten by a radioactive spider while touring <br>
                the medical super-corporation Oscorp and <br>
                soon found himself equipped with <br>
                incredible powers.He’s super strong, super <br>
                agile, capable and sensing danger, and able <br>
                shoot webs out of this hand.</p>
            <button id="start" class="start">Get Started</button>
            <script>
                document.getElementById('start').addEventListener('click', function() {
                    window.location.href = 'movies.php'; 
                });
            </script>
        </div>
    </body>
</html>