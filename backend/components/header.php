<header id="nav-bar">
    <div id="left-menus" class="pc-flex menus">
        <div class="menu">
          <a class="nav-menu<?php if ($page == "/") echo ' active'; else echo '" href="/'; ?>">Home</a>
        </div>
        <div class="menu">
            <?php 
                if ($row['is_superuser']) {
                    echo '<a class="nav-menu'.($page != "/" ? ' active' : '" href="/add_chocolate').'">Add 🍫</a>';
                } else {
                    echo '<a class="nav-menu'.($page != "/" ? ' active' : '" href="/transaction_history').'">History</a>';
                }
            ?>
        </div>    
        <div class="menu mobile-only"><a href="/api/users/logout" class="nav-menu">Logout</a></div>
    </div>
    <div id="middle-container">
        <div class="mobile-only" onclick="toggleMenu()"><img id="hamburger" src="static/images/hamburger.svg"></div>
        <form id="search-bar">
            <span id="search-logo">🔍</span>
            <input type="text" name="search" id="search">
        </form>
    </div>
    <div id="right-menus">
        <div class="menu right-menu"><a href="/api/users/logout" class="nav-menu">Logout</a></div>
    </div>
</header>