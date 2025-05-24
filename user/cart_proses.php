<?php
    include "../db.php";
    if(isset($_POST['submit'])){
        $jml = $_POST['quantity'];
        $product_id = $_POST['product_id'];
        $admin_id = $_POST['admin_id'];
        $stok = $_POST['stok'];

        if($stok < $jml){
            echo "
            <script>
                alert('Stock tidak mencukupi');
                window.location = 'main_page.php'
            </script>
            ";
        }elseif($stok == '0'){
            echo "
            <script>
                alert('Stok kosong');
                window.location = 'main_page.php'
            </script>
            ";
        }else{
            $insert = mysqli_query($conn, "INSERT INTO t_cart VALUES (null, '".$product_id."', '".$jml."', '".$admin_id."')");
            if($insert){
                echo "
                <script>
                alert('Tambah keranjang berhasil');
                window.location = 'main_page.php'
                </script>
                ";
            }else{
                echo 'gagal' . mysqli_errno($conn);
            }
        }
    }
?>
