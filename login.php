<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Opacity Container</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: white;
        }

        /* Container Section */
        .container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .container::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("gambar/bg-login.png");
            background-size: calc(100% + 50px);
            background-position: -15px;
            opacity: 0.98;
            z-index: -999;
        }

        .container > .line2 {
            font-family: 'Arial Black', sans-serif;
            line-height: 54.2px;
            overflow: hidden;
            position: absolute;
            width: max-content;
            height: 54.2px;
            background-color: black;
            bottom: 0; /* Diubah dari 'top: 0' karena ini untuk bagian bawah */
            left: -5px;
            text-transform: uppercase;
            box-sizing: border-box;
            color: white;
        }

        .container > .images {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -1;
        }

        .container > .images > img {
            position: absolute;
            width: 17%;
            transform-origin: center;
        }

        /* Spesifik untuk gambar di .images */
        .container > .images > img:nth-child(1) {
            right: 180px;
            bottom: 40px;
            transform: rotate(-20deg);
            /* animation: gelengHalus 1s linear infinite; */
        }

        .container > .images > img:nth-child(2) {
            top: 120px;
            right: 100px;
            /* animation: gelengHalus 1s linear 0.1s infinite; */
        }

        .container > .images > img:nth-child(3) {
            width: 15%;
            transform: scaleX(-1);
            top: 120px;
            left: 50px;
            /* animation: gelengHalus 1s linear 0.2s infinite; */
        }

        .container > .images > img:nth-child(4) {
            width: 18%;
            top: 300px;
            left: 200px;
            /* animation: gelengHalus 1s linear 0.3s infinite; */
        }

        .container > .images > img:nth-child(5) {
            width: 1000px;
            top: -390px;
            left: -380px;
        }
        .container > .images > img:nth-child(6) {
            width: 1000px;
            top: -400px;
            right: -280px;
        }
        .container > .images > img:nth-child(7) {
            width: 600px;
            bottom: -200px;
            left: -280px;
        }
        .container > .images > img:nth-child(8) {
            transform: scaleX(-1);
            width: 600px;
            bottom: -200px;
            right: -280px;
        }

        /* Login Card Section */
        .container > .login-card {
            width: 25%;
            height: 73%;
            background-color: white;
            border-radius: 40px;
            border: 5px solid black;
        }

        .container > .login-card > .logo {
            width: 100%;
        }

        .container > .login-card > .logo > .gambar {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .container > .login-card > .logo > .gambar > img {
            position: relative;
            left: -5px;
            width: 70%;
        }

        .container > .login-card > .logo > .line1 {
            margin: auto;
            width: 70%;
            height: 2px;
            background-color: black;
        }

        .container > .login-card > p {
            font-weight: bold;
            text-align: center;
            margin: 0;
        }

        .container > .login-card > p:nth-child(2) { /* Menargetkan paragraf kedua secara spesifik */
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
        }

        form > input {
            width: 80%;
            padding: 10px 20px;
            height: 20px;
            border: none;
            border-radius: 20px;
            background-color: #dadff0;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }

        form > input::placeholder {
            opacity: 0.5;
            font-weight: bold;
            color: #020202;
        }

        .form-options {
            margin-top: -10px;
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0 20px;
            box-sizing: border-box;
            align-items: center;
            font-size: 12px;
        }

        .form-options > .remember-me {
            display: flex;
            align-items: center;
            color: #333;
        }

        .form-options > .remember-me > label {
            width: 100px;
        }

        .form-options > .remember-me > input[type="checkbox"] {
            width: max-content;
            margin-right: 5px;
            transform: scale(1.1);
        }

        .form-options > .forgot-password {
            text-decoration: none;
            color: #020202;
            opacity: 0.5;
            font-weight: bold;
        }

        .form-options > .forgot-password:hover {
            text-decoration: underline;
        }

        .form-buttons {
            display: flex;
            justify-content: space-evenly;
            width: 100%; /* Properti width yang terakhir didefinisikan di sini */
            margin: 0 auto 0; /* Properti margin yang terakhir didefinisikan di sini */
        }

        .form-buttons > button {
            padding: 10px 10px;
            font-size: 12px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: -0.5px;
            word-spacing: 1px;
            transition: background-color 0.3s;
        }

        .form-buttons > .btn-continue {
            background-color: #145da0;
            color: white;
            width: 40%; /* Menambahkan width spesifik untuk btn-continue agar rapi di antara dua tombol */
        }

        .form-buttons > .btn-continue:hover {
            background-color: #155cc4;
        }

        .form-buttons > .btn-create {
            background-color: #050a30;
            color: white;
            width: 40%; /* Menambahkan width spesifik untuk btn-create */
        }

        .form-buttons > .btn-create:hover {
            background-color: #c7c7c7;
        }

        /* Social Section */
        .social-section {
            margin-top: 25px;
            text-align: center;
        }

        .social-section > p {
            font-size: 14px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .social-section > .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-section > .social-icons > .icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .social-section > .social-icons > .icon:hover {
            background-color: #bbb;
        }

        /* Footer Section */
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        .footer > p {
            margin: 0;
        }

        /* Animation Keyframe */
        @keyframes gelengHalus {
            0% { rotate : 0deg; }
            30% { rotate : -10deg; }
            60% { rotate : 0deg; }
            80%{ rotate : 10deg; }
            100% { rotate : 0deg; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="line2">E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design </div>
        <div class="login-card">
            <div class="logo">
                <div class="gambar">
                    <img src="gambar/logo.png" alt="">
                </div>
                <div class="line1"></div>
            </div>
            <p>welcome back!</p>
            <p>please login your account</p>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                <div class="form-buttons">
                    <button type="submit" name="submit" class="btn-continue">Continue</button>
                    <button type="button" class="btn-create" onclick="window.location = 'register.php'">Create Account</button>
                </div>
            </form>
            <div class="social-section">
                <p>or you can join:</p>
                <div class="social-icons">
                    <div class="icon">f</div>
                    <div class="icon">G</div>
                    <div class="icon">X</div>
                </div>
            </div>

            <div class="footer">
                <p>© 2025</p>
                <p>All rights reserved.</p>
            </div>

        </div>
        <div class="images">
            <img src="gambar/topi1.png" alt="">
            <img src="gambar/topi2.png" alt="">
            <img src="gambar/topi3.png" alt="">
            <img src="gambar/topi4.png" alt="">
            <img src="gambar/rantai3.png" alt="">
            <img src="gambar/rantai3.png" alt="">
            <img src="gambar/rantai1.png" alt="">
            <img src="gambar/rantai1.png" alt="">
        </div>
    </div>
    <?php
        include "db.php";
        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            // $query = "SELECT * FROM t_admin WHERE username='$username' AND password='$password'";
            $sql = mysqli_query($conn, "SELECT * FROM t_admin WHERE username='$username' AND password='$password'");
            // or die(mysqli_error());
            if(mysqli_num_rows($sql) == 0){
                echo "
                <script>
                    alert('username atau password anda salah');
                    window.location = 'login.php';
                </script>";
            }else{
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['id_login'] = $row['id_admin'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['status_login'] = true;

                if($row['level'] == 'admin'){
                    echo "
                    <script>
                        alert('Login Sukses');
                        window.location = 'admin/dashboard.php';
                    </script>
                    ";
                }elseif($row["level"] == "pelanggan"){ // Perbaikan: menggunakan == untuk perbandingan
                    echo "
                    <script>
                        alert('Login Sukses');
                        window.location = 'user/dashboard_user.php';
                    </script>
                    ";
                }else{
                    header('location:index.php');
                }
            }
        }
    ?>
</body>
</html>