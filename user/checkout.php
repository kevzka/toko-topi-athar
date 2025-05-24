<?php
include 'session.php';
include '../db.php';
?>
<script>
    function addConfirmation() {

        // 1. Get the .container element
        const containerElement = document.querySelector('.container');
        const step = document.querySelector('.cart-progress > .stepper > .step:nth-child(6)');
        step.classList.add('active');

        // Check if the .container element exists
        if (containerElement) {
            // 2. Create a new div element to hold the entire confirmation structure
            const confirmationDiv = document.createElement('div');
            confirmationDiv.classList.add('confirmation');

            // 3. Set the innerHTML of the confirmationDiv to your provided HTML
            confirmationDiv.innerHTML = `
                    <div class="bg-white"></div>
                    <div class="pembayaran">
                        <div class="card">
                            <div class="logo-contain">
                                <img src="../gambar/logo.png" class="logo" alt="Logo">
                                <div class="line-logo"></div>
                            </div>
        
                            <div class="continue-text" style="text-transform: uppercase;">Thank You!</div>
        
                            <div class="container-text">
                                <p>we are getting started on your order right away, and you will receive an order confirmation shortly to your email. explore the latest fashion and get inspired by
                                    new trends just head over to <a href="product_user.php">cappin’s product page</a></p>
                            </div>
                            <button onclick="window.location = 'checkout_data.php'">your order</button>
                            <div class="footer">
                                <p>© 2025</p>
                                <p>All rights reserved.</p>
                            </div>
                        </div>
                        </form> </div>
                `;

            // 4. Insert the new confirmationDiv immediately after the .container element
            containerElement.insertAdjacentElement('afterend', confirmationDiv);
        } else {
            console.warn('Element with class ".container" not found.');
        }
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            text-transform: lowercase;
        }

        .container {
            padding-bottom: 54.5px;
            position: relative;
            overflow: hidden;
            display: flex;
            padding-left: 50px;
            width: 100%;
            box-sizing: border-box;
            height: 100vh;
        }

        .cart-product {
            flex: 1;
            /* Isi ruang tersisa */
            height: 100%;
            box-sizing: border-box;
            background-color: white;
            padding: 0 10px;
        }

        .pembayaran {
            display: flex;
            align-items: center;
            width: 29%;
            height: 100%;
            box-sizing: border-box;
            background-color: white;
            padding: 0 20px;
        }

        .card {
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

        .logo {
            display: block;
            margin: 0 auto;
            width: 60%;
        }

        .line {
            border-bottom: 2px solid black;
            margin: 15px 0;
        }

        .pembayaran>.card>.logo-contain {
            width: 100%;
            height: max-content;
            margin-bottom: 2rem;
        }

        .pembayaran>.card>.logo-contain>.line-logo {
            margin: auto;
            width: 60%;
            border-bottom: 2px solid black;
        }

        .cart-title {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10%;
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
            box-sizing: border-box;
        }

        .cart-title>p {
            display: inline-block;
            /* Supaya bisa pakai border */
            border-bottom: 2px solid black;
            /* Garis bawah */
            padding-bottom: 4px;
        }

        .cart-table-wrapper {
            width: 100%;
            height: 60%;
            border-bottom: 2px solid #d9d9d8;
            box-sizing: border-box;
            /* flex: 1; */
            overflow-y: auto;
            padding: 10px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th,
        .cart-table td {
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }

        .cart-table td:nth-child(2) {
            padding: 10px;
            text-align: center;
            line-height: 80px;
        }

        .cart-table tbody {
            border-top: 2px solid #d9d9d8;
        }

        .product-info {
            display: flex;
            gap: 10px;
        }

        .product-image {
            position: relative;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .product-title {
            text-transform: uppercase;
            margin-top: 2rem;
            font-weight: bold;
        }

        .product-description {
            font-size: 12px;
            color: #555;
        }

        .quantity-control {
            width: max-content;
            margin: auto;
            margin-top: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 5px;
        }

        .remove-link {
            width: 100%;
            display: inline-block;
            font-weight: bold;
            text-align: center;
            font-size: 12px;
            text-decoration: underline;
            text-decoration-thickness: 2px;
            /* atur ketebalan underline */
            color: black;
        }

        .cart-progress {
            width: 100%;
            height: 100%;
            padding: 20px;
            font-weight: bold;
            text-align: center;
            box-sizing: border-box;
        }

        .stepper {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
        }

        .step {
            width: 40px;
            text-align: center;

        }

        .circle {
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

        .step.active .circle {
            background: #000;
            color: #fff;
        }

        .label {
            margin-top: 8px;
            font-weight: bold;
            color: #000;
            font-size: 14px;
            white-space: nowrap;
        }

        .stepper .line {
            flex: 1;
            height: 2px;
            background: #ddd;
            margin: 0 10px;
        }

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
            top: calc(187px*1);
        }

        .accesoris img:nth-child(3) {
            top: calc(187px*2);
        }

        .accesoris img:nth-child(4) {
            top: calc(187px*3);
        }

        .accesoris img:nth-child(5) {
            width: 450px;
            transform: scaleY(-1);
            rotate: -10deg;
            left: calc(100vw - 248px);
            top: calc(-150px);
        }

        .delivery-section>p,
        .payment-section>p {
            text-align: center;
            font-weight: bold;
            margin-bottom: 0;
        }

        .card input {
            margin: 5px 0;
            width: 80%;
            padding: 10px 20px;
            height: 10px;
            border: none;
            border-radius: 20px;
            /* Setengah lingkaran horizontal */
            background-color: #dadff0;
            /* Biru muda */
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }

        .card input::placeholder {
            opacity: 0.5;
            font-weight: bold;
            color: #020202;
        }

        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .payment-methods .peyment-items {
            width: 50px;
            height: 30px;
            background-color: red;
        }

        .confirm-button {
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

        .container>.line2 {
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

        .upload-label {
            width: 100%;
            box-sizing: border-box;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            gap: 8px;
            background-color: black;
            color: white;
            padding: 10px 16px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .upload-label:hover {
            background-color: black;
        }

        .upload-label.uploaded {
            background-color: white;
            color: black;
            border: 2px solid black;
            box-sizing: border-box;
        }

        .confirmation {
            top: 0;
            position: fixed;
            width: 100%;
            height: 100vh;
            z-index: 10;
        }

        .confirmation>.pembayaran {
            display: flex;
            align-items: center;
            width: 29%;
            height: 100%;
            box-sizing: border-box;
            background-color: white;
            padding: 0 20px;
            padding-bottom: 54.5px;
        }

        .confirmation>.pembayaran .card {
            position: relative;
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

        .confirmation>.pembayaran .card .logo-contain {
            width: 100%;
            height: max-content;
            margin-bottom: 1rem;
        }

        .confirmation>.pembayaran .card .logo-contain .logo {
            display: block;
            margin: 0 auto;
            width: 60%;
        }

        .confirmation>.pembayaran .card .logo-contain .line-logo {
            margin: auto;
            width: 60%;
            border-bottom: 2px solid black;
        }

        .confirmation>.pembayaran .card .continue-text {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .confirmation>.pembayaran {
            position: absolute;
            right: 0;
        }

        .confirmation>.pembayaran .card .container-text {
            margin: auto;
            text-align: center;
            width: 70%;
            color: #020202;
        }

        .confirmation>.pembayaran .card .container-text a {
            margin: auto;
            text-align: center;
            width: 70%;
            color: #020202;
        }

        .confirmation>.pembayaran .card button {
            display: block;
            margin: 0px auto;
            text-align: center;
            width: 90%;
            text-transform: lowercase;
            font-weight: bold;
            padding: 12px;
            background: black;
            color: white;
            border: none;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .confirmation>.pembayaran .card .footer {
            right: 0;
            left: 0;
            position: absolute;
            bottom: 0;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            font-size: 12px;
            color: black;
        }

        .confirmation>.pembayaran .card .footer>p {
            margin: 0;
        }

        .confirmation .bg-white {
            position: absolute;
            width: 100%;
            height: 100vh;
            top: 0;
            background-color: white;
            opacity: 0.5;
        }

        .jumlah {
            font-family: arial;
            font-size: 1.5rem;
            font-weight: bold;
            align-items: center;
            justify-content: center;
            position: absolute;
            display: flex;
            right: 0;
            height: 25%;
        }
    </style>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css'>
</head>

<body>
    <div class="container">
        <div class="line2">E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design </div>
        <div class="cart-product">
            <!-- Row 1: Title -->
            <div class="cart-title">
                <p style="margin: 0; text-align: center;">checkout</p>
            </div>

            <!-- Row 2: Table -->
            <div class="cart-table-wrapper">
                <table class="cart-table" border="0">
                    <tbody>
                        <?php
                        $no = 1;
                        $admin_id = $_SESSION['id_login'];
                        $produk = mysqli_query($conn, "SELECT t_checkout_temp.id_product, (jml*product_price) AS total, id_cart, category_name, product_name, product_price, product_image, jml FROM t_product, t_category, t_checkout_temp WHERE t_category.id_category = t_product.id_category AND t_checkout_temp.id_product = t_product.id_product AND id_admin = $admin_id");
                        while ($row = mysqli_fetch_array($produk)) {
                        ?>
                            <tr>
                                <td class="product-info">
                                    <div class="product-image" style="background-image: url('../produk/<?php echo $row['product_image'] ?>'); background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;">
                                        <div class="jumlah"><?php echo $row['jml'] ?></div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-title"><?php echo $row['product_name'] ?></div>
                                        <div class="product-description" style="text-transform: capitalize;">Color: [black]</div>
                                        <div class="product-description" style="text-transform: capitalize;">Size: [kids]</div>
                                        <div style="text-transform: capitalize;" class="product-description">Price: Rp.<?php echo number_format($row['total']) ?></div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <!-- Tambah produk kedua di sini -->
                    </tbody>
                </table>
            </div>

            <!-- Row 3: Progress Link -->
            <div class="cart-progress">
                <div class="stepper">
                    <div class="line"></div>
                    <div class="step active">
                        <div class="circle">1</div>
                        <div class="label">shopping cart</div>
                    </div>
                    <div class="line"></div>
                    <div class="step active">
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


                <!-- Bagian Delivery -->
                <div class="delivery-section">
                    <p style="margin-top: 5px;">Delivery</p>
                    <input type="text" placeholder="Country/Region">
                    <input type="text" placeholder="Address">
                    <input type="text" placeholder="City">
                    <input type="text" placeholder="Province">
                </div>

                <!-- Bagian Payment -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="payment-section">

                        <p style="margin: 5px 0;">Payment</p>
                        <!-- Input file dengan label custom -->
                        <input type="file" id="buktiPembayaran" accept="image/*" name="gambar" style="display: none;">
                        <label for="buktiPembayaran" class="upload-label">
                            <i class="fas fa-camera"></i><span class="label-text">Upload Payment Proof</span>
                        </label>

                        <p class="or-text" style="margin: 0; font-weight: normal;">or</p>
                        <p class="cod-text" style="margin: 10px 0 30px 0; text-decoration: underline; text-decoration-thickness: 2px;">Cash on Delivery</p>
                    </div>

                    <!-- Tombol Confirm -->
                    <button type="submit" class="confirm-button" name="proses">Confirm</button>
                </form>
            </div>
        </div>
        <div class="accesoris">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai4.png" alt="">
            <img src="../gambar/rantai2.png" alt="">
        </div>
    </div>
    <?php
    if (isset($_POST['proses'])) {
        $tgl = date('Y-m-d');
        $filename = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        $type1 = explode('.', $filename);
        $type2 = $type1[1];

        $newname = 'tf' . time() . '.' . $type2;

        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF', 'WEBP', 'webp');

        if (!in_array($type2, $tipe_diizinkan)) {
            echo '<script>alert("format file tidak diizinkan");window.location = "checkout.php"</script>';
        } else {
            move_uploaded_file($tmp_name, '../bukti_transfer/' . $newname);
            $query = mysqli_query($conn, "SELECT * FROM t_checkout_temp NATURAL JOIN t_product");
            while ($r = mysqli_fetch_array($query)) {
                $jml = $r['jml'];
                $product_price = $r["product_price"];
                $total = $jml * $product_price;
                $insert = mysqli_query($conn, "INSERT INTO t_checkout VALUES (null, '$r[id_product]', '$jml', '$r[id_admin]', '$total', '$newname', 'Menunggu', 'Pending', '$tgl')");
                mysqli_query($conn, "UPDATE t_product SET product_stock=stock-'$jml' WHERE id_product='$r[id_product]'");
            }
            mysqli_query($conn, "TRUNCATE t_checkout_temp");
            if ($insert) {
                echo '<script>
                                        alert("Pembayaran Berhasil");
                                        addConfirmation();
                                    </script>';
            } else {
                echo 'gagal' . mysqli_error($conn);
            }
        }
    }
    ?>
    <script>
        document.getElementById('buktiPembayaran').addEventListener('change', function() {
            const label = document.querySelector('label[for="buktiPembayaran"]');
            const labelText = label.querySelector('.label-text');

            console.log('sudah');

            if (this.files && this.files.length > 0) {
                label.classList.add('uploaded');
                labelText.textContent = 'Payment Proof Uploaded';
            } else {
                label.classList.remove('uploaded');
                labelText.textContent = 'Upload Payment Proof';
            }
        });
    </script>


</body>

</html>