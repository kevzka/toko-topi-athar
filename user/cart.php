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
            flex: 1; /* Isi ruang tersisa */
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
            height: 350px;
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
            padding: 10px;
            text-align: left;
            vertical-align: top;
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
            /* background: #ddd; */
            background-color: black;
            margin: 0 10px;
        }

        /* ====================
           Payment Section
        ==================== */
        .pembayaran {
            display: flex;
            align-items: center;
            width: 29%;
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

        .pembayaran .card .info {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .pembayaran .card .line {
            border-bottom: 2px solid black;
            margin: 15px 0;
        }

        .pembayaran .card .total {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .pembayaran .card .submit-btn {
            text-transform: lowercase;
            font-weight: bold;
            width: 100%;
            padding: 12px;
            background: black;
            color: white;
            border: none;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .pembayaran .card .accept-text {
            font-size: 12px;
            text-align: center;
            font-weight: bold;
            color: #555;
            margin-bottom: 10px;
        }

        .pembayaran .card .payment-methods {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .pembayaran .card .payment-methods .peyment-items {
            width: 50px;
            height: 30px;
            background-color: red; /* Ini bisa diganti dengan gambar atau warna sesuai ikon pembayaran */
        }

        .pembayaran .card .continue-line {
            border-top: 2px solid black;
            margin-bottom: 10px;
        }

        .pembayaran .card .continue-text {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .pembayaran .card .benefit {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .pembayaran .card .benefit i {
            color: green;
            font-size: 16px;
        }

        .pembayaran .card .benefit > span {
            font-weight: bold;
            opacity: 0.5;
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
            left: -90px;
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
            width: 450px;
            transform: scaleY(-1);
            left: calc(100vw - 248px);
            top: calc(-100px);
        }
        .accesoris img:nth-child(6) {
            width: 450px;
            left: -100px;
            top: calc(100vh - 200px);
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
                <p style="margin: 0; text-align: center;">Shopping Cart</p>
            </div>

            <form action="" method="post">

                <div class="cart-table-wrapper">
                    <table class="cart-table" border="0">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $admin_id = $_SESSION['id_login'];
                            $totalHargaBarang = 0;
                            $produk = mysqli_query($conn, "SELECT t_cart.id_product, (jml*product_price) AS total, id_cart, category_name, product_name, product_price, product_image, jml FROM t_product, t_category, t_cart WHERE t_category.id_category = t_product.id_category AND t_cart.id_product = t_product.id_product AND id_admin = $admin_id");
                            if ($produk->num_rows == 0) {
                            ?>
                                <tr>
                                    <td colspan="3" style="padding: 5px; text-align:center; height: 270px; line-height: 270px; text-transform: uppercase;"><b>NO ORDERS YET</b></td>
                                </tr>
                                <?php
                            } else {
                                while ($row = mysqli_fetch_array($produk)) {
                                    $totalHargaBarang = $totalHargaBarang + $row['total'];
                                ?>
                                    <tr>
                                        <input type="hidden" name="id_product[]" value="<?php echo $row['id_product'] ?>">
                                        <input type="hidden" name="admin_id[]" value="<?php echo $admin_id ?>">
                                        <input type="hidden" name="id_cart_all[]" value="<?php echo $row['id_cart'] ?>"> <td class="product-info">
                                            <div class="product-image" style="background-image: url('../produk/<?php echo $row['product_image'] ?>'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;"></div>
                                            <div class="product-details">
                                                <div class="product-title"><?php echo $row['product_name'] ?></div>
                                                <div class="product-description">This is a brief description.</div>
                                            </div>
                                        </td>
                                        <td style="text-transform: capitalize;">Rp.<?php echo number_format($row['total']) ?></td>
                                        <td>
                                            <div class="quantity-control">
                                                <input type="number" value="<?php echo $row['jml'] ?>" min="1" name="jml[]" style="border-right: 2px solid #ccc; border-left: 2px solid #ccc;">
                                                </div>
                                            <a href="hapus_proses.php?idc=<?php echo $row['id_cart'] ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="remove-link">remove</a>
                                            <input type="checkbox" name="check[]" id="checkItem" value="<?php echo $row['id_cart'] ?>" style="width: 20px; height: 20px;">
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
                            </tbody>
                    </table>
                </div>

                <div class="cart-progress">
                    <div class="stepper">
                        <div class="line"></div>
                        <div class="step active">
                            <div class="circle">1</div>
                            <div class="label">shopping cart</div>
                        </div>
                        <div class="line"></div>
                        <div class="step">
                            <div class="circle">2</div>
                            <div class="label">checkout</div>
                        </div>
                        <div class="line"></div>
                        <div class="step">
                            <div class="circle">3</div>
                            <div class="label">confirmation</div>
                        </div>
                        <div class="line"></div>
                    </div>
                </div>

        </div>
        <div class="pembayaran">
            <div class="card">
                <div class="logo-contain">
                    <img src="../gambar/logo.png" class="logo" alt="Logo">
                    <div class="line-logo"></div>
                </div>

                <div class="info">
                    <span>shipping:</span>
                    <span>free</span>
                </div>
                <div class="line" style="border-color: #d9d9d8;"></div>

                <div class="total">
                    <span>subtotal:</span>
                    <span style="text-transform: capitalize;">Rp. <?php echo number_format($totalHargaBarang) ?></span>
                </div>

                <button class="submit-btn" type="submit" name="save">Proceed to Checkout</button>

                <div class="accept-text">We accept</div>
                <div class="payment-methods">
                    <div class="peyment-items"></div>
                    <div class="peyment-items"></div>
                    <div class="peyment-items"></div>
                    <div class="peyment-items"></div>
                    <div class="peyment-items"></div>
                </div>

                <div class="continue-line"></div>
                <div class="continue-text">Continue Shopping</div>
                <div class="line"></div>

                <div class="benefit">
                    <i class="fa-solid fa-check-circle"></i>
                    <span>Free shipping May 27 – Jun 3</span>
                </div>
                <div class="benefit">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>Free return within 30 days</span>
                </div>
            </div>
            </form>
        </div>
        <div class="accesoris">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai2.png" alt="">
            <img src="../gambar/rantai1.webp" alt="">
        </div>
    </div>
    <?php
    if (isset($_POST['save'])) {
        if (!empty($_POST['check'])) { // Memastikan ada checkbox yang dipilih
            $checkbox = $_POST['check'];
            $jmll = $_POST['jml'];
            $id_productd = $_POST['id_product'];
            $admin_idd = $_POST['admin_id'];
            $id_cart_all = $_POST['id_cart_all']; // Dapatkan array semua id_cart dari form

            // Buat map dari id_cart ke indeks untuk mencari nilai jml, id_product, admin_id yang sesuai
            $cart_data_map = [];
            foreach ($id_cart_all as $index => $cart_id_value) {
                $cart_data_map[$cart_id_value] = [
                    'jml' => $jmll[$index],
                    'id_product' => $id_productd[$index],
                    'admin_id' => $admin_idd[$index]
                ];
            }

            foreach ($checkbox as $check_id) {
                if (isset($cart_data_map[$check_id])) {
                    $data = $cart_data_map[$check_id];
                    $jml = $data['jml'];
                    $id_product = $data['id_product'];
                    $admin_id = $data['admin_id'];

                    // Insert into t_checkout_temp
                    $insert_sql = "INSERT INTO t_checkout_temp (id_cart, id_product, jml, id_admin) VALUES ('$check_id', '$id_product', '$jml', '$admin_id')";
                    if (!mysqli_query($conn, $insert_sql)) {
                        echo "<script>alert('Error inserting into checkout: " . mysqli_error($conn) . "');</script>";
                        break; // Stop jika ada error
                    }

                    // Delete from t_cart
                    $delete_sql = "DELETE FROM t_cart WHERE id_cart='$check_id'";
                    if (!mysqli_query($conn, $delete_sql)) {
                        echo "<script>alert('Error deleting from cart: " . mysqli_error($conn) . "');</script>";
                        break; // Stop jika ada error
                    }
                }
            }
            echo "<script>
                    alert('Checkout berhasil');
                    window.location = 'checkout.php';
                </script>";
        } else {
            echo "<script>alert('Pilih setidaknya satu produk untuk checkout.');</script>";
        }
    }
    ?>
    <script>
        // Pilih semua kontrol jumlah produk
        document.querySelectorAll('.quantity-control').forEach(control => {
            const minusBtn = control.querySelector('.buttonq:first-child');
            const plusBtn = control.querySelector('.buttonq:last-child');
            const input = control.querySelector('input');


            // Memastikan tombol ada sebelum menambahkan event listener
            if (minusBtn) {
                minusBtn.addEventListener('click', () => {
                    console.log(input.value)
                    let value = parseInt(input.value);
                    if (value > parseInt(input.min)) {
                        input.value = value - 1;
                        console.log(input.value)
                    }
                });
            }

            if (plusBtn) {
                plusBtn.addEventListener('click', () => {
                    let value = parseInt(input.value);
                    input.value = value + 1;
                });
            }
        });
    </script>


</body>

</html>