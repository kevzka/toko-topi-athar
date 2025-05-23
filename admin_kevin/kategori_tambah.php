<?php	include 'session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connecta| Tambah data</title>
    <link rel="stylesheet" href="../style/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar closed">
            <div class="sidebar-title"><b>connecta</b></div>
            <ul>
                <?php	include 'sidebar.php'; ?>
            </ul>
        </div>
        <div class="section">
            <div class="container">
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM t_admin WHERE id_admin = '". $_SESSION['id_login']."'");
                    $d = mysqli_fetch_object($query);
                ?>
                <form action="" method="post">
                    <h3>+Tambah Data Kategori</h3>
                    <fieldset>
                        <input type="text" name="nama" placeholder="Nama Kategori" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" class="btn" id="contact-submit" data-submit="...sending">Tambah</button>
                    </fieldset>
                </form>
                <?php
                    if(isset($_POST["submit"])){
                        $nama = $_POST["nama"];
                        $insert = mysqli_query($conn, "INSERT INTO t_category (category_name) VALUES('$nama')");
                        if($insert){
                            echo "
                            <script>
                                alert('Tambah data berhasil!!');
                                window.location = 'kategori_data.php';
                            </script>";
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>