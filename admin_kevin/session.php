<?php
    include "../db.php";
    session_start();
    if(!isset($_SESSION['id_login']) || (trim($_SESSION['id_login']) == '')){
        ?>
            <script>
                alert('Silakan Login Terlebih dahulu');
                window.location = "../login.php";
            </script>
        <?php
    }elseif($_SESSION['level'] != 'admin'){
        ?>
            <script>
                alert('anda bukan admin');
                window.location = '../login.php';
            </script>
        <?php
    }
    $session_id = $_SESSION['id_login'];
    $user_query = mysqli_query($conn, "SELECT * FROM t_admin WHERE id_admin = '$session_id'");
    // or die(mysqli_error());
    $user_row = mysqli_fetch_array($user_query);
?>