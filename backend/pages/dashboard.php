<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Choco Shop</title>
        <link rel="stylesheet" href="static/css/header.css">
        <link rel="stylesheet" href="static/css/dashboard.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php $nav_page = 'dashboard'; include __DIR__.'/../components/header.php'; ?>
        <div id="container">
            <div id="welcome">
                <h2>Hello, <?php echo $user_info['username']; ?></h2>
            </div>
            <div id="chocolates-container">
                <?php 
                    foreach ($chocolates as $chocolate) {
                        echo '
                            <div class="chocolate-container">
                                <img class="chocolate-image" src="static/images/'.$chocolate['id'].'">
                                <div class="chocolate-desc">
                                    <h2>'.$chocolate['name'].'</h2>
                                    <p>Amount sold: '.$chocolate['sold'].'</p>
                                    <p>Price Rp. '.$chocolate['price'].',00</p>
                                </div>
                            </div>
                        ';
                    }

                ?>
            </div>
        </div>
        <script src="static/js/responsive.js"></script>
    </body>
</html> 
