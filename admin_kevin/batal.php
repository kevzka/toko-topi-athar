<?php include('session.php'); ?>

<?php include 'fungsi_indotgl.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BukaWarung</title>
    <link rel="stylesheet" type="text/css" href="../style/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="header"></div>
        </div>
        <div class="sidebar closed">
            <div class="sidebar-title"><b>connecta</b></div>
            <ul>
                <?php	include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <h5 class="card-title">Data Check Out Dibatalkan (Bukti Transfer Tidak Valid)</h5>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Bukti</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                </tr>
                <?php
                $no = 1;
                $admin_id = $_SESSION['id_login'];
                $produk = mysqli_query($conn, "SELECT admin_name, phone, admin_address, (jml*product_price) AS total, date, id_checkout, product_name, product_price, product_image, jml, proof, validation, status FROM t_product, t_checkout, t_admin WHERE t_admin.id_admin = t_checkout.id_admin AND t_checkout.id_product = t_product.id_product AND status = 'Batal'");

                while ($row = mysqli_fetch_array($produk)) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td>Rp.<?php echo number_format($row['product_price']) ?></td>
                        <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank"></a><img src="../produk/<?php echo $row['product_image'] ?>" alt="" width="50px"></td>
                        <td><?php echo $row['jml'] ?></td>
                        <td>Rp. <?php echo number_format($row['total']) ?></td>
                        <td><a href="../bukti_transfer/<?php echo $row['proof'] ?>" target="_blank"></a><img src="../bukti_transfer/<?php echo $row['proof'] ?>" alt="" width="50px"></td>
                        <td><?php echo $row['admin_address'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>