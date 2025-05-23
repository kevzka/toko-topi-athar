<?php	include 'session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buka Warung</title>
    <link rel="stylesheet" href="../style/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar closed">
            <div class="sidebar-title"><b>Buka Warung</b></div>
            <ul>
                <?php	include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <h5 class="card-title">Kategori</h5>
            <p><a href="kategori_tambah.php">Tambah Data</a></p>
            <table class="table1" width="80%">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM t_category ORDER BY category_id DESC");
                    if(mysqli_num_rows($kategori) > 0){
                        while($row = mysqli_fetch_array($kategori)){
                            ?>
                                <tr>
                                    <td><?php	echo $no++; ?></td>
                                    <td><?php	echo $row['category_name'] ?></td>
                                    <td>
                                        <a href="kategori_edit.php?id=<?php echo $row['category_id']?>">Edit</a>||
                                        <a href="kategori_hapus.php?id=<?php echo $row['category_id']?>" onclick="return confirm('yakin ingin hapus?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }else{
                        ?>
                            <tr>
                                <td colspan="3">Tidak Ada Data</td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>