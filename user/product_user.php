<?php
    include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/product_user.css">
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
                    <img src="../gambar/rantai4.png" alt="">
                    <img src="../gambar/rantai4.png" alt="">
                    <img src="../gambar/rantai4.png" alt="">
                    <img src="../gambar/rantai4.png" alt="">
                </div>
            </div>
    </div>
    <script>
    AOS.init({ once: true });

    const productItems = document.querySelectorAll('.product-display .item').length;
    const productDisplay = document.querySelector('.product-display');
    const kelipatan = Math.ceil(productItems / 10);
    const height = kelipatan * 100;
    productDisplay.style.minHeight = height + 'vh';

    const accesories = document.querySelector('.accesoris');
    accesories.style.height = height + 'vh';

    // 1. Tambahkan 2 gambar terlebih dahulu
    for (let i = 0; i < 8; i++) {
        const img = document.createElement('img');
        img.src = '../gambar/rantai4.png';
        img.alt = '';
        accesories.appendChild(img);
    }

    // 2. Setelah gambar ditambahkan, ambil semua gambar dalam .accesoris
    const accessoriesImages = document.querySelectorAll('.accesoris img');

    // 3. Atur posisi top dan kanan/kiri berdasarkan urutan
    accessoriesImages.forEach((img, index) => {
        const childNumber = index + 1;

        img.style.position = 'absolute';

        // Posisi top dihitung dari urutan
        if (childNumber % 2 !== 0) {
            // ganjil → kanan
            img.style.top = `calc(187px * ${(childNumber - 1) / 2})`;
            img.style.right = '-37px';
        } else {
            // genap → kiri
            img.style.top = `calc(187px * ${(childNumber - 2) / 2})`;
            img.style.left = '-37px';
        }
    });
</script>

</body>
</html>