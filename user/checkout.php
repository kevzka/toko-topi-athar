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
                                <img src="../gambar/logo.png" onclick="window.location = '../index.php'" class="logo" alt="Logo">
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
    <link rel="stylesheet" href="../style/checkout.css">
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
                    <img src="../gambar/logo.png" onclick="window.location = '../index.php'" class="logo" alt="Logo">
                    <div class="line-logo"></div>
                </div>


                <form action="" method="post" enctype="multipart/form-data">
                <!-- Bagian Delivery -->
                <div class="delivery-section">
                    <p style="margin-top: 5px;">Delivery</p>
                    <input type="text" placeholder="Country/Region" name="fake[]">
                    <input type="text" placeholder="Address" name="fake[]">
                    <input type="text" placeholder="City" name="fake[]">
                    <input type="text" placeholder="Province" name="fake[]">
                </div>

                <!-- Bagian Payment -->
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
    $fakeTrue = true;
    foreach($_POST['fake'] as $i){
        if(strlen($i) == 0){
            $fakeTrue = false;
        }
    }
    if($fakeTrue == false){
        echo "<script>
            alert('masukan lokasi pengiriman');
        </script>";
    } else {

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