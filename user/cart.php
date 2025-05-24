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
    <link rel="stylesheet" href="../style/cart.css">
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
                    <img src="../gambar/logo.png" onclick="window.location = '../index.php'" class="logo" alt="Logo">
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