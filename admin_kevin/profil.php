<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buka Warung</title>
    <link rel="stylesheet" href="../style/styleadmin.css">
    <style>

        .container {
            max-width: 800px;
            width: 100%;
        }

        form {
            background-color: #fff;
            padding: 25px 30px;
            margin-bottom: 40px;
            border-left: 5px solid #007bff;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
            border-radius: 6px;
            box-sizing: border-box;
        }

        form h3 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #007bff;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #444;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fdfdfd;
            font-size: 14px;
            transition: border 0.3s;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button.btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button.btn:hover {
            background-color: #0056b3;
        }

        fieldset {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar closed">
            <div class="sidebar-title"><b>connecta</b></div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <div class="container">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM t_admin WHERE id_admin = '" . $_SESSION["id_login"] . "'");
                $d = mysqli_fetch_object($query);
                ?>
                <form id="contact" action="" method="post">
                    <h3>Profil</h3>
                    <fieldset>
                        <label for="">nama:</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $d->admin_name ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">username:</label>
                        <input type="text" name="username" placeholder="Username" value="<?php echo $d->username ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">no hp:</label>
                        <input type="text" name="hp" placeholder="No hp" value="<?php echo $d->phone ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">email:</label>
                        <input type="text" name="email" placeholder="Email" value="<?php echo $d->admin_email ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">alamat:</label>
                        <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $d->admin_address ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button type="submit" class="btn" name="submit" id="contact-submit" data-submit="...sending">Ubah profil</button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST["submit"])) {
                    $nama   = ucwords($_POST["nama"]);
                    $user   = $_POST["username"];
                    $hp     = $_POST["hp"];
                    $email  = $_POST["email"];
                    $alamat = ucwords($_POST["alamat"]);
                    $update = mysqli_query($conn, "UPDATE t_admin SET admin_name = '$nama', username = '$user', admin_telp = '$hp', admin_email = '$email', admin_address = '$alamat' WHERE id_admin = '" . $d->id_admin . "'");
                    if ($update) {
                        echo "
                            <script>
                                alert('Ubah Data Berhasil');
                                window.location = 'profil.php';
                            </script>
                            ";
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
                ?>
                <form action="" id="contact" method="post">
                    <h3>Ubah Password</h3>
                    <fieldset>
                        <input type="password" name="pass1" placeholder="Password Baru" class="formm-control" required>
                    </fieldset>
                    <fieldset>
                        <input type="password" name="pass2" placeholder="Konfirmasi password Baru" class="formm-control" required>
                    </fieldset>
                    <fieldset>
                        <button type="submit" class="btn" name="ubah_password" id="contact-submit" data-submit="...sending">Ubah password</button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST["ubah_password"])) {
                    $pass1 = $_POST["pass1"];
                    $pass2 = $_POST["pass2"];
                    if ($pass1 == $pass2) {
                        echo "<script>
                                        alert('Ubah kata sandi Berhasil');
                                    </script>";
                        $u_pass = mysqli_query($conn, "UPDATE t_admin SET password = '$pass1' WHERE id_admin = '" . $d->id_admin . "'");
                        if ($u_pass) {
                            echo "
                                    <script>
                                        window.location = 'profil.php';
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
                ?>
            </div>
        </div>
    </div>
</body>

</html>