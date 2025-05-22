<?php
    session_start();
    include '../db.php'
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
        }
        .container{
            overflow: hidden;
            width: 100%;
            height: 100vh;
            background-color: white;
        }
        .container > .header{
            width: 100%;
            height: 40%;
            background-color: green;
        }
        .container > .contain{
            width: 100%;
            height: 100%;
        }
        .container .bar{
            padding: 20px;
            padding-bottom: 0;
            position: relative;
            width: 100%;
            height: 5rem;
            box-sizing: border-box;
            /* background-color: red; */
        }
        .container > .header{
            background-image: url("../gambar/header.jpg");
            background-size: 80%;
            background-position: 50% -100px;
        }
        .container > .header .bar > .line{
            position: absolute;
            margin: auto;
            left: 0;
            right: 0;
            bottom: 0;
            width: 95%;
            height: 2px;
            background-color: white;
        }
        .container > .header .bar > img{
            position: absolute;
            width: 200px;
        }
        .icons{
            position: absolute;
            margin-right: 20px;
            padding-right: 20px;
            right: 0;
            bottom: 0;
            font-size: 30px;
        }
        .icons > div{
            cursor: pointer;
        }
        .contain {
            height: 100%;
        }
        .contain > .bar{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
        }
        .contain > .bar p{
            display: inline-block;
            margin: 0;
            text-transform: uppercase;
            font-family: Impact, 'Arial Black', sans-serif;
            font-size: 3rem;
        }
        .contain > .bar .line{
            position: absolute;
            margin: auto;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background-color: black;
        }
        .contain > .bar .view-all{
            background-color: black;
            color: white;
            display: inline-block;
            margin: 0;
            text-transform: uppercase;
            font-family: Impact, 'Arial Black', sans-serif;
            font-size: 1rem;
            padding: 10px 10px;
        }
        .contain > .product-display{
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
        .search {
            position: absolute;
            left: 18rem;
  display: flex;
  justify-content: center;
  margin: 20px;
}

.search-box {
  position: relative;
  width: 300px;
}

.search-icon {
  position: absolute;
  left: 10px;
  top: 50%;
  transform: translateY(-50%);
  color: #888;
  font-size: 18px;
}

.search-box input[type="text"] {
    background-color: #f0f1f5;
  width: 100%;
  padding: 10px 10px 10px 35px; /* ruang untuk ikon */
  border: 2px solid #ccc;
  border-radius: 25px;
  font-size: 14px;
  transition: border-color 0.3s;
}

.search-box input[type="text"]:focus {
  outline: none;
  border-color: #007bff;
}

    </style>
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css'>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="bar">
                <img src="../gambar/logo.png" alt="">
                <div class="icons">
                    <div class="fa-solid fa-heart"></div>
                    <div class="fa-solid fa-cart-shopping icon" onclick="window.location = 'cart.php'"></div>
                    <div class="fa-solid fa-user icon"></div>
                </div>
                <div class="line"></div>
            </div>
        </div>
        <div class="contain">
            <div class="bar">
                <p>new arrivals</p>
                <div class="search">
                    <form action="produk_user.php">
                        <div class="search-box">
                            <div class="fa fa-search search-icon"></div>
                            <input type="text" name="search" placeholder="Cari Produk..." value="<?php /* echo $_GET['search'] */ ?>">
                            <input type="hidden" name="kat" value="<?php /* echo $_GET['kat'] */ ?>">
                        </div>
                    </form>
                </div>
                <div class="view-all">view all</div>
                <div class="line"></div>
            </div>
            <div class="product-display">
                <?php
                    $batas = 0;
                    $where = "";
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
    
</body>
</html>