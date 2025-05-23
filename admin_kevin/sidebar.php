<!-- <li>
    <a href="dashboard.php">Halaman Utama</a>
</li>
<li>
    <a href="profil.php">Profil</a>
</li>
<li>
    <a href="kategori_data.php">Kategori</a>
</li>
<li>
    <a href="produk_data.php">Produk</a>
</li>
<li>
    <a href="chart.php">Keranjang</a>
</li>
<li>
    <a href="checkout.php">Check out</a>
</li>
<li>
    <a href="#">selesai</a>
</li>
<li>
    <a href="#">Batal</a>
</li>
<li>
    <a href="../logout.php" onclick="return confirm('Yakin ingin Log Out?')">Logout</a>
</li>
<script>
    const sidebarTitle = document.querySelector('.sidebar-title');

    const btn = document.createElement('div');
    btn.classList.add('btn-sidebar');
    const img = document.createElement('img');
    img.src = '../style/dots.png'; // Atur path gambar
    img.alt = 'Dots Icon';
    btn.appendChild(img);
    sidebarTitle.appendChild(btn);

    const sidebar = document.querySelector(".sidebar");
    const toggleBtn = document.querySelector(".btn-sidebar");
    if (localStorage.getItem("sidebar") === "open") {
        sidebar.classList.add("open");
    }

    toggleBtn.addEventListener("click", function() {
        sidebar.classList.toggle("open");
        console.log('click');

        // Simpan status ke LocalStorage
        if (sidebar.classList.contains("open")) {
            localStorage.setItem("sidebar", "open");
        } else {
            localStorage.setItem("sidebar", "closed");
        }
    });
</script> -->

<li>
    <a href="dashboard.php">
                    <div class="sidebar-place" title="Halaman Utama">
                            <div class="fa-solid fa-house fa-lg pad"></div>
                            <p>Halaman Utama</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="profil.php">
                    <div class="sidebar-place" title="profil">
                            <div class="fa-solid fa-user fa-lg pad"></div>
                            <p>Profil</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="kategori_data.php">
                    <div class="sidebar-place" title="kategori">
                            <div class="fa-solid fa-tags fa-lg pad"></div>
                            <p>Kategori</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="produk_data.php">
                    <div class="sidebar-place" title="produk">
                            <div class="fa-solid fa-box fa-lg pad"></div>
                            <p>Produk</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chart.php">
                    <div class="sidebar-place" title="chart">
                            <div class="fa-solid fa-cart-shopping fa-lg pad"></div>
                            <p>Keranjang</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="checkout.php">
                    <div class="sidebar-place" title="checkout">
                            <div class="fa-solid fa-money-bill-transfer fa-lg pad"></div>
                            <p>Check out</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="selesai.php" title="selesai">
                        <div class="sidebar-place">
                            <div class="fa-solid fa-circle-check fa-lg pad"></div>
                            <p>selesai</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="batal.php">
                        <div class="sidebar-place" title="Batal">
                            <div class="fa-solid fa-ban fa-lg pad"></div>
                            <p>Batal</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="../logout.php" onclick="return confirm('Yakin ingin Log Out?')">
                    <div class="sidebar-place" title="logout">
                            <div class="fa fa-right-from-bracket fa-lg pad"></div>
                            <p>Logout</p>
                        </div>
                    </a>
                </li>
                <script>
        const head = document.querySelector("head");
        const css = document.createElement('link');
        css.rel = 'stylesheet';
        css.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css';
        head.appendChild(css);
        const sidebarTitle = document.querySelector('.sidebar-title');

        const btn = document.createElement('div');
        btn.classList.add('btn-sidebar');
        const img = document.createElement('img');
        img.src = '../style/dots.png'; // Atur path gambar
        img.alt = 'Dots Icon';
        btn.appendChild(img);
        sidebarTitle.appendChild(btn);

        const sidebar = document.querySelector(".sidebar");
        const toggleBtn = document.querySelector(".btn-sidebar");


        // Cek localStorage status saat load
        if (localStorage.getItem("sidebar") === "open") {
            sidebar.classList.replace("closed", "open");
        }

        toggleBtn.addEventListener("click", () => {
            if (sidebar.classList.contains("open")) {
                sidebar.classList.replace("open", "closed");
                localStorage.setItem("sidebar", "closed");
            } else {
                sidebar.classList.replace("closed", "open");
                localStorage.setItem("sidebar", "open");
            }
        });
    </script>