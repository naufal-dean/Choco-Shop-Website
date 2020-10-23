<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Choco Shop</title>
        <link rel="stylesheet" href="static/css/main.css">
        <link rel="stylesheet" href="static/css/dashboard.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="nav-bar">
            <div id="left-menus" class="menus">
                <div class="menu"><a class="nav-menu active">Home</a></div>
                <div class="menu">
                    <?php 
                        if ($row['is_superuser']) {
                            echo '<a class="nav-menu" href="/add_chocolate">Add 🍫</a>';
                        } else {
                            echo '<a class="nav-menu">History</a>';
                        }
                    ?>
                </div>    
                <div class="menu mobile-only"><a href="/api/users/logout" class="nav-menu">Logout</a></div>
            </div>
            <div id="middle-container">
                <div class="mobile-only" onclick="toggleMenu()"><img id="hamburger" src="static/images/hamburger.svg"></div>
                <form id="search-bar">
                    <span id="search-button">🔍</span>
                    <input type="text" name="search" id="search">
                </form>
            </div>
            <div id="right-menus">
                <div class="menu right-menu"><a href="/api/users/logout" class="nav-menu">Logout</a></div>
            </div>
        </div>
        <div id="container">
            <div id="welcome">
                <h2>Hello, <?php echo $row['username']; ?></h2>
            </div>
            <div id="chocolates-container">
                <div class="chocolate-container">
                    <img class="chocolate-image">
                    <div class="chocolate-desc">
                        <h2>Choco Name 1</h2>
                        <p>Amount sold: 6</p>
                        <p>Price Rp. 3000,00</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="static/js/responsive.js"></script>
    </body>
</html> 
