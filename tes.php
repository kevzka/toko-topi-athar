<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Methods</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <style>
    body {
      background: #121212;
      font-family: sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .payment-icons {
      display: flex;
      gap: 24px;
    }

    .icon-box {
      width: 60px;
      height: 60px;
      background: #1e1e1e;
      border: 1px solid #333;
      border-radius: 12px;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: all 0.3s ease;
    }

    .icon-box i {
      font-size: 28px;
      color: #fff;
    }

    .icon-box:hover {
      background: #333;
      transform: scale(1.1);
      border-color: #555;
    }
  </style>
</head>
<body>
  <div class="payment-icons">
    <div class="icon-box"><i class="fab fa-cc-visa"></i></div>
    <div class="icon-box"><i class="fab fa-cc-mastercard"></i></div>
    <div class="icon-box"><i class="fab fa-cc-paypal"></i></div>
    <div class="icon-box"><i class="fas fa-university"></i></div>
    <div class="icon-box"><i class="fas fa-qrcode"></i></div>
  </div>
</body>
</html>
