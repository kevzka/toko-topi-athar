<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connecta</title>
    <link rel="stylesheet" href="../style/styleadmin.css">
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
            <h5 class="card-title">Keranjang Pelanggan</h5>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Kategori Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>jumlah</th>
                    <th>Total</th>
                </tr>
                <?php
                    $no = 1;
                    $produk = mysqli_query($conn, "SELECT admin_name, (jml*product_price) AS total, id_cart, category_name, product_name, product_price, product_image, jml
                FROM t_product, t_category, t_cart, t_admin
                WHERE t_category.id_category=t_product.id_category AND
                t_cart.id_product=t_product.id_product AND
                t_admin.id_admin=t_cart.id_admin    
                ");
                // while($row = mysqli_fetch_array($produk)){
                //     var_dump($row);
                // };
                    while($row = mysqli_fetch_array($produk)){
                        ?>
                            <tr>
                                <td><?php $no++ ?></td>
                                <td><?php echo $row['admin_name'] ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="../produk/<?php echo $row['product_image'] ?>" width="50px" alt=""></a></td>
                                <td><?php echo $row['jml'] ?></td>
                                <td>Rp. <?php echo number_format($row['total']) ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>