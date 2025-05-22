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
        body{
            margin: 0;
            font-family: Arial, sans-serif;
            text-transform: lowercase;
        }
        .container {
            position: relative;
            overflow: hidden;
            display: flex;
            padding-left: 50px;
            width: 100%;
            box-sizing: border-box;
            height: 100vh;
        }
        .cart-product {
            flex: 1; /* Isi ruang tersisa */
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
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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

        /* .info {
        font-size: 14px;
        margin-bottom: 10px;
        } */

        .total, .info {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 15px;
        }

        .submit-btn {
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

        .accept-text {
        font-size: 12px;
        text-align: center;
        font-weight: bold;
        color: #555;
        margin-bottom: 10px;
        }

        .payment-methods {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 30px;
        }

        .payment-methods .peyment-items {
        width: 50px;
        height: 30px;
        background-color: red;
        }

        .continue-line {
        border-top: 2px solid black;
        margin-bottom: 10px;
        }

        .continue-text {
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        }

        .benefit {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        margin-bottom: 8px;
        }

        .benefit i {
        color: green;
        font-size: 16px;
        }
        .benefit > span{
            font-weight: bold;
            opacity: 0.5;
        }
        .pembayaran > .card> .logo-contain{
            width: 100%;
            height: max-content;
            margin-bottom: 4rem;
        }
        .pembayaran > .card> .logo-contain > .line-logo{
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

            .cart-table th, .cart-table td {
            padding: 10px;
            text-align: left;
            vertical-align: top;
            }
            .cart-table td:nth-child(2) {
            padding: 10px;
            text-align: center;
            line-height: 80px;
            }
            .cart-table th{
                text-align: center;
            }

            .product-info {
            display: flex;
            gap: 10px;
            }

            .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            background-color: blue;
            }

            .product-details {
            }

            .product-title {
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

            .quantity-control input {
            width: 50px;
            text-align: center;
            padding: 5px;
            }

            .quantity-control button {
            padding: 4px 8px;
            cursor: pointer;
            }

            .remove-link {
            width: 100%;
            display: inline-block;
            font-weight: bold;
            text-align: center;
            font-size: 12px;
            text-decoration: underline;
            text-decoration-thickness: 2px; /* atur ketebalan underline */
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
            .cart-table thead {
            position: sticky;
            top: -11px;
            background-color: white;
            border-bottom: 2px solid #d9d9d8;
            box-sizing: border-box;
            z-index: 1;
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
.quantity-control {
    display: flex; /* Menggunakan flexbox untuk menata elemen secara horizontal */
    border-top: 2px solid #ccc; /* Border tipis di sekitar kontrol */
    border-bottom: 2px solid #ccc; /* Border tipis di sekitar kontrol */
    overflow: hidden; /* Memastikan tidak ada yang tumpah keluar dari border */
    width: fit-content; /* Sesuaikan lebar dengan konten */
    font-family: Arial, sans-serif; /* Font yang umum digunakan */
    font-size: 16px; /* Ukuran font standar */
}

.quantity-control button {
    background-color: #f0f0f0; /* Warna latar belakang tombol */
    border: none; /* Tidak ada border pada tombol */
    border-right: 2px solid #ccc; /* Border tipis di sekitar kontrol */
    border-left: 2px solid #ccc; /* Border tipis di sekitar kontrol */
    padding: 8px 12px; /* Padding untuk tombol */
    cursor: pointer; /* Kursor berubah menjadi pointer saat di-hover */
    font-weight: bold; /* Teks tombol lebih tebal */
    color: #333; /* Warna teks tombol */
    transition: background-color 0.2s ease; /* Transisi halus saat hover */
}

.quantity-control button:hover {
    background-color: #e0e0e0; /* Warna latar belakang tombol saat di-hover */
}

.quantity-control input[type="number"] {
    border: none; /* Tidak ada border pada input */
    text-align: center; /* Teks di tengah input */
    padding: 8px 0; /* Padding vertikal untuk input */
    width: 50px; /* Lebar input */
    -moz-appearance: textfield; /* Untuk Firefox, menyembunyikan panah default */
}

/* Menyembunyikan panah default untuk input type="number" di Chrome, Safari, Edge */
.quantity-control input[type="number"]::-webkit-outer-spin-button,
.quantity-control input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.accesoris{
    position: absolute;
}
.accesoris img{
    position: absolute;
    z-index: 999;
    width: 150px;
    top: 0;
    left: -90px;
}
.accesoris img:nth-child(2){
    top: calc(187px*1);
}
.accesoris img:nth-child(3){
    top: calc(187px*2);
}
.accesoris img:nth-child(4){
    top: calc(187px*3);
}
.accesoris img:nth-child(5){
    width: 450px;
    left: calc(100vw - 248px);
    top: calc(100vh - 230px);
}
    </style>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css'>
</head>
<body>
    <div class="container">
        <div class="cart-product">
          <!-- Row 1: Title -->
          <div class="cart-title">
            <p style="margin: 0; text-align: center;">Shopping Cart</p>
          </div>

          <!-- Row 2: Table -->
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
                        $produk = mysqli_query($conn, "SELECT t_cart.id_product, (jml*product_price) AS total, id_cart, category_name, product_name, product_price, product_image, jml FROM t_product, t_category, t_cart WHERE t_category.id_category = t_product.id_category AND t_cart.id_product = t_product.id_product AND id_admin = $admin_id");
                        if($produk->num_rows == 0 ){
                            ?>
                                <tr>
                                    <td colspan="8" style="padding: 5px;"><b>Tidak ada data</b></td>
                                </tr>
                            <?php
                        }else{
                        while ($row = mysqli_fetch_array($produk)) {
                        ?>
                <tr>
                  <td class="product-info">
                    <div class="product-image" style="background-image: url('../produk/<?php echo $row['product_image']?>');"></div>
                    <div class="product-details">
                      <div class="product-title"><?php echo $row['product_name'] ?></div>
                      <div class="product-description">This is a brief description.</div>
                    </div>
                  </td>
                  <td style="text-transform: capitalize;">Rp.<?php echo number_format($row['total']) ?></td>
                  <td>
                    <div class="quantity-control">
                      <button>-</button>
                      <input type="number" value="<?php echo $row['jml'] ?>" min="1">
                      <button>+</button>
                    </div>
                    <a href="hapus_proses.php?idc=<?php echo $row['id_cart'] ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="remove-link">remove</a>
                  </td>
                </tr>
                <?php
                }}
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
                <span>$123.45</span>
                </div>

                <button class="submit-btn">Proceed to Checkout</button>

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
        </div>
    <div class="accesoris">
        <img src="../gambar/rantai4.png" alt="">
        <img src="../gambar/rantai4.png" alt="">
        <img src="../gambar/rantai4.png" alt="">
        <img src="../gambar/rantai4.png" alt="">
        <img src="../gambar/rantai2.png" alt="">
    </div>
    </div>
    <script>
  // Pilih semua kontrol jumlah produk
  document.querySelectorAll('.quantity-control').forEach(control => {
    const minusBtn = control.querySelector('button:first-child');
    const plusBtn = control.querySelector('button:last-child');
    const input = control.querySelector('input');


    minusBtn.addEventListener('click', () => {
        console.log(input.value)
      let value = parseInt(input.value);
      if (value > parseInt(input.min)) {
        input.value = value - 1;
        console.log(input.value)
      }
    });

    plusBtn.addEventListener('click', () => {
      let value = parseInt(input.value);
      input.value = value + 1;
    });
  });
</script>


</body>
</html>