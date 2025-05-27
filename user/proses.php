<?php
    include '../db.php';
    if(isset($_GET['ck_id'])){
        $delete = mysqli_query($conn, "UPDATE t_checkout SET status = 'Selesai' WHERE id_checkout = '".$_GET['ck_id']."'");
        echo '<script>
                window.location = "checkout_data.php"
            </script>';
    }
    if(isset($_GET['kc_id'])){
        $delete = mysqli_query($conn, "UPDATE t_checkout SET status = 'Batal' WHERE id_checkout = '".$_GET['kc_id']."'");
        echo '<script>
                window.location = "checkout_data.php"
            </script>';
    }
?>
