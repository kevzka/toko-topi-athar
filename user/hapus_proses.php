<?php
    include '../db.php';
    if(isset($_GET['idc'])){
        $delete = mysqli_query($conn, "DELETE FROM t_cart WHERE id_cart = '".$_GET['idc']."'");
        echo '<script>
                window.location = "cart.php"
            </script>';
    }
?>