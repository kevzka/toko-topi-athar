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
                <p style="margin: 0 20px; text-align: center; cursor: pointer;" onclick="window.location='checkout_data.php'">my order-progress</p>
                <p style="margin: 0 20px; text-align: center; cursor: pointer;" class="active">my order-done</p>
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
                            $produk = mysqli_query($conn, "SELECT 
  t_admin.admin_name, 
  t_admin.phone, 
  t_admin.admin_address, 
  (t_checkout.jml * t_product.product_price) AS total, 
  t_checkout.date, 
  t_checkout.id_checkout, 
  t_product.id_product, 
  t_product.product_name, 
  t_product.product_price, 
  t_product.product_image, 
  t_checkout.jml, 
  t_checkout.proof, 
  t_checkout.validation, 
  t_checkout.status 
FROM 
  t_product, 
  t_checkout, 
  t_admin 
WHERE 
  t_admin.id_admin = t_checkout.id_admin 
  AND t_checkout.id_product = t_product.id_product 
  AND t_checkout.status = 'selesai';
");
                            if ($produk->num_rows == 0) {
                            ?>
                                <tr>
                                    <td colspan="3" style="padding: 5px; text-align:center; height: 270px; line-height: 270px; text-transform: uppercase;"><b>NO ORDERS YET</b></td>
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
                                                <mark><?php echo $row['status'] ?></mark><br>
                                                <a class="text-white" href="proses.php?ck_id=<?php echo $row['id_checkout'] ?>" onclick="return confirm('Yakin proudk telah sampai?')">
                                                    <strong>sampai?</strong>
                                                </a>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                                <td><p style="margin: 0; display: inline;"><?php
    $temp = '';
    // Ensure $row['status'] is safely accessed and trimmed
    $current_status = trim($row['status'] ?? '');

    switch ($current_status){
        case 'proses':
            $temp = 'packaged';
            break;
        case 'Selesai':
            $temp = 'done';
            break;
        case 'Batal':
            $temp = 'cancel';
            break;
        default: // Handles any other status not explicitly listed
            $temp = 'unknown'; // Or whatever default message you prefer
            break;
    }
    // For debugging, keep var_dump temporarily. Remove in production.
    // echo "Debug Status: ";
    // var_dump($row['status']);
    echo $temp;
?></p></td>
                                            <?php
                                        }
                                    ?>
                                    <td><div class="date"><?php echo $row['date'] ?></div></td>
                                    <td><a class="text-white" href="detail_produk.php?p_id=<?php echo $row['id_product']?>">
                                        <strong>buy again</strong>
                                    </a></td>
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
            <img src="../gambar/logo.png" onclick="window.location = '../index.php'" alt="">
            <img src="../gambar/planet1.png" alt="">
        </div>
    </div>
</body>

</html>