<!DOCTYPE html>
<html>
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
            <form method="post" id="formadd">
                <div class="label1">
                    <label for="">Judul Film</label>
                    <input type="text" name="judul" class="input1">
                </div>
                <div class="label1">
                    <label for="">Starring</label>
                    <input type="text" name="starring" class="input2">
                </div>
                <div class="label1">
                    <label for="">Rating</label>
                    <input type="text" name="rating" class="input3">
                </div>
                <div class="label1">
                    <label for="" class="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" rows="6" cols="70" class="input4"></textarea>
                </div>
                <div class="label1">
                    <label for="" class="trailer">Trailer</label>
                    <input type="text" name="trailer" class="input5">
                </div>
                <div class="label1">
                    <label for="" class="poster">Poster</label>
                    <input type="file" name="poster" accept="image/*" class="input6"><br>
                </div>
                <div class="button">
                    <button id="add" class="add">+ADD</button>
                    <input type="button" value="CANCEL" class="cancel" onclick="kosongkanForm()">
                </div>
            </form>
        </div>

        <script>
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
        </script>

    </body>
</html>