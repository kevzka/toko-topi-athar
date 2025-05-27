<?php
    include 'session.php'; // Pastikan file session.php ada dan menginisialisasi koneksi database ($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Topi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        /* Untuk WebKit-based browsers (Chrome, Safari, Edge baru) */
        body::-webkit-scrollbar {
            display: none; /* Menyembunyikan scrollbar sepenuhnya */
            width: 0;      /* Atau set lebarnya menjadi 0 */
        }
        /* Untuk Firefox */
        body {
            scrollbar-width: none;
        }
        /* Untuk Internet Explorer dan Edge (versi lama) */
        body {
            -ms-overflow-style: none;
        }

        /* --- Styling Dasar & Overflow Control --- */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
            overflow-y: hidden; /* Awalnya, body tidak bisa di-scroll */
            transition: overflow-y 0.5s ease-out; /* Transisi untuk scroll-y */
        }

        .app-layout-container { /* Unik: Mengganti .section-container */
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .app-content-section { /* Unik: Mengganti .content-section */
            width: 100%;
            transition: transform 0.5s ease-out; /* Transisi untuk efek geser */
        }

        #app-dashboard-section { /* Unik: Mengganti #dashboard-section */
            order: 1;
            min-height: 100vh; /* Pastikan dashboard mengisi penuh viewport saat awal */
        }

        #app-product-section { /* Unik: Mengganti #product-section */
            order: 2;
            transform: translateY(0); /* Posisi awal, tidak digeser */
        }

        /* --- Styling Tombol Navigasi FIXED --- */
        .app-fixed-nav-buttons { /* Unik: Mengganti .fixed-nav-buttons */
            position: fixed;
            top: 20px; /* Jarak dari atas */
            right: 20px; /* Jarak dari kanan */
            z-index: 1001; /* Pastikan di atas elemen lain */
            display: flex;
            gap: 10px; /* Jarak antar tombol */
        }

        .app-nav-button { /* Unik: Mengganti .nav-button */
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .app-nav-button:hover {
            background-color: #0056b3;
        }

        /* --- Styling spesifik untuk konten yang di-include (dari product_user_m.php) --- */
        /* Pastikan CSS ini juga unik atau berasal dari file CSS terpisah */
        .product-page-container { /* Ubah ini menjadi unik juga, jika di product_user.php Anda menggunakan .container */
            width: 100%;
        }
        /* Untuk WebKit-based browsers (Chrome, Safari, Edge baru) */
        ::-webkit-scrollbar {
            display: none; /* Menyembunyikan scrollbar sepenuhnya */
            width: 0;      /* Atau set lebarnya menjadi 0 */
        }
        body{
            margin: 0;
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
</head>
<body>

    <div class="app-layout-container">
        <div id="app-dashboard-section" class="app-content-section">
            <?php include 'dashboard_user_m.php'; ?>
        </div>

        <div id="app-product-section" class="app-content-section">
            <div class="product-page-container">
                <div class="container">
                    <?php include 'sidebar.php' ?>
        <div class="product-display">
                <div class="accesoris" style="height: 200vh;">
                    <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(0px); right: -37px;">
                    <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(0px); left: -37px;">
                    <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(187px); right: -37px;">
                    <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(187px); left: -37px;">
                    <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(374px); right: -37px;">
                    <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(374px); left: -37px;">
                    <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(561px); right: -37px;">
                    <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(561px); left: -37px;">
                <img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(748px); right: -37px;"><img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(748px); left: -37px;"><img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(935px); right: -37px;"><img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(935px); left: -37px;"><img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(1122px); right: -37px;"><img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(1122px); left: -37px;"><img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(1309px); right: -37px;"><img src="../gambar/rantai4.png" alt="" style="position: absolute; top: calc(1309px); left: -37px;"></div>
            </div>
    </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            AOS.init({
                once: true
            });
            AOS.refresh();

            // Sembunyikan bagian produk dan tombol "Kembali ke Dashboard" di awal
            // $('#app-product-section').hide();
            $('#back-to-dashboard-btn').hide();

            $('#show-products-btn').on('click', function() {
                // Nonaktifkan scroll pada body saat transisi dashboard
                $('body').css('overflow-y', 'hidden');

                // Sembunyikan tombol "Lihat Produk"
                $('#show-products-btn').hide();

                // Geser dashboard ke atas
                $('#app-dashboard-section').css({
                    'position': 'absolute',
                    'top': '0',
                    'width': '100%',
                    'z-index': '1'
                }).animate({
                    'top': '-100vh' // Geser ke atas (keluar dari viewport)
                }, 500, function() {
                    $(this).hide(); // Sembunyikan dashboard setelah animasi selesai

                    // Aktifkan scroll untuk produk segera setelah dashboard tersembunyi
                    $('body').css('overflow-y', 'auto');
                    // Tampilkan tombol "Kembali ke Dashboard"
                    $('#back-to-dashboard-btn').show();
                    // Gulir ke atas halaman setelah scroll diaktifkan
                    $('html, body').scrollTop(0);

                    // Tampilkan bagian produk di main_page.php
                    $('#app-product-section').show().css({
                        'position': 'relative',
                        'transform': 'translateY(0)'
                    });

                    // Refresh AOS setelah konten produk ditampilkan di main_page.php
                    AOS.refresh();

                    // --- BAGIAN INI DITAMBAHKAN/DIMODIFIKASI UNTUK REDIRECT SETELAH PRODUK TERLIHAT ---
                    // Setelah produk terlihat, berikan jeda 2 detik (2000ms) sebelum redirect penuh
                    setTimeout(function() {
                        window.location.href = 'product_user.php';
                    }, 10); // <-- Durasi delay sebelum redirect
                    // --------------------------------------------------------------------------------
                });
            });

            $('#back-to-dashboard-btn').on('click', function() {
                // Saat tombol "Kembali ke Dashboard" diklik, langsung redirect ke main_page.php
                // agar halaman dimuat ulang dan kembali ke kondisi dashboard awal
                window.location.href = 'main_page.php';

                // Logika berikut ini menjadi tidak perlu lagi karena redirect di atas
                /*
                $('body').css('overflow-y', 'hidden');
                $('#back-to-dashboard-btn').hide();
                $('#app-product-section').hide();
                $('#app-dashboard-section').show().css({
                    'position': 'relative',
                    'top': '0',
                    'z-index': 'auto'
                });
                setTimeout(function() {
                    AOS.refresh();
                    $('body').css('overflow-y', 'hidden');
                    $('#show-products-btn').show();
                    $('html, body').scrollTop(0);
                }, 100);
                */
            });
        });
    </script>
</body>
</html>