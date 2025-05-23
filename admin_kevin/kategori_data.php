<?php	include 'session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connecta| kategori</title>
    <link rel="stylesheet" href="../style/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar closed">
            <div class="sidebar-title"><b>connecta</b></div>
            <ul>
                <?php	include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <h5 class="card-title">Kategori</h5>
            <button onclick="window.location = 'kategori_tambah.php'" class="btn add-data">+ Tambah Data</button>
            <table class="table1" width="100%">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM t_category ORDER BY id_category ASC");
                    if(mysqli_num_rows($kategori) > 0){
                        while($row = mysqli_fetch_array($kategori)){
                ?>
                <tr>
                    <td><?php	echo $no++ ?></td>
                    <td><?php	echo $row["category_name"] ?></td>
                    <td>
                        <button onclick="window.location = 'kategori_edit.php?id=<?php	echo $row['id_category'] ?>'" class="btn edit">Edit</button>
                        <button onclick="if(confirm('Yakin Ingin Hapus?')){window.location = 'hapus_proses.php?idk=<?php	echo $row['id_category'] ?>'} " class="btn hapus">Hapus</button>
                    </td>
                </tr>
                <?php	}}else{ ?>
                    <tr>
                        <td colspan="3">Tidak Ada Data</td>
                    </tr>
                    <?php	} ?>
            </table>
        </div>
    </div>
</body>
</html>