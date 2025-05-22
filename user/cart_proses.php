<?php
    include "../db.php";
    var_dump($_POST);
    if(isset($_POST['submit'])){
        $jml = $_POST['quantity'];
        $product_id = $_POST['product_id'];
        $admin_id = $_POST['admin_id'];
        $stok = $_POST['stok'];

        if($stok < $jml){
            echo "
            <script>
                alert('Stock tidak mencukupi');
                window.location = 'dashboard_user.php'
            </script>
            ";
        }elseif($stok == '0'){
            echo "
            <script>
                alert('Stok kosong');
                window.location = 'dashboard_user.php'
            </script>
            ";
        }else{
            $insert = mysqli_query($conn, "INSERT INTO t_cart VALUES (null, '".$product_id."', '".$jml."', '".$admin_id."')");
            if($insert){
                echo "
                <script>
                alert('Tambah keranjang berhasil');
                window.location = 'dashboard_user.php'
                </script>
                ";
            }else{
                echo 'gagal' . mysqli_errno($conn);
            }
        }
    }
?>
