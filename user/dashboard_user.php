<?php
include 'session.php';
    include '../db.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/dashboard_user.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css'>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="slider-container">
            <div class="slider-track" id="sliderTrack">
                <div class="slide" style="background-color: red;"><img src="../gambar/sliderppl1.png" alt=""></div>
                <div class="slide" style="background-color: blue;"><img src="../gambar/sliderppl2.png" alt="" style="scale: 1.2;"></div>
                <div class="slide" style="background-color: green;"><img src="../gambar/sliderppl4.png" alt="" style="scale: 2; left: 0; top: -50px; position: absolute; right: 0;"></div>
                <div class="slide" style="background-color: green;"></div>
            </div>
            <div class="dots" id="dots"></div>
        </div>
            <div class="bar">
                <img src="../gambar/logo.png" alt="">
                <div class="icons">
                    <div class="fa-solid fa-clipboard-list" onclick="window.location = 'checkout_data.php'"></div>
                    <div class="fa-solid fa-cart-shopping icon" onclick="window.location = 'cart.php'"></div>
                    <div class="fa-solid fa-user icon" onclick="window.location = 'profile_user.php'"></div>
                    <div class="fa fa-right-from-bracket fa-lg pad" onclick="window.location = '../logout.php'"></div>
                </div>
                <div class="line"></div>
            </div>
        </div>
        <div class="contain">
            <div class="bar">
                <p>new arrivals</p>
                <div class="search">
                    <form action="dashboard_user.php">
                        <div class="search-box">
                            <div class="fa fa-search search-icon"></div>
                            <input type="text" name="search" placeholder="Cari Produk..." value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : ''?>">
                            <input type="hidden" name="kat" value="<?php echo (isset($_GET['kat'])) ? $_GET['kat'] : '' ?>">
                        </div>
                    </form>
                </div>
                <div class="view-all" onclick="window.location='product_user.php'" style="cursor: pointer;" >view all</div>
                <div class="line"></div>
            </div>
            <div class="product-display">
                <?php
                    $batas = 0;
                    if (isset($_GET['search']) && isset($_GET['kat'])) {
                        // $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%'";
                        $where = "AND p.product_name LIKE '%" . $_GET['search'] . "%' OR c.category_name LIKE '%" . $_GET['search'] . "%'";
                    }else{
                        $where = '';
                    }
                     $produk = mysqli_query($conn, "SELECT * FROM t_product p JOIN t_category c ON p.id_category = c.id_category WHERE p.product_status = 1 $where");
                        if (mysqli_num_rows($produk) > 0) {
                            while ($p = mysqli_fetch_array($produk)) {
                                if($batas < 5){
                        ?>
                            <a href="detail_produk.php?p_id=<?php echo $p['id_product']?>" >
                                <div class="item">
                                    <p><?php echo $p['product_name'] ?></p>
                                    <div class="image"><img src='../produk/<?php echo $p['product_image']?>' alt=""></div>
                                    <p style="text-transform: capitalize; margin-top: 20px; font-size: 1.2rem;">Rp.<?php echo number_format($p['product_price']) ?></p>
                                </div>
                            </a>
                            <?php
                                }
                                $batas++;
                            }
                        }
                        ?>
                <div class="accesoris">
                    <img src="../gambar/rantai4.png" alt="">
                    <img src="../gambar/rantai4.png" alt="">
                    <img src="../gambar/rantai4.png" alt="">
                    <img src="../gambar/rantai4.png" alt="">
                </div>
            </div>
        </div>
    </div>
                <script src="../js/script.js"></script>
                <script>
        sliderBanner();
        </script>
    
</body>
</html>