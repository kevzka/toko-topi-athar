<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Trigger Bubble</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS untuk Bubble */
        .sidebar-trigger {
            position: fixed; /* Tetap di tempat saat di-scroll */
            top: 20px; /* Jarak dari atas */
            left: 20px; /* Jarak dari kiri */
            width: 50px;
            height: 50px;
            background-color: #3498db; /* Warna latar belakang bubble */
            color: white; /* Warna ikon */
            border-radius: 50%; /* Membuat bentuk lingkaran */
            display: flex;
            justify-content: center; /* Membuat ikon berada di tengah horizontal */
            align-items: center; /* Membuat ikon berada di tengah vertikal */
            cursor: pointer; /* Mengubah kursor menjadi pointer saat dihover */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Efek bayangan */
            z-index: 1000; /* Memastikan bubble berada di atas elemen lain */
        }

        /* CSS untuk Sidebar (contoh) */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px; /* Sembunyikan sidebar di luar layar */
            width: 250px;
            height: 100%;
            background-color: #f0f0f0;
            transition: left 0.3s ease; /* Efek transisi saat sidebar muncul/hilang */
            z-index: 999;
            padding-top: 60px; /* Ruang untuk bubble trigger */
        }

        .sidebar.active {
            left: 0; /* Memunculkan sidebar */
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>


    <div class="sidebar">
        <ul>
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
        </ul>
    </div>

    <script>
        const trigger = document.querySelector('.sidebar-trigger');
        const sidebar = document.querySelector('.sidebar');

        trigger.addEventListener('click', () => {
            sidebar.classList.toggle('active'); // Menambah/menghapus class 'active' untuk menampilkan/menyembunyikan sidebar
        });
    </script>

</body>
</html>