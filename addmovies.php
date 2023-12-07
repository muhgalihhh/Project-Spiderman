<?php
    session_start();
   // jika role bukan admin
    if($_SESSION['role'] != "admin"){
        header('location:index.php');
    }
    include 'koneksi.php';
    ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addmovies.css">
    <title>Add Movies</title>
    <!–[if lt IE 9]>
        <script src=”http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js”></script>
        <![endif]–>
</head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="addmovies.css">
        <title>Add Movies</title>
    </head>
    <body>
        <div class="box">
            <img src="images/Homem aranha 2.png">
            <h1>ADD MOVIES</h1>
            <form method="post" id="formadd" action="process/add-movies.php" enctype="multipart/form-data">
                <div class="label1">
                    <label for="judul">Judul Film</label>
                    <input type="text" name="judul" class="input1">
                </div>
                <div class="label1">
                    <label for="starring">Starring</label>
                    <input type="text" name="starring" class="input2">
                </div>
                <div class="label1">
                    <label for="rating">Rating</label>
                    <input type="text" name="rating" class="input3">
                </div>
                <div class="label1">
                    <label for="sinopsis" class="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" rows="6" cols="70" class="input4"></textarea>
                </div>
                <div class="label1">
                    <label for="trailer" class="trailer">Trailer</label>
                    <input type="text" name="trailer" class="input5">
                </div>
                <div class="label1">
                    <label for="link" class="trailer">Link Film</label>
                    <input type="text" name="linkfilm" class="input6">
                </div>
                <div class="label1">
                    <label for="poster" class="poster">Poster</label>
                    <input type="file" name="poster" class="input7"><br>
                </div>
                <div class="button">
                    <button type="submit" name="submit" id="add" class="add">+ADD</button>
                    <input type="reset" value="CANCEL" class="cancel">
                </div>
            </form>
        </div>
        <!-- <script>
            function kosongkanForm() {
                // Mengambil referensi formulir
                var form = document.getElementById("formadd");
                
                // Mengosongkan nilai pada setiap elemen formulir
                for (var i = 0; i < form.elements.length; i++) {
                    var element = form.elements[i];
                    
                    // Mengosongkan nilai untuk input teks, textarea, dan lainnya
                    if (element.type !== "button") {
                        element.value = "";
                    }
                }
            }
        </script> -->
    </body>
</html>