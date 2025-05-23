<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Opacity Container</title>
    <link rel="stylesheet" href="style/register.css">
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