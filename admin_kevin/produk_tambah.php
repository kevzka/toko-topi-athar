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
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>+Tambah Data Produk</h3>
                    <fieldset>
                        <label for="">Kategori</label>
                        <select class="form_control" name="kategori" required>
                            <option value="">--pilih--</option>
                            <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM t_category ORDER BY id_category DESC");
                                while($r = mysqli_fetch_array($kategori)){
                            ?>
                            <option value="<?php echo $r['id_category'] ?>"><?php echo $r['category_name'] ?></option>
                            <?php } ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="">Nama Produk</label>
                        <input type="text" name='nama' placeholder="Nama..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">Harga</label>
                        <input type="text" name='harga' placeholder="Harga..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">Stok</label>
                        <input type="number" name='stok' placehuolder="Stok..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">Gambar</label>
                        <input type="file" name='gambar' placeholder="..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">Deskripsi Produk</label>
                        <textarea name='deskripsi' placeholder="Deskripsi..." class="form-control" required></textarea>
                    </fieldset>
                    <fieldset>
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="">--PILIH--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="">color</label>
                        <input type="text" name='color' class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" class="btn" id="contact-submit" data-submit="...sending">Tambah</button>
                    </fieldset>
                </form>
                <?php
                    if(isset($_POST["submit"])){
                        $kategori = $_POST["kategori"];
                        $nama = $_POST["nama"];
                        $harga = $_POST["harga"];
                        $stok = $_POST["stok"];
                        $deskripsi = $_POST["deskripsi"];
                        $status = $_POST["status"];
                        $color = $_POST["color"];

                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        $newname = 'produk' . time() . "." . $type2;

                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF','webp','WEBP');

                        if(!in_array($type2, $tipe_diizinkan)){
                            echo "
                            <script>
                                alert('Format file tidak diizinkan')
                            </script>
                            ";
                        }else{
                            move_uploaded_file($tmp_name, '../produk/'. $newname);

                            $insert = mysqli_query($conn, "INSERT INTO t_product VALUES (null, '$kategori', '$nama', '$deskripsi', '$newname', '$status', null, '$harga', '$stok', '$color')");
                            if($insert){
                                echo "
                                <script>
                                    alert('Tambah data berhasil')
                                    window.location = 'produk_data.php'
                                </script>
                                ";
                            }else{
                                echo "gagal" . mysqli_error($conn);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>