<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/index.css">
    <style>
      @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
      }

      .teks-start {
        animation: blink 1.5s infinite;
      }
    </style>
    <!-- AOS CSS & JS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>

    footer {
      background-color: #222;
      color: #fff;
      padding: 40px 20px;
      text-align: center;
    }

    .footer-logo {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .footer-links {
      margin: 20px 0;
    }

    .footer-links a {
      color: #bbb;
      margin: 0 10px;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-links a:hover {
      color: #fff;
    }

    .footer-socials {
      margin: 20px 0;
    }

    .footer-socials a {
      display: inline-block;
      color: #bbb;
      font-size: 1.2rem;
      margin: 0 10px;
      transition: color 0.3s, transform 0.3s;
    }

    .footer-socials a:hover {
      color: #1da1f2;
      transform: scale(1.2);
    }

    .footer-bottom {
      font-size: 0.9rem;
      color: #666;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="line">
      E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design 
  </div>
  <div class="container"  onclick="window.location = 'user/main_page.php'">
    <div class="logo">
      <img src="gambar/logo.png" alt="">
    </div>
    <div class="img">
      <div class="stroke-text">
        <div class="teks">The Future Are Ours</div>
        <div class="teks">The Future Are Ours</div>
      </div>
      <div class="teks-I teks-start">
        click anywhere to start
      </div>
    </div>
    <div class="section-section">

      <div class="section">
        <div class="chain1">
          <img src="gambar/rantai1.png" alt="" >
        </div>
        <img src="gambar/star1.png" alt="">
        <img src="gambar/star2.png" alt="">
        <div class="box" data-aos="fade-up" data-aos-duration="1500">
          <div class="image"></div>
          <div class="teks-I">WINTER 2025</div>
        </div>
        <div class="box" data-aos="fade-up" data-aos-duration="1500">
          <div class="image"></div>
          <div class="teks-I">SPRING 2025</div>
        </div>
      </div>
      <div class="section">
        <div class="chain2">
          <img src="gambar/rantai2.png" alt="" >
        </div>
        <img src="gambar/pita1.png" alt="">
        <img src="gambar/cross2.png" alt="" >
        <div class="box" data-aos="fade-up" data-aos-duration="1500">
          <div class="image"></div>
          <div class="teks-I">SUMMER 2025</div>
        </div>
        <div class="box" data-aos="fade-up" data-aos-duration="1500">
          <div class="image"></div>
          <div class="teks-I">FALL 2025</div>
        </div>
      </div>
      <div class="acces" data-aos="fade-up" data-aos-duration="1500">
          <img src="gambar/rantai4.png" alt=""> 
          <img src="gambar/rantai4.png" alt="">
          <img src="gambar/rantai4.png" alt="">
      </div>
    </div>
  </div>
  <div class="footer">
      <footer>
    <div class="footer-logo">cappin's</div>

    <div class="footer-links">
      <a href="#">Beranda</a>
      <a href="#">Tentang</a>
      <a href="#">Layanan</a>
      <a href="#">Kontak</a>
    </div>

    <div class="footer-socials">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>

    <div class="footer-bottom">
      &copy; 2025 cappin's. All rights reserved.
    </div>
  </footer>
  </div>
  <script>
        AOS.init({
            once: true // 👈 hanya fade sekali
        });
    </script>
</body>
</html>