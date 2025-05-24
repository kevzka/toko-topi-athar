<?php
  include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Produk</title>
  <link rel="stylesheet" href="../style/detail_produk.css">
  <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

</head>
<body>
  <?php
    include 'sidebar.php';
  ?>
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
