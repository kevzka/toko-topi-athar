<?php
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleadmin.css">
    <title>Figure id | dashboard</title>
</head>

<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar closed">
            <div class="sidebar-title">
                <img src="../gambar/logo-putih.png" alt="">
            </div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <h1>selamat datang admin sistem: <?php echo $user_row["admin_name"] ?></h1>
        </div>
    </div>
    </div>

</body>

</html>