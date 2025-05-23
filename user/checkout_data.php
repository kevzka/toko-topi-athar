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
    <style>
        /* ====================
            Global Styles
        ==================== */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            text-transform: lowercase;
        }

        /* ====================
            Container Layout
        ==================== */
        .container {
            position: relative;
            overflow: hidden;
            display: flex;
            padding-left: 50px;
            width: 100%;
            box-sizing: border-box;
            height: 100vh;
            padding-bottom: 54.5px;
        }

        .container > .line2 {
            font-family: 'Arial Black', sans-serif;
            line-height: 54.2PX;
            overflow: hidden;
            position: absolute;
            width: max-content;
            height: 54.2px;
            background-color: black;
            bottom: 0;
            left: -5px;
            text-transform: uppercase;
            box-sizing: border-box;
            color: white;
            z-index: 999999;
        }

        /* ====================
            Cart Product Section
        ==================== */
        .cart-product {
            width: 75%;
            height: 100%;
            box-sizing: border-box;
            background-color: white;
            padding: 0 10px;
        }

        .cart-product .cart-title {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10%;
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
            box-sizing: border-box;
        }

        .cart-product .cart-title p {
            margin: 0;
            text-align: center;
        }

        .cart-product .cart-table-wrapper {
            width: 100%;
            height: 400px;
            border-bottom: 2px solid #d9d9d8;
            box-sizing: border-box;
            overflow-y: auto;
            padding: 10px;
        }

        .cart-product .cart-table-wrapper .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-product .cart-table-wrapper .cart-table thead {
            position: sticky;
            top: -11px;
            background-color: white;
            border-bottom: 2px solid #d9d9d8;
            box-sizing: border-box;
            z-index: 1;
        }

        .cart-product .cart-table-wrapper .cart-table th {
            text-align: center;
            padding: 10px;
        }

        .cart-product .cart-table-wrapper .cart-table td {
            font-weight: bold;
            padding: 10px;
            text-align: center;
            vertical-align: center;
        }

        .cart-product .cart-table-wrapper .cart-table td:last-child a{
            padding: 10px;
            background-color: black;
            text-decoration: none;
            color: white;
            text-align: center;
            vertical-align: center;
        }

        .cart-product .cart-table-wrapper .cart-table td:nth-child(2) {
            padding: 10px;
            text-align: center;
            line-height: 80px;
        }

        .cart-product .cart-table-wrapper .cart-table .product-info {
            display: flex;
            gap: 10px;
        }

        .cart-product .cart-table-wrapper .cart-table .product-info .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .cart-product .cart-table-wrapper .cart-table .product-info .product-details .product-title {
            font-weight: bold;
        }

        .cart-product .cart-table-wrapper .cart-table .product-info .product-details .product-description {
            font-size: 12px;
            color: #555;
        }

        .cart-product .cart-table-wrapper .cart-table .quantity-control {
            display: flex;
            border-top: 2px solid #ccc;
            border-bottom: 2px solid #ccc;
            overflow: hidden;
            width: fit-content;
            font-family: Arial, sans-serif;
            font-size: 16px;
            margin: auto;
            margin-top: 20px;
            align-items: center;
            gap: 5px;
            margin-bottom: 5px;
        }

        .cart-product .cart-table-wrapper .cart-table .quantity-control .buttonq {
            background-color: #f0f0f0;
            border: none;
            border-right: 2px solid #ccc;
            border-left: 2px solid #ccc;
            padding: 8px 12px;
            cursor: pointer;
            font-weight: bold;
            color: #333;
            transition: background-color 0.2s ease;
        }

        .cart-product .cart-table-wrapper .cart-table .quantity-control .buttonq:hover {
            background-color: #e0e0e0;
        }

        .cart-product .cart-table-wrapper .cart-table .quantity-control input[type="number"] {
            border: none;
            text-align: center;
            padding: 8px 0;
            width: 50px;
            -moz-appearance: textfield;
            border-right: 2px solid #ccc;
            border-left: 2px solid #ccc;
        }

        .cart-product .cart-table-wrapper .cart-table .quantity-control input[type="number"]::-webkit-outer-spin-button,
        .cart-product .cart-table-wrapper .cart-table .quantity-control input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .cart-product .cart-table-wrapper .cart-table .remove-link {
            width: 100%;
            display: inline-block;
            font-weight: bold;
            text-align: center;
            font-size: 12px;
            text-decoration: underline;
            text-decoration-thickness: 2px;
            color: black;
        }

        .cart-product .cart-progress {
            width: 100%;
            height: 100%;
            padding: 20px;
            font-weight: bold;
            text-align: center;
            box-sizing: border-box;
        }

        .cart-product .cart-progress .stepper {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
        }

        .cart-product .cart-progress .stepper .step {
            margin-top: 20px;
            width: 40px;
            text-align: center;
        }

        .cart-product .cart-progress .stepper .step .circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #ddd;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-weight: bold;
        }

        .cart-product .cart-progress .stepper .step.active .circle {
            background: #000;
            color: #fff;
        }

        .cart-product .cart-progress .stepper .step .label {
            margin-left: -20px;
            margin-top: 8px;
            font-weight: bold;
            color: #000;
            font-size: 14px;
            white-space: nowrap;
        }

        .cart-product .cart-progress .stepper .line {
            flex: 1;
            height: 2px;
            background-color: black;
            margin: 0 10px;
        }

        /* ====================
            Payment Section (for confirmation)
        ==================== */
        .confirmation {
            /* If you want to overlay it or hide/show, you'll need more complex CSS */
            /* For now, it will simply appear after .container */
        }

        .confirmation .bg-white {
            /* This div exists in your HTML but has no styles here */
            /* You might want to add background-color: white; height: 100%; width: 100%; etc. */
        }

        .pembayaran {
            display: flex;
            align-items: center;
            width: 29%; /* This seems specific to the original layout, adjust if .confirmation replaces it */
            height: 100%;
            box-sizing: border-box;
            background-color: white;
            padding: 0 20px;
        }

        .pembayaran .card {
            z-index: 2;
            height: 80%;
            text-transform: lowercase;
            width: 100%;
            margin: 50px auto;
            background: #f0f1f5;
            border-radius: 30px;
            padding: 10px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .pembayaran .card .logo-contain {
            width: 100%;
            height: max-content;
            margin-bottom: 4rem;
        }

        .pembayaran .card .logo-contain .logo {
            display: block;
            margin: 0 auto;
            width: 60%;
        }

        .pembayaran .card .logo-contain .line-logo {
            margin: auto;
            width: 60%;
            border-bottom: 2px solid black;
        }

        .pembayaran .card .continue-text {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .confirmation > .pembayaran .card button {
            margin: 0px auto;
            text-align: center;
            width: 70%;
            display: block; /* Ensures margin: auto works for centering */
        }

        /* ====================
            Accessories Section
        ==================== */
        .accesoris {
            position: absolute;
        }

        .accesoris img {
            position: absolute;
            z-index: 999;
            width: 150px;
            top: 0;
            left: calc(100vw - 10rem);
        }

        .accesoris img:nth-child(2) {
            top: calc(187px * 1);
        }

        .accesoris img:nth-child(3) {
            top: calc(187px * 2);
        }

        .accesoris img:nth-child(4) {
            top: calc(187px * 3);
        }

        .accesoris img:nth-child(5) {
            width: 15rem;
            left: calc(100vw - 400px);
        }
        .cart-title > p.active{
            border-bottom: 2px solid black;
        }
    </style>
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
                            $produk = mysqli_query($conn, "SELECT (c.jml * p.product_price) AS total, c.date, c.id_checkout, cat.category_name, p.product_name, p.product_price, p.product_image, c.jml, c.proof, c.validation, c.status, c.id_checkout FROM t_checkout c JOIN t_product p ON c.id_product = p.id_product JOIN t_category cat ON p.id_category = cat.id_category WHERE c.status != 'Selesai' AND c.status != 'Batal' AND c.id_admin = $admin_id");
                            if ($produk->num_rows == 0) {
                            ?>
                                <tr>
                                    <td colspan="8" style="padding: 5px;"><b>Tidak ada data</b></td>
                                </tr>
                                <?php
                            }
                            while ($row = mysqli_fetch_array($produk)) {
                            ?>
                                <tr>
                                    <td><div class="product-name"><?php echo $row['product_name'] ?></div></td>
                                    <td><div class="product-price"><?php echo $row['product_price'] ?></div></td>
                                    <td><div class="product-image"><img src="../produk/<?php echo $row['product_image'] ?>" alt="" style="max-width: 100px;"></div></td>
                                    <td><div class="amout"><?php echo $row['jml'] ?></div></td>
                                    <td><div class="total"><?php echo $row['total'] ?></div></td>
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
                                                <td><mark><?php echo ($row['status']=='proses') ?'deliverd':'packaged'?></mark></td>
                                            <?php
                                        }
                                    ?>
                                    <td><div class="date"><?php echo $row['date'] ?></div></td>
                                    <td><a class="text-white" href="proses.php?kc_id=<?php echo $row['id_checkout'] ?>" onclick="return confirm('Yakin proudk telah sampai?')">
                                        <strong>cancel</strong>
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
            <img src="../gambar/logo.png" alt="">
        </div>
    </div>
</body>

</html>