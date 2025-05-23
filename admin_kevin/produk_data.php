<?php	include 'session.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleadmin.css">
    <title>Produk Data</title>
</head>
<body>
<div class="wrapper">
        <div class="header"></div>
        <div class="sidebar closed">
            <div class="sidebar-title"><b>connecta</b></div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <h5 class="card-title">Produk Data</h5>
            <button onclick="window.location = 'produk_tambah.php'" class="btn add-data">+ Tambah Data</button>
            <table class="table1" width="100%">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Detail Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    $produk = mysqli_query($conn, "SELECT * FROM t_product LEFT JOIN t_category USING (id_category) ORDER BY id_product DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($row = mysqli_fetch_array($produk)){
                ?>
                <tr>
                    <td><?php	echo $no++ ?></td>
                    <td><?php	echo $row["category_name"] ?></td>
                    <td><?php	echo $row["product_name"] ?></td>
                    <td><?php	echo $row["product_description"] ?></td>
                    <td>Rp. <?php	echo number_format($row["product_price"]) ?></td>
                    <td><?php	echo $row["product_stock"] ?></td>
                    <td><a href="produk/<?php	echo $row["product_image"] ?>" target="_blank"><img src="../produk/<?php	echo $row["product_image"] ?>" width="50px"></a></td>
                    <td><?php	echo ($row["product_status"] == 0)? 'Tidak Aktif' : 'Aktif' ?></td>
                    <td>
                        <button onclick="window.location = 'produk_edit.php?id=<?php	echo $row['id_product'] ?>'" class="btn edit">Edit</button>
                        <button onclick="if(confirm('Yakin Ingin Hapus?')){window.location = 'hapus_proses.php?idp=<?php	echo $row['id_product'] ?>'} " class="btn hapus">Hapus</button>
                    </td>
                </tr>
                <?php	}}else{ ?>
                    <tr>
                        <td colspan="9">Tidak Ada Data</td>
                    </tr>
                    <?php	} ?>
            </table>
        </div>
    </div>
</body>
</html>