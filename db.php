<?php
// untuk mengkoneksikan database sql
    $conn = mysqli_connect("localhost", "root", "", "topi");

    // mengecek jika koneksi eror
    if(mysqli_connect_errno()){
        echo "Koneksi database gagal: " . mysqli_connect_error();
    }
?>