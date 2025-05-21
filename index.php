<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    html, body {
      scroll-snap-type: y mandatory;
      scroll-behavior: smooth;
    }
    ::-webkit-scrollbar {
    display: none;
    }
    body{
      margin: 0;
      font-family: 'Arial Black', sans-serif;
    }
    .container{
      position: relative;
      width: 100%;
      padding-right: 53.5px;
      box-sizing: border-box;
    }

    .container .logo{
      margin: 10px;
      position: absolute;
      z-index: 2;
    }
    
    .container .logo img{
      width: 200px;
    }

    .container .img{
      /* scroll-snap-align: start; */
      padding-right: 54.5px;
      overflow: hidden;
      position: relative;
      width: 100%;
      height: 100vh;
      background-image: url("gambar/bg.png");
      /* background-size: cover; */
      background-size: calc(100% + 1px);
      background-position: -1px;
      box-sizing: border-box;
    }

    .container .img .teks-I{
      font-family: Impact, 'Arial Black', sans-serif;
      font-size: 2.5rem;
      position: absolute;
      color: white;
      text-transform: uppercase;
      bottom: 100px;
      left: calc(35%);
    }

    .container .img .stroke-text {
      position: relative;
      left: 20px;
      top: calc(50% - 100px);
      width: 100%;
      height: 101.33px;
      overflow: hidden;
    }
    .container .img .stroke-text .teks{
      position: absolute;
      left: 100px;
      font-size: 4.5rem;
      color: transparent;
      -webkit-text-stroke: 3px white;
      text-transform: uppercase;
      letter-spacing: 0px;
      text-align: center;
      transform: scaleX(1.2);
    }

    .container .img .stroke-text .teks:nth-child(2){
      top: calc(10px);
      left: calc(100px + 10px);
    }
    .line{
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

    .section{
      scroll-snap-align: none;
      position: relative;
      overflow: hidden;
      box-sizing: border-box;
      position: relative;
      width: 100%;
      height: 100vh;
      background-color: white;
    }

    .section .box{
      position: absolute;
      width: 25rem;
      height: 70%;
      border: 3px solid black;
      padding: 20px 50px;
      box-sizing: border-box;
    }

    .section .box:nth-of-type(2){
      top: 40px;
      left: 40px;
    }

    .section .box:nth-of-type(3){
      bottom: 40px;
      right: 40px;
    }

    .section .box .image{
      width: 100%;
      height: 80%;
    }

    .section:nth-child(3) .box:nth-of-type(2) .image{
      background-image: url("gambar/winter.jpg");
      background-size: cover;
    }

    .section:nth-child(3) .box:nth-of-type(3) .image{
      background-image: url("gambar/spring.jpg");
      background-size: cover;
    }
    
    .section:nth-child(4) .box:nth-of-type(2) .image{
      background-image: url("gambar/summer.jpg");
      background-size: cover;
    }

    .section:nth-child(4) .box:nth-of-type(3) .image{
      background-image: url("gambar/fall.jpg");
      background-size: cover;
    }

    .section .box .teks-I{
      margin-top: 20px;
      font-size: 2.5rem;
      letter-spacing: -4px;
    }

    .chain1{
      position: absolute;
      top: -8rem;
      right: 0;
      width: 400px;
      z-index: 2;
    }

    .chain2{
      position: absolute;
      bottom: -10rem;
      right: -21rem;
      width: 600px;
      z-index: 2;
    }

    img{
      width: 100%;
    }
    </style>
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
  <div class="container">
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
    <div class="section">
      <div class="chain1">
        <img src="gambar/rantai1.png" alt="" >
      </div>
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
      <div class="box" data-aos="fade-up" data-aos-duration="1500">
        <div class="image"></div>
        <div class="teks-I">SUMMER 2025</div>
      </div>
      <div class="box" data-aos="fade-up" data-aos-duration="1500">
        <div class="image"></div>
        <div class="teks-I">FALL 2025</div>
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