<?php
    session_start();
    if(!isset($_SESSION['role'])){
        header('location:index.php');
    }
    require_once 'koneksi.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM film WHERE id_film = '$id'";
        $result = mysqli_query($koneksi, $query);
        $film = mysqli_fetch_assoc($result);
    }else{
        header('location:movies-admin.php');
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="watch.css">
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
                window.location.href = 'logout.php';
            });
            </script>
        </div>
    </div>
    <div class="desc">
        <div class="left">
            <h1><?=$film['judul']?></h1>
            <?php
                        function generateStarRating($rating) {
                            // Maksimum rating adalah 10, maka dibagi 2 untuk mendapatkan skala 0-5
                            $roundedRating = min($rating / 2, 5);
                            $fullStars = floor($roundedRating);
                            $halfStar = ($roundedRating - $fullStars) > 0.1 ? 1 : 0;
                            $emptyStars = 5 - $fullStars - $halfStar;

                            echo '<div class="star-container">';
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $fullStars) {
                                    // Bintang penuh
                                    echo '<svg class="star-svg" xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewBox="0 0 23 21" fill="none">
                                <g clip-path="url(#clip0_36_65)">
                                    <path
                                        d="M12.654 0.738281C12.4424 0.287109 11.9952 0 11.504 0C11.0129 0 10.5697 0.287109 10.354 0.738281L7.7865 6.16465L2.05248 7.03418C1.57331 7.10801 1.174 7.45254 1.02626 7.92422C0.878518 8.3959 0.99831 8.9168 1.34171 9.26543L5.50248 13.4941L4.52018 19.4701C4.44032 19.9623 4.63998 20.4627 5.03529 20.7539C5.4306 21.0451 5.95369 21.082 6.38494 20.8482L11.508 18.0387L16.6311 20.8482C17.0624 21.082 17.5855 21.0492 17.9808 20.7539C18.3761 20.4586 18.5757 19.9623 18.4959 19.4701L17.5096 13.4941L21.6704 9.26543C22.0138 8.9168 22.1375 8.3959 21.9858 7.92422C21.8341 7.45254 21.4388 7.10801 20.9596 7.03418L15.2216 6.16465L12.654 0.738281Z"
                                        fill="#F7D281" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_36_65">
                                            <rect width="23" height="21" fill="white" />
                                        </clipPath>
                                </defs>
                            </svg>';
                                } elseif ($i == $fullStars + 1 && $halfStar) {
                                    // Setengah bintang
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="29" height="21" viewBox="0 0 29 21" fill="none">
                                            <path
                                                d="M15.4743 0.553711C15.293 0.213281 14.9124 0 14.4955 0C14.0786 0 13.698 0.213281 13.5168 0.553711L10.4083 6.34922L3.46645 7.28027C3.05863 7.33359 2.71879 7.59199 2.59192 7.94883C2.46504 8.30566 2.56926 8.69121 2.85926 8.95371L7.89348 13.4695L6.70629 19.8475C6.63832 20.2166 6.80598 20.5898 7.14582 20.8113C7.48567 21.0328 7.92973 21.0574 8.29223 20.8811L14.5 17.8787L20.7079 20.8811C21.0749 21.0574 21.5189 21.0328 21.8543 20.8113C22.1896 20.5898 22.3618 20.2166 22.2938 19.8475L21.0975 13.4695L26.1363 8.94961C26.4308 8.68711 26.5305 8.29746 26.4036 7.94473C26.2768 7.59199 25.9369 7.33359 25.5291 7.27617L18.5827 6.34922L15.4743 0.553711ZM14.5 15.7787V3.24434L16.8789 7.67812C17.0375 7.96934 17.3411 8.17441 17.6991 8.22363L23.0596 8.94141L19.1672 12.4277C18.918 12.6533 18.8002 12.9732 18.8591 13.2891L19.7744 18.1945L15.0075 15.8936C14.8489 15.8156 14.6722 15.7787 14.5 15.7787Z"
                                                fill="#F7D281" />
                                        </svg>';
                                } elseif ($i > $fullStars + 1 && $i <= $fullStars + 1 + $emptyStars) {
                                    // Bintang dengan stroke saja
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewBox="0 0 23 21" fill="none" stroke="#F7D281" stroke-width="1.5">
                                                <g clip-path="url(#clip0_36_65)">
                                                    <line x1="0.5" y1="10.5" x2="22.5" y2="10.5" stroke="#F7D281" stroke-width="1.5"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_36_65">
                                                        <rect width="23" height="21" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>';
                                }
                            }

                            echo '</div>';
                        }

                // Contoh penggunaan untuk rating 10
                $filmRating = $film['rating'];
                generateStarRating($filmRating);
                ?>


            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewBox="0 0 23 21" fill="none">
                <g clip-path="url(#clip0_36_65)">
                    <path
                        d="M12.654 0.738281C12.4424 0.287109 11.9952 0 11.504 0C11.0129 0 10.5697 0.287109 10.354 0.738281L7.7865 6.16465L2.05248 7.03418C1.57331 7.10801 1.174 7.45254 1.02626 7.92422C0.878518 8.3959 0.99831 8.9168 1.34171 9.26543L5.50248 13.4941L4.52018 19.4701C4.44032 19.9623 4.63998 20.4627 5.03529 20.7539C5.4306 21.0451 5.95369 21.082 6.38494 20.8482L11.508 18.0387L16.6311 20.8482C17.0624 21.082 17.5855 21.0492 17.9808 20.7539C18.3761 20.4586 18.5757 19.9623 18.4959 19.4701L17.5096 13.4941L21.6704 9.26543C22.0138 8.9168 22.1375 8.3959 21.9858 7.92422C21.8341 7.45254 21.4388 7.10801 20.9596 7.03418L15.2216 6.16465L12.654 0.738281Z"
                        fill="#F7D281" />
                </g>
                <defs>
                    <clipPath id="clip0_36_65">
                        <rect width="23" height="21" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewBox="0 0 23 21" fill="none">
                <g clip-path="url(#clip0_36_65)">
                    <path
                        d="M12.654 0.738281C12.4424 0.287109 11.9952 0 11.504 0C11.0129 0 10.5697 0.287109 10.354 0.738281L7.7865 6.16465L2.05248 7.03418C1.57331 7.10801 1.174 7.45254 1.02626 7.92422C0.878518 8.3959 0.99831 8.9168 1.34171 9.26543L5.50248 13.4941L4.52018 19.4701C4.44032 19.9623 4.63998 20.4627 5.03529 20.7539C5.4306 21.0451 5.95369 21.082 6.38494 20.8482L11.508 18.0387L16.6311 20.8482C17.0624 21.082 17.5855 21.0492 17.9808 20.7539C18.3761 20.4586 18.5757 19.9623 18.4959 19.4701L17.5096 13.4941L21.6704 9.26543C22.0138 8.9168 22.1375 8.3959 21.9858 7.92422C21.8341 7.45254 21.4388 7.10801 20.9596 7.03418L15.2216 6.16465L12.654 0.738281Z"
                        fill="#F7D281" />
                </g>
                <defs>
                    <clipPath id="clip0_36_65">
                        <rect width="23" height="21" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewBox="0 0 23 21" fill="none">
                <g clip-path="url(#clip0_36_65)">
                    <path
                        d="M12.654 0.738281C12.4424 0.287109 11.9952 0 11.504 0C11.0129 0 10.5697 0.287109 10.354 0.738281L7.7865 6.16465L2.05248 7.03418C1.57331 7.10801 1.174 7.45254 1.02626 7.92422C0.878518 8.3959 0.99831 8.9168 1.34171 9.26543L5.50248 13.4941L4.52018 19.4701C4.44032 19.9623 4.63998 20.4627 5.03529 20.7539C5.4306 21.0451 5.95369 21.082 6.38494 20.8482L11.508 18.0387L16.6311 20.8482C17.0624 21.082 17.5855 21.0492 17.9808 20.7539C18.3761 20.4586 18.5757 19.9623 18.4959 19.4701L17.5096 13.4941L21.6704 9.26543C22.0138 8.9168 22.1375 8.3959 21.9858 7.92422C21.8341 7.45254 21.4388 7.10801 20.9596 7.03418L15.2216 6.16465L12.654 0.738281Z"
                        fill="#F7D281" />
                </g>
                <defs>
                    <clipPath id="clip0_36_65">
                        <rect width="23" height="21" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="21" viewBox="0 0 23 21" fill="none">
                <g clip-path="url(#clip0_36_65)">
                    <path
                        d="M12.654 0.738281C12.4424 0.287109 11.9952 0 11.504 0C11.0129 0 10.5697 0.287109 10.354 0.738281L7.7865 6.16465L2.05248 7.03418C1.57331 7.10801 1.174 7.45254 1.02626 7.92422C0.878518 8.3959 0.99831 8.9168 1.34171 9.26543L5.50248 13.4941L4.52018 19.4701C4.44032 19.9623 4.63998 20.4627 5.03529 20.7539C5.4306 21.0451 5.95369 21.082 6.38494 20.8482L11.508 18.0387L16.6311 20.8482C17.0624 21.082 17.5855 21.0492 17.9808 20.7539C18.3761 20.4586 18.5757 19.9623 18.4959 19.4701L17.5096 13.4941L21.6704 9.26543C22.0138 8.9168 22.1375 8.3959 21.9858 7.92422C21.8341 7.45254 21.4388 7.10801 20.9596 7.03418L15.2216 6.16465L12.654 0.738281Z"
                        fill="#F7D281" />
                </g>
                <defs>
                    <clipPath id="clip0_36_65">
                        <rect width="23" height="21" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="21" viewBox="0 0 29 21" fill="none">
                <path
                    d="M15.4743 0.553711C15.293 0.213281 14.9124 0 14.4955 0C14.0786 0 13.698 0.213281 13.5168 0.553711L10.4083 6.34922L3.46645 7.28027C3.05863 7.33359 2.71879 7.59199 2.59192 7.94883C2.46504 8.30566 2.56926 8.69121 2.85926 8.95371L7.89348 13.4695L6.70629 19.8475C6.63832 20.2166 6.80598 20.5898 7.14582 20.8113C7.48567 21.0328 7.92973 21.0574 8.29223 20.8811L14.5 17.8787L20.7079 20.8811C21.0749 21.0574 21.5189 21.0328 21.8543 20.8113C22.1896 20.5898 22.3618 20.2166 22.2938 19.8475L21.0975 13.4695L26.1363 8.94961C26.4308 8.68711 26.5305 8.29746 26.4036 7.94473C26.2768 7.59199 25.9369 7.33359 25.5291 7.27617L18.5827 6.34922L15.4743 0.553711ZM14.5 15.7787V3.24434L16.8789 7.67812C17.0375 7.96934 17.3411 8.17441 17.6991 8.22363L23.0596 8.94141L19.1672 12.4277C18.918 12.6533 18.8002 12.9732 18.8591 13.2891L19.7744 18.1945L15.0075 15.8936C14.8489 15.8156 14.6722 15.7787 14.5 15.7787Z"
                    fill="#F7D281" />
            </svg> -->
            <p class="rate"><?=$film['rating']?></p>
            <p style="font-family: Inter; color: #fff; position: relative; left: 20%;">Starring :
                <?=$film['MC']?><br><br>
                <?=$film['deskripsi']?></p>
            <button id="trailer" class="trailer">Trailer</button>
            <script>
            document.getElementById('trailer').addEventListener('click', function() {
                window.location.href = '<?=$film['link_trailer']?>'
            });
            </script>
            <button id="fav" class="fav">Favorite</button>
            <script>
            document.getElementById('fav').addEventListener('click', function() {
                window.location.href = 'process/add-favorite.php?id=<?=$id?>';
            });
            </script>
        </div>
        <div class="right">
            <img src="images/spiderman comics.jpeg">
            <button id="back" class="back">BACK</button>
            <script>
            document.getElementById('back').addEventListener('click', function() {
                window.location.href = '<?=$_SESSION['homeurl']?>';
            });
            </script>
        </div>
    </div>
    <div class="option">

        <?php
    $query = "SELECT * FROM film";
    $result = mysqli_query($koneksi, $query);
    $box = 1;
    while($movie = mysqli_fetch_assoc($result)){
        $boxClass = ($movie['id_film'] == $_GET['id']) ? 'box1' : '';
    ?>

        <div class="op<?=$box?>">
            <div class="box <?=$boxClass?>">
                <img src="<?=$movie['gambar']?>">
                <p><?=$movie['judul']?></p>
            </div>
        </div>
        <!-- Other movie cards -->
        <?php 
        $box++;
    } ?>
        <!-- <div class="op2">
            <div class="box">
                <img src="images/no way.jpeg">
                <p>Spider-Man<br>No Way Home</p>
            </div>
        </div>
        <div class="op3">
            <div class="box">
                <img src="images/spider verse.jpg">
                <p>Spider-Man into The<br>Spider-Verse</p>
            </div>
        </div>
        <div class="op4">
            <div class="box">
                <img src="images/amazing.jpeg">
                <p>The Amazing<br>Spider-Man 2</p>
            </div>
        </div>
        <div class="op5">
            <div class="box">
                <img src="images/far from home.jpeg">
                <p>Spider-Man<br>Far From Home</p>
            </div>
        </div>
        <div class="op6">
            <div class="box">
                <img src="images/accors.jpeg">
                <p>Spider-Man Across<br>The Spider-Verse</p>
            </div>
        </div> -->
    </div>
</body>

</html>