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
            transform: scaleX(-1);
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
            top: 0;
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

        .container > .images:nth-child(4) { /* Ini menargetkan div .images kedua di HTML */
            rotate: 180deg;
        }

        .container > .images > img {
            position: absolute;
            width: 17%;
            transform-origin: center;
        }

        /* Spesifik untuk gambar di .images pertama (child ke-3 dari .container) */
        .container > .images:nth-child(3) > img:nth-child(1) {
            right: 150px;
            bottom: 40px;
            transform: rotate(20deg);
        }

        .container > .images:nth-child(3) > img:nth-child(2) {
            transform: scale(1.2) rotate(-10deg); /* Digabungkan */
            top: 80px;
            right: 250px;
        }

        .container > .images:nth-child(3) > img:nth-child(3) {
            width: 15%;
            top: 120px;
            left: 130px;
        }

        .container > .images:nth-child(3) > img:nth-child(4) {
            width: 10%;
            top: 350px;
            left: 250px;
            rotate: 30deg;
        }

        .container > .images:nth-child(3) > img:nth-child(5) {
            transform: scale(0.7) rotate(-10deg); /* Digabungkan */
            top: 130px;
            right: 230px;
            z-index: -1;
        }

        /* Spesifik untuk gambar di .images kedua (child ke-4 dari .container) */
        .container > .images:nth-child(4) > img:nth-child(1) {
            width: 1000px;
            top: -390px;
            left: -380px;
        }
        .container > .images:nth-child(4) > img:nth-child(2) {
            width: 1000px;
            top: -400px;
            right: -280px;
        }
        .container > .images:nth-child(4) > img:nth-child(3) {
            width: 600px;
            bottom: -200px;
            left: -280px;
        }
        .container > .images:nth-child(4) > img:nth-child(4) {
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

        .container > .login-card > p:nth-child(2) {
            margin-top: 20px;
        }

        .container > .login-card > form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
        }

        .container > .login-card > form > input {
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

        .container > .login-card > form > input::placeholder {
            opacity: 0.5;
            font-weight: bold;
            color: #020202;
        }

        /* Form Options (Saat ini dikomentari di HTML, tapi CSSnya tetap relevan jika diaktifkan) */
        /*
        .container > .login-card > .form-options {
            margin-top: -10px;
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0 20px;
            box-sizing: border-box;
            align-items: center;
            font-size: 12px;
        }

        .container > .login-card > .remember-me {
            display: flex;
            align-items: center;
            color: #333;
        }

        .container > .login-card > .remember-me > label {
            width: 100px;
        }

        .container > .login-card > .remember-me > input[type="checkbox"] {
            width: max-content;
            margin-right: 5px;
            transform: scale(1.1);
        }

        .container > .login-card > .forgot-password {
            text-decoration: none;
            color: #020202;
            opacity: 0.5;
            font-weight: bold;
        }

        .container > .login-card > .forgot-password:hover {
            text-decoration: underline;
        }
        */

        .form-buttons {
            display: flex;
            justify-content: space-between;
            width: 91%;
            margin: 0 auto; /* Digabungkan properti margin */
        }

        .form-buttons > button {
            width: 100%;
            padding: 10px 20px;
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
        }

        .form-buttons > .btn-continue:hover {
            background-color: #155cc4;
        }

        /* btn-create tidak ada di HTML saat ini, jadi tidak perlu ada aturan spesifik */
        /*
        .container > .login-card > .btn-create {
            background-color: #050a30;
            color: white;
        }

        .container > .login-card > .btn-create:hover {
            background-color: #c7c7c7;
        }
        */

        /* Fake reCAPTCHA Section */
        .fake-recaptcha {
            display: block; /* Digabungkan dengan display: inline-flex; karena block yang terbaru */
            margin: auto;
            margin-top: 10px;
            flex-direction: column;
            border: 1px solid #d3d3d3;
            border-radius: 4px;
            padding: 10px;
            padding-bottom: 5px;
            width: 250px;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            user-select: none;
        }

        .fake-recaptcha > .recaptcha-main {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .fake-recaptcha > .recaptcha-main > .checkbox-box {
            width: 20px;
            height: 20px;
            border: 2px solid #999;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background-color: white;
            position: relative;
        }

        .fake-recaptcha > .recaptcha-main > .checkbox-box > .checkmark {
            display: none;
            color: green;
            font-size: 16px;
            font-weight: bold;
        }

        .fake-recaptcha > .recaptcha-main > .checkbox-box > .loading-spinner {
            display: none;
            width: 14px;
            height: 14px;
            border: 2px solid #ccc;
            border-top: 2px solid #888;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .fake-recaptcha.loading > .recaptcha-main > .checkbox-box > .loading-spinner {
            display: inline-block;
        }

        .fake-recaptcha.done > .recaptcha-main > .checkbox-box > .checkmark {
            display: inline;
        }

        .fake-recaptcha > .recaptcha-main > .captcha-text {
            font-size: 14px;
        }

        .fake-recaptcha > .recaptcha-main > .recaptcha-logo {
            margin-left: auto;
        }

        .fake-recaptcha > .recaptcha-main > .recaptcha-logo > img {
            width: 1.5rem;
            height: auto;
        }

        .fake-recaptcha > .recaptcha-footer {
            width: 100%;
            text-align: right;
            font-size: 9px;
            color: #555;
            line-height: 1.2;
        }

        .fake-recaptcha > .recaptcha-footer > .recaptcha-brand {
            font-size: 9px;
            color: #555;
        }

        .fake-recaptcha > .recaptcha-footer > a {
            color: #555;
            text-decoration: none;
            margin-left: 4px;
        }

        .fake-recaptcha > .recaptcha-footer > a:hover {
            text-decoration: underline;
        }

        /* Social Section (Saat ini dikomentari di HTML) */
        /*
        .social-section {
            margin-top: 25px;
            text-align: center;
        }

        .social-section > p {
            font-size: 14px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons > .icon {
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

        .social-icons > .icon:hover {
            background-color: #bbb;
        }
        */

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
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
            <p>welcome new user!</p>
            <p>please create your account</p>
            <form id="registerForm" action="" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="pass-check" placeholder="Confirm password">
                <div class="form-buttons">
                    <button type="submit" name="submit" class="btn-continue">Continue</button>
                </div>
            </form>
            <div class="fake-recaptcha" id="recaptcha">
                <div class="recaptcha-main">
                    <div class="checkbox-box" id="checkbox">
                        <span class="checkmark">✔</span>
                        <div class="loading-spinner" id="spinner"></div>
                    </div>
                    <div class="captcha-text" id="captchaText">I'm not a robot</div>
                    <div class="recaptcha-logo">
                        <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA">
                    </div>
                </div>
                <div class="recaptcha-footer">
                    <div class="recaptcha-brand">reCAPTCHA</div>
                </div>
            </div>
            <div class="footer">
                <p>© 2025</p>
                <p>All rights reserved.</p>
            </div>

        </div>
        <div class="images">
            <img src="gambar/topi5.png" alt="">
            <img src="gambar/topi6.png" alt="">
            <img src="gambar/topi7.png" alt="">
            <img src="gambar/topi8.png" alt="">
            <img src="gambar/cross1.png" alt="">
        </div>
        <div class="images">
            <img src="gambar/rantai3.png" alt="">
            <img src="gambar/rantai3.png" alt="">
            <img src="gambar/rantai1.png" alt="">
            <img src="gambar/rantai1.png" alt="">
        </div>
    </div>
    <script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    const recaptcha = document.getElementById('recaptcha');
    if (!recaptcha.classList.contains('done')) {
        e.preventDefault(); // Hentikan submit form
        alert('Silakan verifikasi captcha terlebih dahulu.');
    }
});
</script>

        <?php
        include 'db.php';

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passCheck = $_POST['pass-check'];

            // Cek apakah password dan konfirmasi password sama
            if ($password !== $passCheck) {
                echo "
                <script>
                    alert('Password dan konfirmasi password tidak sama!');
                    window.location = 'register.php';
                </script>
                ";
                exit(); // Hentikan eksekusi
            }

            // Lanjutkan proses insert jika password cocok
            $insert = mysqli_query($conn, "INSERT INTO t_admin VALUES (
                null,
                '$username',
                '$username',
                '$password',
                '01234',
                '$username@email',
                'indonesia',
                'pelanggan')");

            if ($insert) {
                echo "
                <script>
                    alert('Berhasil, silakan login');
                    window.location = 'login.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Gagal mendaftar');
                    window.location = 'register.php';
                </script>
                ";
            }
        }
        ?>

        <script>
        const recaptcha = document.getElementById("recaptcha");
        const checkbox = document.getElementById("checkbox");
        const spinner = document.getElementById("spinner");
        const checkmark = document.querySelector(".checkmark");
        const captchaText = document.getElementById("captchaText");

        checkbox.addEventListener("click", () => {
            if (recaptcha.classList.contains("done")) return;

            recaptcha.classList.add("loading");
            captchaText.textContent = "Checking...";
            spinner.style.display = "inline-block";
            checkmark.style.display = "none";

            setTimeout(() => {
            recaptcha.classList.remove("loading");
            recaptcha.classList.add("done");
            spinner.style.display = "none";
            checkmark.style.display = "inline";
            captchaText.textContent = "You are verified";
            }, 2000);
        });
        </script>
</body>
</html>