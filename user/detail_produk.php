<?php
  include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Produk</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      margin: 0;
    }
    
body::-webkit-scrollbar {
  display: none;                /* Chrome, Safari */
}

    .container {
        overflow: hidden;
      display: flex;
      gap: 20px;
      width: 100%;
      height: 100vh;
      margin: auto;
    }

    /* Left Side */
    .left-card {
        position: relative;
      flex: 1;
      display: flex;
      /* justify-content: center; */
      align-items: center;
    }

    .outer-border {
        background-color: white ;
        position: absolute;
        right: 0;
        margin-bottom: 30px;
        width: 75%;
        height: 75%;
      padding: 10px;
      border: 3px solid black;
    }

    .inner-border {
        margin: auto;
        margin-top: 20px;
        width: 80%;
        height: 75%;
      padding: 10px;
      border: 2px solid black;
      background: white;
    }

    .product-image {
        position: absolute;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        width: 80%;
        height: 80%;
      display: block;
    }
    .product-image .img > img{
        position: relative;
        width: 100%;
    }
    .product-image .img > img{
        position: absolute;
        width: 90%;
    }
    .product-image .img > img:nth-child(1){
        top: 0;
        left: -20px;
        position: absolute;
        width: 100%;
    }
    .product-image .img > img:nth-child(2){
        top: calc(10px);
        left: calc(-20px + 30px);
        position: absolute;
        width: 100%;
    }
    .product-image .img > img:nth-child(3){
        top: calc(10px * 2);
        left: calc(-20px + 30px * 2);
        position: absolute;
        width: 100%;
    }

    /* Right Side */
    .right-card {
        padding-right: 54.5px;
        display: flex;
        justify-content: center;
        align-items: center;
      width: 55%;
    }
    .card{
        margin: auto;
        width: 50%;
        height: 60%;
      background: white;
      padding: 20px;
      border: 2px solid black;
    }

    .product-title {
        text-align: center;
      font-size: 1rem;
      font-weight: bold;
    }

    .divider {
      width: 40%;
      height: 2px;
      background-color: black;
      margin: 10px auto;
    }

    .price {
        text-align: center;
        font-family: 'Arial';
        font-weight: bold;
      font-size: 20px;
      color: black;
    }   
    .rating{
        margin: auto;
        width: fit-content;
        margin-bottom: 50px;
    }

    .radio-group {
        width: fit-content;
      display: flex;
      gap: 10px;
      margin: auto;
      margin-bottom: 20px;
    }

    .radio-group label {
      width: 70px;
      border: 2px solid #ccc;
      padding: 10px;
      text-align: center;
      cursor: pointer;
      border-radius: 5px;
    }

    .radio-group input[type="radio"] {
      display: none;
    }

    .radio-group input[type="radio"]:checked + label {
      background-color: black;
      color: white;
      border-color: black;
    }

    .quantity-control {
        /* width: fit-content;
      display: flex;
      align-items: center; */
      margin: auto;
      margin-bottom: 20px;
      
    display: flex; /* Menggunakan flexbox untuk menata elemen secara horizontal */
    border-top: 2px solid #ccc; /* Border tipis di sekitar kontrol */
    border-bottom: 2px solid #ccc; /* Border tipis di sekitar kontrol */
    overflow: hidden; /* Memastikan tidak ada yang tumpah keluar dari border */
    width: fit-content; /* Sesuaikan lebar dengan konten */
    font-family: Arial, sans-serif; /* Font yang umum digunakan */
    font-size: 16px; /* Ukuran font standar */
    }

    .quantity-control button {
      /* width: 40px;
      height: 40px;
      font-size: 18px;
      cursor: pointer;
      background-color: #e0e0e0;
      border: none; */
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

    .quantity-control input {
      width: 60px;
      text-align: center;
      font-size: 16px;
      height: 40px;
      border: none;
    }
    input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

    .add-to-cart {
      font-weight: bold;
      text-transform: lowercase;
      background-color: black;
      color: white;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
    }

    .add-to-cart:hover {
      background-color: #1976d2;
    }
    .line{
      font-family:  'Arial Black', sans-serif;
    
      line-height: 54.5px;
      position: absolute;
      top: -70px;
      right: 0;
      text-transform: uppercase;
      color: white;
      width: max-content;
      height: 54.5px;
      background-color: black;
      z-index: 9999;
      transform-origin: 100% 100%; /* kanan bawah */
      transform: rotate(-90deg);
    }
    .accesoris{
        overflow: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 1;
        }
        .accesoris img{
            position: absolute;
            width: 150px;
        }
        .accesoris img:nth-child(1){
            top: 0;
            left: -37px;
        }
        .accesoris img:nth-child(2){
            top: calc(187px);
            left: -37px;
        }
        .accesoris img:nth-child(3){
            top: calc(187px * 2);
            left: -37px;
        }
        .accesoris img:nth-child(4){
            top: calc(187px * 3);
            left: -37px;
        }
        .accesoris img:nth-child(5){
            top: 50px;
            right: 20rem;
            scale: 5;
            transform: scaleY(-1);
        }
        .accesoris img:nth-child(6){
            top: 50px;
            left: 4rem;
            scale: 5;
            transform: scaleY(-1) scaleX(-1);
        }
        .accesoris img:nth-child(7){
            bottom: 0;
            right: 2rem;
            scale: 3;
            transform: scaleX(-1);
        }
        .accesoris img:nth-child(8){
            top: 10rem;
            left: 35.7rem;
            scale: 1.2;
        }
        .accesoris img:nth-child(9){
            bottom: 11rem;
            left: 35.7rem;
            scale: 1.2;
            transform: scaleY(-1);
        }
        .accesoris img:nth-child(10){
            bottom: 8rem;
            left: 18rem;
            scale: 1.7;
            transform: scaleX(-1);
        }
    
  </style>
  <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

</head>
<body>
<div class="container-line">
    <div class="line">
          ebsite design E-commers website design E-commers website design 
    </div>
</div>
<div class="container">
  <?php
  include '../db.php';
    $produk = mysqli_query($conn, "SELECT * FROM t_product WHERE id_product = ".$_GET['p_id']."");
        while($p = mysqli_fetch_assoc($produk)){
  ?>
  <!-- Left Side -->
  <div class="left-card">
    <div class="outer-border">
      <div class="inner-border">
    </div>
    <div class="product-image">
        <div class="img">
            <img src="../produk/<?php echo $p['product_image']?>" alt="Produk">
            <img src="../produk/<?php echo $p['product_image']?>" alt="Produk">
            <img src="../produk/<?php echo $p['product_image']?>" alt="Produk">
            </div>
        </div>
    </div>
  </div>

  <!-- Right Side -->
  <div class="right-card" style="z-index: 999;">
    <div class="card">
      <form action="cart_proses.php" method="post">
          <input type="hidden" name="product_id" value="<?php echo $p['id_product'] ?>">
          <input type="hidden" name="stok" value="<?php echo $p['product_stock'] ?>">
          <input type="hidden" name="admin_id" class="form_control" value="<?php echo $_SESSION['id_login'] ?>">
          <div class="product-title"><?php echo $p['product_name'] ?></div>
          <div class="divider"></div>
          <div class="price">Rp.<?php echo number_format($p['product_price']) ?></div>
          <!-- Rating -->
          <div class="rating">
          <i class="fas fa-star" style="color: gold;"></i>
          <i class="fas fa-star" style="color: gold;"></i>
          <i class="fas fa-star" style="color: gold;"></i>
          <i class="fas fa-star" style="color: gold;"></i>
          <i class="fas fa-star" style="color: gold;"></i>
          </div>

      
          <!-- Radio Group -->
          <div class="radio-group">
            <input type="radio" id="kids" name="size" value="kids" checked>
            <label for="kids">Kids</label>
      
            <input type="radio" id="adult" name="size" value="adult">
            <label for="adult">Adult</label>
          </div>
      
          <!-- Quantity Control -->
          <div class="quantity-control">
            <button type="button" onclick="changeQuantity(-1)">-</button>
            <input type="number" name="quantity" id="quantity" value="1" min="1">
            <button type="button" onclick="changeQuantity(1)">+</button>
          </div>
      
          <!-- Add to Cart Button -->
          <button class="add-to-cart" type="submit" name="submit">Add to Shopping Cart</button>
      </form>
      </div>
    </div>
     <?php } ?>
    <div class="accesoris">
        <img src="../gambar/rantai4.png" alt="">
        <img src="../gambar/rantai4.png" alt="">
        <img src="../gambar/rantai4.png" alt="">
        <img src="../gambar/rantai4.png" alt="">
        <img src="../gambar/rantai3.png" alt="">
        <img src="../gambar/rantai3.png" alt="">
        <img src="../gambar/rantai1.webp" alt="">
        <img src="../gambar/rantai5.png" alt="">
        <img src="../gambar/rantai5.png" alt="">
        <img src="../gambar/acces1.png" alt="">
    </div>
</div>

<script>
  function changeQuantity(change) {
    const input = document.getElementById("quantity");
    let current = parseInt(input.value);
    if (isNaN(current)) current = 1;
    current += change;
    if (current < 1) current = 1;
    input.value = current;
  }
</script>

</body>
</html>
