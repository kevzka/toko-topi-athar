<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Opacity Container</title>
    <link rel="stylesheet" href="style/login.css">
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
                        window.location = 'admin_kevin/dashboard.php';
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