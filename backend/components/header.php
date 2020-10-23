<header id="nav-bar">
    <div id="nav-left-menus" class="nav-menus nav-hidden">
        <?php 
            $nav_temp_var_1 = '';
            $nav_temp_var_2 = '';
            $nav_temp_var_3 = '';
            if ($nav_page == 'dashboard') {
                $nav_temp_var_1 = ' nav-active';
            } elseif ($nav_page == 'add_chocolate') {
                $nav_temp_var_2 = ' nav-active';
            } elseif ($nav_page == 'transaction_history') {
                $nav_temp_var_3 = ' nav-active';
            }
            echo '<a class="nav-menu'.$nav_temp_var_1.'" href="/">Home</a>';
            if ($user_info['is_superuser']) {
                echo '<a class="nav-menu'.$nav_temp_var_2.'" href="/add_chocolate">Add 🍫</a>';
            } else {
                echo '<a class="nav-menu'.$nav_temp_var_3.'" href="/transaction_history>History</a>';
            }
        ?>
    </div>
    <div id="nav-middle-container" class="nav-menus">
        <div id="nav-hamburger" class="nav-menu nav-mobile-only" onclick="toggleMenu()">
            <img id="nav-hamburger-img" src="static/images/hamburger.svg">
        </div>
        <form id="nav-search-form">
            <span id="nav-search-logo">🔍</span>
            <input type="text" name="search" id="nav-search">
        </form>
    </div>
    <div id="nav-right-menus" class="nav-menus nav-hidden">
        <a href="/api/users/logout" class="nav-menu">Logout</a>
    </div>
</header>