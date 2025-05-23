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
</head>
<body>
  <div class="line">
      E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design E-commers website design 
  </div>
  <div class="container"  onclick="window.location = 'user/dashboard_user.php'">
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
  <div class="footer"></div>
  <script>
        AOS.init({
            once: true // 👈 hanya fade sekali
        });
    </script>
</body>
</html>