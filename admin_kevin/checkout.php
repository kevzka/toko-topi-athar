<?php 
include "session.php";
include "fungsi_indotgl.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
        </div>
        <div class="sidebar closed">
            <div class="sidebar-title"><b>connecta</b></div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <h5 class="card-title">Data Check Out. Menunggu Validasi dan Pengiriman</h5>
                <table class="table1">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Bukti</th>
                        <th>Validasi</th>
                        <th>Pengiriman</th>
                        <th>Pelanggan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                    </tr>
                    <?php
                        $no = 1;
                        $id_admin = $_SESSION['id_login'];
                        $produk = mysqli_query($conn, "SELECT admin_name, phone,  admin_address, (jml*product_price) AS total, date, id_checkout, product_name, product_price, product_image, jml, proof, validation, status FROM t_product, t_checkout, t_admin WHERE t_admin.id_admin = t_checkout.id_admin AND t_checkout.id_product = t_product.id_product AND status != 'Selesai' AND status  != 'Batal'");
                        while($row = mysqli_fetch_array($produk)){
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                    <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="../produk/<?php echo $row['product_image'] ?>" width="50px"></a></td>
                                    <td><?php echo $row['jml'] ?></td>
                                    <td>Rp. <?php echo number_format($row['total']) ?></td>
                                    <td><?php echo tgl_indo($row['date']) ?></td>
                                    <td><a href="../bukti_transfer/<?php echo $row['proof'] ?>" target="_blank" ><img src="../bukti_transfer/<?php echo $row['proof'] ?>"></a></td>
                                    <?php
                                        if($row['validation'] == 'Valid'){
                                            ?>
                                            <td>
                                                <mark><?php echo $row['validation'] ?></mark>
                                                <br>
                                                <button class="text-black btn" onclick="if(confirm('Yaking bukti tidak Valid')){window.location = 'proses_nonvalid.php?id_ck=<?php echo $row['id_checkout'] ?>'}"><strong>Tidak?</strong></button>
                                            </td>
                                                <?php
                                        }else if($row['validation']){
                                                ?>
                                                    <td>
                                                        <mark><?php echo $row['validation'] ?></mark>
                                                        <button class="text-black btn" onclick="if(confirm('Yaking bukti Valid')){window.location = 'proses_valid.php?id_ck=<?php echo $row['id_checkout'] ?>'}"><strong>Valid?</strong></button>
                                                        <br>
                                                        <button class="text-black btn" onclick="if(confirm('Yaking bukti tidak Valid')){window.location = 'proses_nonvalid.php?id_ck=<?php echo $row['id_checkout'] ?>'}"><strong>Tidak?</strong></button>
                                                    </td>
                                                <?php
                                        }else{
                                            ?>
                                                <td><mark><?php echo $row['validation'] ?></mark><br></td>
                                            <?php
                                        }
                                    ?>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php echo $row['admin_name'] ?></td>
                                    <td><?php echo $row['admin_address'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
        </div>
    </div>
</body>
</html>