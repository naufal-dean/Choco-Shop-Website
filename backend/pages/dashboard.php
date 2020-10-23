<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Choco Shop</title>
        <link rel="stylesheet" href="static/css/header.css">
        <link rel="stylesheet" href="static/css/dashboard.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include __DIR__.'/../components/header.php' ?>
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
