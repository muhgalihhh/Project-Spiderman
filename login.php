<?php
    require_once "koneksi.php";
    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
        $data = mysqli_fetch_array($query);
        
        if ($data && password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $email;
            $_SESSION['status'] = "login";
            $_SESSION["role"] = $data['role']; // Ganti "role" dengan kolom yang sesuai pada tabel
            
            if ($_SESSION["role"] == "admin") {
                echo "
						<div class='custom-alert' id='customAlert'>
							<p>LOGIN SUCCESS!!!</p>
							<button onclick='closeAndRedirect()' class='ok'>OK</button>
						</div>
						<script>
							function showAlert() {
								closeAlert();
                                document.getElementById('customAlert').style.display = 'block';
							}

							function closeAndRedirect() {
								closeAlert();
								window.location.href = 'home-admin.php';
							}

							function closeAlert() {
								document.getElementById('customAlert').style.display = 'none';
							}
						</script>
					";
            } else if ($_SESSION["role"] == "user") {
                echo "
						<div class='custom-alert' id='customAlert'>
							<p>LOGIN SUCCESS!!!</p>
							<button onclick='closeAndRedirect()' class='ok'>OK</button>
						</div>
						<script>
							function showAlert() {
								closeAlert();
                                document.getElementById('customAlert').style.display = 'block';
							}

							function closeAndRedirect() {
								closeAlert();
								window.location.href = 'home.php';
							}

							function closeAlert() {
								document.getElementById('customAlert').style.display = 'none';
							}
						</script>
					";
            }
        } else {
            echo "
					<div class='custom-alert' id='customAlert'>
							<p>GAGAL LOGIN!!!</p>
							<button onclick='closeAndRedirect()' class='ok'>OK</button>
						</div>
						<script>
							function showAlert() {
								closeAlert();
                                document.getElementById('customAlert').style.display = 'block';
							}

							function closeAndRedirect() {
								closeAlert();
								window.location.href = 'login.php';
							}

							function closeAlert() {
								document.getElementById('customAlert').style.display = 'none';
							}
						</script>
				";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Halaman Login</title>
    </head>
    <body>
        <div class="box"></div>
        <div class="content">
            <p>USER LOGIN</p>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="input email">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="39" viewBox="0 0 45 39" fill="none" class="img-form">
                    <path d="M5.625 8.53125C4.85156 8.53125 4.21875 9.07969 4.21875 9.75V11.4334L19.3799 22.2193C21.1992 23.5143 23.8096 23.5143 25.6289 22.2193L40.7812 11.4334V9.75C40.7812 9.07969 40.1484 8.53125 39.375 8.53125H5.625ZM4.21875 16.1637V29.25C4.21875 29.9203 4.85156 30.4688 5.625 30.4688H39.375C40.1484 30.4688 40.7812 29.9203 40.7812 29.25V16.1637L28.3008 25.0453C24.9258 27.4447 20.0654 27.4447 16.6992 25.0453L4.21875 16.1637ZM0 9.75C0 7.06113 2.52246 4.875 5.625 4.875H39.375C42.4775 4.875 45 7.06113 45 9.75V29.25C45 31.9389 42.4775 34.125 39.375 34.125H5.625C2.52246 34.125 0 31.9389 0 29.25V9.75Z" fill="#902724"/>
                </svg>
                <input type="text" name="email" placeholder="Email" class="input1" required>
            </div>
            <div class="input pass">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="38" viewBox="0 0 32 38" fill="none" class="img-form">
                    <g clip-path="url(#clip0_2_24)">
                        <path d="M10.2857 10.6875V14.25H21.7143V10.6875C21.7143 7.40703 19.1571 4.75 16 4.75C12.8429 4.75 10.2857 7.40703 10.2857 10.6875ZM5.71429 14.25V10.6875C5.71429 4.78711 10.3214 0 16 0C21.6786 0 26.2857 4.78711 26.2857 10.6875V14.25H27.4286C29.95 14.25 32 16.3801 32 19V33.25C32 35.8699 29.95 38 27.4286 38H4.57143C2.05 38 0 35.8699 0 33.25V19C0 16.3801 2.05 14.25 4.57143 14.25H5.71429Z" fill="#902724"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_2_24">
                            <rect width="32" height="38" fill="white"/>
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
                <button type="button" name="login" id="login" onclick="showAlert()" class="btn-login">Login</button>
                <a href="register.php" id="register" class="btn-register">Register</a>
            </div>
            </form>
        </div>
        <img src="images/spiderman.png" class="spider">
		
    </body>
</html>