<?php
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figure id | dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/style/all.min.css">
    <style>
        :root {
            --color1: #2D336B;
            --color2: #7886C7;
            --color3: #A9B5DF;
            --color4: #FFF2F2;
            --color5: rgb(230, 235, 255);
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: black;
            text-transform: capitalize;
        }

        .wrapper {
            width: 100vw;
            height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 15rem;
            height: 100%;
            background: var(--color5);
            position: fixed;
            left: 0;
            top: 0;
            transition: all 0.5s ease;
            overflow: hidden;
        }

        .sidebar.closed {
            width: calc(4rem + 4.8px * 2);
        }

        .sidebar-title {
            position: relative;
            height: 50px;
            background: var(--color1);
            color: white;
            text-align: center;
            line-height: 50px;
        }

        .btn-sidebar {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .btn-sidebar img {
            width: 100%;
            filter: invert(100%) hue-rotate(180deg);
        }

        .sidebar ul {
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            list-style: none;
        }

        .sidebar ul li a {
            width: 100%;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.2rem 1rem;
            color: var(--color1);
        }

        .sidebar-place {
            min-width: max-content;
            min-height: 3.8rem;
            margin: 0.3rem;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
            border-radius: 1rem;
        }

        .sidebar-place:hover {
            background-color: var(--color1);
        }

        .sidebar-place:hover p,
        .sidebar-place:hover .fa-lg {
            color: var(--color4);
        }

        .pad {
            min-width: 2rem;
            text-align: center;
        }

        .sidebar.open .sidebar-place p {
            font-family: sans-serif ;
            font-weight: 700;
            display: inline;
            margin-left: 0.5rem;
        }

        .sidebar.closed .sidebar-place p {
            display: none;
        }

        .sidebar.closed .sidebar-title b {
            display: none;
        }

        .section {
            flex: 1;
            margin-left: 15rem;
            background-color: white;
            padding: 1rem;
            transition: margin-left 0.5s ease;
        }

        .sidebar.closed ~ .section {
            margin-left: 4rem;
        }

        h1 {
            color: var(--color1);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar closed">
            <div class="sidebar-title">
                <b>connecta</b>
                <div class="btn-sidebar">
                    <img src="../style/dots.png" alt="Toggle Sidebar">
                </div>
            </div>
            <ul>
                <li>
                    <div class="sidebar-place">
                        <a href="dashboard.php">
                            <div class="fa-solid fa-house fa-lg pad"></div>
                            <p>Halaman Utama</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-place">
                        <a href="profil.php">
                            <div class="fa-solid fa-user fa-lg pad"></div>
                            <p>Profil</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-place">
                        <a href="kategori_data.php">
                            <div class="fa-solid fa-box-archive fa-lg pad"></div>
                            <p>Kategori</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-place">
                        <a href="produk_data.php">
                            <div class="fa-solid fa-box-archive fa-lg pad"></div>
                            <p>Produk</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-place">
                        <a href="chart.php">
                            <div class="fa-solid fa-cart-shopping fa-lg pad"></div>
                            <p>Keranjang</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-place">
                        <a href="checkout.php">
                            <div class="fa-solid fa-money-bill-transfer fa-lg pad"></div>
                            <p>Check out</p>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-place">
                        <a href="#"><p>selesai</p></a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-place">
                        <a href="#"><p>Batal</p></a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-place">
                        <a href="../logout.php" onclick="return confirm('Yakin ingin Log Out?')">
                            <div class="fa fa-sign-out fa-lg pad"></div>
                            <p>Logout</p>
                        </a>
                    </div>
                </li>
                <script>
        const sidebar = document.querySelector(".sidebar");
        const toggleBtn = document.querySelector(".btn-sidebar");

        // Cek localStorage status saat load
        if (localStorage.getItem("sidebar") === "open") {
            sidebar.classList.replace("closed", "open");
        }

        toggleBtn.addEventListener("click", () => {
            if (sidebar.classList.contains("open")) {
                sidebar.classList.replace("open", "closed");
                localStorage.setItem("sidebar", "closed");
            } else {
                sidebar.classList.replace("closed", "open");
                localStorage.setItem("sidebar", "open");
            }
        });
    </script>
            </ul>
        </div>

        <div class="section">
            <h1>Selamat datang admin sistem: <?php echo $user_row["admin_name"]; ?></h1>
        </div>
    </div>
</body>

</html>
