<?php
    include "../db.php";
    if(isset($_GET['id_ck'])){
        $delete = mysqli_query($conn, "UPDATE t_checkout SET validation = 'Valid', status = 'Proses' WHERE id_checkout = '".$_GET['id_ck']."' ");
        echo "<script>
                window.location = 'checkout.php';
            </script>";
    }
?>
