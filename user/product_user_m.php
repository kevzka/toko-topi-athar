<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Untuk WebKit-based browsers (Chrome, Safari, Edge baru) */
        ::-webkit-scrollbar {
            display: none; /* Menyembunyikan scrollbar sepenuhnya */
            width: 0;      /* Atau set lebarnya menjadi 0 */
        }
        .container{
            width: 100%;
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
            overflow-x: hidden;
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
    <script>
        AOS.init({
            once: true // 👈 hanya fade sekali
        });
    </script>
</body>
</html>