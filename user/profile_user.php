<?php
include 'session.php'; // Make sure this path is correct
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../style/profile_user.css">
</head>
<body>
    <?php include 'sidebar.php' ?>
    <div class="container">
        <div class="line2">E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design </div>

        <?php
        // Check if user is logged in
        if (!isset($_SESSION["id_login"])) {
            header("Location: login.php");
            exit();
        }

        // Prepare and execute statement to get admin data
        $stmt = mysqli_prepare($conn, "SELECT * FROM t_admin WHERE id_admin = ?");
        mysqli_stmt_bind_param($stmt, "i", $_SESSION["id_login"]);
        mysqli_stmt_execute($stmt);
        $query_result = mysqli_stmt_get_result($stmt);
        $d = mysqli_fetch_object($query_result);

        // Check if data was retrieved
        if (!$d) {
            echo "<p>Error: User data not found.</p>";
        }
        ?>

        <div class="section">
            <form id="contact" action="" method="post">
                <h3>Profil</h3>
                <div class="fieldfieldset">
                    <table>
                        <tbody>
                            <tr>
                                <td><label for="nama">nama:</label></td>
                                <td><input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo htmlspecialchars($d->admin_name ?? ''); ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="username">username:</label></td>
                                <td><input type="text" name="username" id="username" placeholder="Username" value="<?php echo htmlspecialchars($d->username ?? ''); ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="hp">phone:</label></td>
                                <td><input type="text" name="hp" id="hp" placeholder="No hp" value="<?php echo htmlspecialchars($d->phone ?? ''); ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="email">email:</label></td>
                                <td><input type="email" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($d->admin_email ?? ''); ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="alamat">address:</label></td>
                                <td><input type="text" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo htmlspecialchars($d->admin_address ?? ''); ?>" required></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="button-btn">
                        <butto class="btn" name="" id="contact-submit" onclick="window.location='../logout.php'">Log out</butto>
                        <button type="submit" class="btn" name="submit" id="contact-submit">change profile</button>
                    </div>
            </form>
        </div>

        <div class="section">
            <form action="" id="contact" method="post">
                <h3>Ubah Password</h3>
                <div class="fieldfieldset">
                    <table>
                        <tbody>
                            <tr>
                                <td><label for="pass1">New Password:</label></td>
                                <td><input type="password" name="pass1" id="pass1" placeholder="Password Baru" required></td>
                            </tr>
                            <tr>
                                <td><label for="pass2">Confirm Password:</label></td>
                                <td><input type="password" name="pass2" id="pass2" placeholder="Konfirmasi password Baru" required></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center; border-bottom: none; border-left: none; border-right: none;">
                                    <button type="submit" class="btn" name="ubah_password" id="contact-submit">Ubah password</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="line3">E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design </div>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $nama   = ucwords($_POST["nama"]);
        $user   = $_POST["username"];
        $hp     = $_POST["hp"];
        $email  = $_POST["email"];
        $alamat = ucwords($_POST["alamat"]);
        $update = mysqli_query($conn, "UPDATE t_admin SET admin_name = '$nama', username = '$user', phone = '$hp', admin_email = '$email', admin_address = '$alamat' WHERE id_admin = '" . $_SESSION['id_login']. "'");
        if ($update) {
            echo "
                <script>
                    alert('Ubah Data Berhasil');
                    // window.location = 'profile_user.php';
                </script>
                ";
        } else {
            echo 'gagal' . mysqli_error($conn);
        }
    }

    if (isset($_POST["ubah_password"])) {
        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];
        if ($pass1 == $pass2) {
            echo "<script>
                            alert('Ubah kata sandi Berhasil');
                        </script>";
            $u_pass = mysqli_query($conn, "UPDATE t_admin SET password = '$pass1' WHERE id_admin = '" . $_SESSION['id_login'] . "'");
            if ($u_pass) {
                echo "
                        <script>
                            window.location = 'profile_user.php';
                        </script>
                        ";
            } else {
                echo 'gagal' . mysqli_error($conn);
            }
        } elseif ($pass2 != $pass1) {
            echo "
                <script>
                    alert('Konfirmasi Password Tidak sesuai')
                </script>
                ";
        } elseif ($pass2 == $pass1) {
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>