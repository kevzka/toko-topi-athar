<?php include '../db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Produk</title>
    <link rel="stylesheet" href="../style/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar closed">
            <div class="sidebar-title"><b>connecta</b></div>
            <ul>
                <?php
                    include 'sidebar.php'
                ?>
            </ul>
        </div>
        <div class="section">
            <div class="container">
                <?php
                    $produk = mysqli_query($conn, "SELECT * FROM t_product WHERE id_product = '".$_GET['id']."'");
                    if(mysqli_num_rows($produk) == 0){
                        echo "
                        <script>
                            window.location = 'produk_data.php';
                        </script>
                        ";
                    }
                    $p = mysqli_fetch_object($produk);
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>EDIT DATA PRODUK</h3>
                    <fieldset>
                        <label for="">Nama Kategori</label>
                        <select name="kategori" class="form-control" id="" required>
                            <option value="">--pilih--</option>
                            <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM t_category ORDER BY id_category DESC");
                                while($r = mysqli_fetch_array($kategori)){
                            ?>
                            <option value="<?php echo $r['id_category'] ?>" <?php echo ($r['id_category'] == $p->id_category) ? 'selected' : '';?>>
                                <?php echo $r['category_name'] ?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="">Nama Produk</label>
                        <input type="text" name='nama' value="<?php echo $p->product_name ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">Harga</label>
                        <input type="text" name='harga' value="<?php echo $p->product_price ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">Stok</label>
                        <input type="number" name='stok' value="<?php echo $p->stok ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label for="">Gambar</label>
                        <img src="../produk/<?php echo $p->product_image ?>" alt="" width="100px">
                        <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                        <input type="file" name='gambar' placeholder="...Gambar Produk" class="form-control">
                    </fieldset>
                    <fieldset>
                        <label for="">Deskripsi Produk</label>
                        <textarea name='deskripsi' value="<?php echo $p->product_description ?>" class="form-control" required>
                        <?php echo $p->product_description ?>
                        </textarea>
                    </fieldset>
                    <fieldset>
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="" >--pilih--</option>
                            <option value="1" <?php echo ($p->product_status == 1)? 'selected' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo ($p->product_status == 0)? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="">color</label>
                        <input type="text" name='color' value="<?php echo $p->color ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" class="btn" id="contact-submit" data-submit="...sending">Edit</button>
                    </fieldset>
                </form>
                <?php
                $namagambar = '';
                    if(isset($_POST['submit'])){
                        $kategori = $_POST['kategori'];
                        $nama = $_POST['nama'];
                        $harga = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $status = $_POST['status'];
                        $foto = $_POST['foto'];
                        $stok = $_POST['stok'];
                        $color = $_POST['color'];

                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        if($filename != ''){
                            $type1 = explode('.', $filename);
                            $type2 = $type1[1];

                            $newname = 'produk' . time() . '.' . $type2;

                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                            if(!in_array($type2, $tipe_diizinkan)){
                                echo "
                                <script>
                                    alert('format file tidak diizinkan')
                                </script>
                                ";
                            }else{
                                unlink('../produk/'.$foto);
                                move_uploaded_file($tmp_name, '../produk/' . $newname);
                                $namagambar = $newname;
                            }
                        }else{
                            $namagambar = $foto;
                        }
                        $update = mysqli_query($conn, "UPDATE t_product SET
                        id_category = '".$kategori."',
                        product_name = '".$nama."',
                        product_price = '".$harga."',
                        product_description = '".$deskripsi."',
                        product_image = '".$namagambar."',
                        product_status = '".$status."',
                        product_stock = '".$stok."',
                        color = '".$color."'
                        WHERE id_product = '".$p->id_product."'
                        ");
                        if($update){
                            echo "
                            <script>
                                alert('Ubah data berhasil');
                                window.location = 'produk_data.php'
                            </script>
                            ";
                        }else{
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>