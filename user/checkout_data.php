<?php
include 'session.php';
include '../db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/order.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css'>
</head>

<body>
    <?php include 'sidebar.php' ?>
    <div class="container">
        <div class="line2">E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design </div>
        <div class="cart-product">
            <div class="cart-title">
                <p style="margin: 0 20px; text-align: center; cursor: pointer;" onclick="window.location='batal.php'">my order-cancel</p>
                <p style="margin: 0 20px; text-align: center; cursor: pointer;" class="active">my order-progress</p>
                <p style="margin: 0 20px; text-align: center; cursor: pointer;" onclick="window.location='selesai.php'">my order-done</p>
            </div>

            <form action="" method="post">

                <div class="cart-table-wrapper">
                    <table class="cart-table" border="0">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>product pic</th>
                                <th>amount</th>
                                <th>total</th>
                                <th>status</th>
                                <th>date</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $admin_id = $_SESSION['id_login'];
                            $produk = mysqli_query($conn, "SELECT (c.jml * p.product_price) AS total, c.date, c.id_checkout, cat.category_name, p.product_name, p.product_price, p.product_image, c.jml, c.proof, c.validation, c.status, c.id_checkout FROM t_checkout c JOIN t_product p ON c.id_product = p.id_product JOIN t_category cat ON p.id_category = cat.id_category WHERE c.status != 'Selesai' AND c.status != 'Batal' AND c.id_admin = $admin_id ORDER BY p.product_name ASC");
                            if ($produk->num_rows == 0) {
                            ?>
                                <tr>
                                    <td colspan="8" style="padding: 5px; text-align:center; height: 270px; line-height: 270px; text-transform: uppercase;"><b>NO ORDERS YET</b></td>
                                </tr>
                                <?php
                            }
                            while ($row = mysqli_fetch_array($produk)) {
                            ?>
                                <tr>
                                    <td><div class="product-name"><?php echo $row['product_name'] ?></div></td>
                                    <td><div class="product-price">Rp. <?php echo number_format($row['product_price']) ?></div></td>
                                    <td><div class="product-image"><img src="../produk/<?php echo $row['product_image'] ?>" alt="" style="max-width: 100px;"></div></td>
                                    <td><div class="amout"><?php echo $row['jml'] ?></div></td>
                                    <td><div class="total">Rp. <?php echo number_format($row['total']) ?></div></td>
                                    <?php
                                        if($row['status'] == 'Proses'){
                                            ?>
                                            <td>
                                                <p style="margin: 0; display: inline;">delivering</p><br>
                                                <a class="text-white" href="proses.php?ck_id=<?php echo $row['id_checkout'] ?>" onclick="return confirm('Yakin proudk telah sampai?')">
                                                    <strong>sampai?</strong>
                                                </a>
                                            </td>
                                            <td><div class="date"><?php echo str_replace('-', '/', $row['date']); ?></div></td>
                                            <td><a class="text-white" style="background-color: black; color: rgb(99, 99, 99)">
                                                <strong>cancel</strong>
                                        </a></td>
                                            <?php
                                        } else {
                                            ?>
                                                <td><p style="margin: 0; display: inline;"><?php echo ($row['status']=='proses') ?'deliverd':'packaged'?></p></td>
                                                <td><div class="date"><?php echo str_replace('-', '/', $row['date']); ?></div></td>
                                                <td><a class="text-white" href="proses.php?kc_id=<?php echo $row['id_checkout'] ?>" onclick="return confirm('Yakin di batalkan?')">
                                                    <strong>cancel</strong>
                                                </a></td>
                                            <?php
                                        }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="accesoris">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/logo.png" onclick="window.location = '../index.php'" onclick="window.location = '../index.php'" alt="">
            <img src="../gambar/planet1.png" alt="">
        </div>
    </div>
</body>

</html>