<?php
    function tableQuery($db, $tableName, $column){
        $template = "CREATE TABLE `$db`.`$tableName` (`id` INT NOT NULL AUTO_INCREMENT ,{teks} PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $temp = "";
        for($i = 0; $i < count($column); $i++){
            $temp .= " `$column[$i]` VARCHAR(100) NOT NULL ,";
        }
        $template = str_replace('{teks}', $temp, $template);
        return $template;
    }
?>

<!DOCTYPE html>
<head></head>
<html><body>
<?php
    // unlink('./test.php');
    $db = 'pemro2';
    $conn = new mysqli('localhost','root','',"$db");
    $fileDelete = '';
    $tableName = 'tb_admin';
    $column = [
        'username', 'password'
    ];
    $table = tableQuery($db, $tableName, $column);

    if(mysqli_connect_errno()){
        $conn = new mysqli('localhost','root','');
        mysqli_query($conn, "CREATE DATABASE $db");
        $result = mysqli_query($conn, "SELECT * FROM $tableName");
        if(!$result){
            mysqli_query($conn, $table);
            echo "
            <script>
                alert('database telah di tambahkan, klik ok untuk melanjutkan');
                // window.location = './main.php';
            </script>
            ";
        }
        echo 'database tidak ada';
    }else{
        // mysqli_query($conn, "DROP DATABASE `$db`");
        echo 'tidak error';
    }
    ?>
    </body></html>
        