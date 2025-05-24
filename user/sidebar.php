<div class="sidebar-trigger">
        <i class="fas fa-bars"></i> </div>
<div class="sidebar closed">
    <ul>
        <li onclick="window.location='checkout_data.php'">
            <i class="fas fa-clipboard-list"></i> <span>order</span>
        </li>
        <li onclick="window.location='cart.php'">
            <i class="fas fa-shopping-cart"></i> <span>cart</span>
        </li>
        <li onclick="window.location='profile_user.php'">
            <i class="fas fa-user-circle"></i> <span>profile</span>
        </li>
        <li onclick="window.location='main_page.php';localStorage.setItem('sidebar', 'closed');">
            <i class="fas fa-tachometer-alt"></i> <span>dashboard user</span>
        </li>
    </ul>
</div>
    <script>
        const head = document.querySelector("head");
        const css = document.createElement('link');
        css.rel = 'stylesheet';
        css.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css'
        head.appendChild(css);
        const css2 = document.createElement('link');
        css2.rel = 'stylesheet';
        css2.href = '../style/sidebar.css';
        head.appendChild(css2);

        const sidebar = document.querySelector(".sidebar");
        const toggleBtn = document.querySelector(".sidebar-trigger");


        // Cek localStorage status saat load
        if (localStorage.getItem("sidebar") === "open") {
            sidebar.classList.replace("closed", "open");
        }

        toggleBtn.addEventListener("click", () => {
            console.log('yes')
            if (sidebar.classList.contains("open")) {
                sidebar.classList.replace("open", "closed");
                localStorage.setItem("sidebar", "closed");
            } else {
                sidebar.classList.replace("closed", "open");
                localStorage.setItem("sidebar", "open");
            }
        });
    </script>