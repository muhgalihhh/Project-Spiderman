<?php
session_start();
if(!isset($_SESSION['role'])){
    header("Location: index.php");
    exit;
}
require_once "koneksi.php";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Halaman Register</title>
</head>

<body>
    <div class="box"></div>
    <div class="content">
        <form action="process/register.php" method="post">
            <p>REGISTER</p>
            <div class="input username">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="40" viewBox="0 0 38 40" fill="none"
                    class="img-form">
                    <path
                        d="M29.6133 30.0156C27.973 27.0156 24.893 25 21.375 25H16.625C13.107 25 10.027 27.0156 8.38672 30.0156C10.9992 33.0781 14.7844 35 19 35C23.2156 35 27.0008 33.0703 29.6133 30.0156ZM0 20C0 14.6957 2.00178 9.60859 5.56497 5.85786C9.12816 2.10714 13.9609 0 19 0C24.0391 0 28.8718 2.10714 32.435 5.85786C35.9982 9.60859 38 14.6957 38 20C38 25.3043 35.9982 30.3914 32.435 34.1421C28.8718 37.8929 24.0391 40 19 40C13.9609 40 9.12816 37.8929 5.56497 34.1421C2.00178 30.3914 0 25.3043 0 20ZM19 21.25C20.4172 21.25 21.7765 20.6574 22.7786 19.6025C23.7807 18.5476 24.3438 17.1168 24.3438 15.625C24.3438 14.1332 23.7807 12.7024 22.7786 11.6475C21.7765 10.5926 20.4172 10 19 10C17.5828 10 16.2235 10.5926 15.2214 11.6475C14.2193 12.7024 13.6562 14.1332 13.6562 15.625C13.6562 17.1168 14.2193 18.5476 15.2214 19.6025C16.2235 20.6574 17.5828 21.25 19 21.25Z"
                        fill="#902724" />
                </svg>
                <input type="text" name="username" placeholder="Username" class="input1 inputuser" required>
            </div>
            <div class="input email">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="39" viewBox="0 0 45 39" fill="none"
                    class="img-form">
                    <path
                        d="M5.625 8.53125C4.85156 8.53125 4.21875 9.07969 4.21875 9.75V11.4334L19.3799 22.2193C21.1992 23.5143 23.8096 23.5143 25.6289 22.2193L40.7812 11.4334V9.75C40.7812 9.07969 40.1484 8.53125 39.375 8.53125H5.625ZM4.21875 16.1637V29.25C4.21875 29.9203 4.85156 30.4688 5.625 30.4688H39.375C40.1484 30.4688 40.7812 29.9203 40.7812 29.25V16.1637L28.3008 25.0453C24.9258 27.4447 20.0654 27.4447 16.6992 25.0453L4.21875 16.1637ZM0 9.75C0 7.06113 2.52246 4.875 5.625 4.875H39.375C42.4775 4.875 45 7.06113 45 9.75V29.25C45 31.9389 42.4775 34.125 39.375 34.125H5.625C2.52246 34.125 0 31.9389 0 29.25V9.75Z"
                        fill="#902724" />
                </svg>
                <input type="text" name="email" placeholder="Email" class="input1" required>
            </div>
            <div class="input pass">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="38" viewBox="0 0 32 38" fill="none"
                    class="img-form">
                    <g clip-path="url(#clip0_2_24)">
                        <path
                            d="M10.2857 10.6875V14.25H21.7143V10.6875C21.7143 7.40703 19.1571 4.75 16 4.75C12.8429 4.75 10.2857 7.40703 10.2857 10.6875ZM5.71429 14.25V10.6875C5.71429 4.78711 10.3214 0 16 0C21.6786 0 26.2857 4.78711 26.2857 10.6875V14.25H27.4286C29.95 14.25 32 16.3801 32 19V33.25C32 35.8699 29.95 38 27.4286 38H4.57143C2.05 38 0 35.8699 0 33.25V19C0 16.3801 2.05 14.25 4.57143 14.25H5.71429Z"
                            fill="#902724" />
                    </g>
                    <defs>
                        <clipPath id="clip0_2_24">
                            <rect width="32" height="38" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <input type="password" name="password" placeholder="Password" class="input1 inputpass" required>
            </div>
            <div class="check">
                <label> <input type="checkbox">Remember</label>
                <a href="#"> Forgot Password?</a>
            </div>
            <div class="btn">
                <a href="index.php" id="login" class="btn-login">Login</a>
                <button id="register" type="submit" name="register" class="btn-register">Register</button>
        </form>
    </div>
    </div>
    <img src="images/spiderman.png" class="spider">
</body>

</html>