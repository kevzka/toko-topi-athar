<?php
    include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            width: 100%;
            overflow-x: hidden;
        }
        .container > .product-display{
            position: relative;
            z-index: 2;
            box-sizing: border-box;
            padding: 0 50px;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-auto-rows: 315px;
            width: 100%;
            height: 100%;
        }
        .product-display > a{
            all: unset;
            cursor: pointer;
            z-index: 3;
        }
        .item{
            background-color: white;
            height: 100%;
            padding: 20px;
            /* border: 1px solid red; */
            box-sizing: border-box;
        }
        .item > p{
            margin: 0;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-family: 'Arial Black', sans-serif;
            text-align: center;
        }
        .item > .image{
            display: flex;
            align-items: center;
            width: 100%;
            height: 70%;
            overflow: hidden;
            background-color: transparent;
        }
        .item > .image > img{
            max-width: 180px;
        }
        .accesoris{
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
            top: 0;
            right: -37px;
        }
        .accesoris img:nth-child(4){
            top: calc(187px);
            right: -37px;
        }
        .item > .image{
    transition: all 0.2s ease-in;
}
.item > .image:hover{
    transform: translateY(-10px);
}
    </style>
     <!-- AOS CSS & JS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body>
    <?php include 'sidebar.php' ?>

    <div class="container">
        <div class="product-display">
                <?php
                    $where = "";
                     $produk = mysqli_query($conn, "SELECT * FROM t_product p JOIN t_category c ON p.id_category = c.id_category WHERE p.product_status = 1 $where");
                        if (mysqli_num_rows($produk) > 0) {
                            while ($p = mysqli_fetch_array($produk)) {
                        ?>
                            <a href="detail_produk.php?p_id=<?php echo $p['id_product']?>" >
                                <div class="item" data-aos="fade-up" data-aos-duration="1500">
                                    <p><?php echo $p['product_name'] ?></p>
                                    <div class="image"><img src='../produk/<?php echo $p['product_image']?>' alt=""></div>
                                    <p style="text-transform: capitalize; margin-top: 20px; font-size: 1.2rem;">Rp.<?php echo number_format($p['product_price']) ?></p>
                                </div>
                            </a>
                            <?php
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
    <script>
        AOS.init({
            once: true // 👈 hanya fade sekali
        });
    </script>
</body>
</html>