<?php
    include 'session.php';
    if(isset($_GET["idk"])){
        $delete = mysqli_query($conn, "DELETE FROM t_category WHERE category_id = '". $_GET["idk"]."'");
        header("location:kategori_data.php");
    }
    if(isset($_GET['idp'])){
        $produk = mysqli_query($conn, "SELECT * FROM t_product WHERE product_id = '".$_GET['idp']."'");
        $p = mysqli_fetch_object($produk);
        unlink('../produk/'. $p->product_image);
        $delete = mysqli_query($conn, "DELETE FROM t_product WHERE product_id = '".$_GET['idp']."'");
        echo '<script>window.location="produk_data.php"</script>';
    }
?>