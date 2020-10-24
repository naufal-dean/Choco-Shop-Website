<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Choco Shop</title>
        <link rel="stylesheet" href="/static/css/header.css">
        <link rel="stylesheet" href="/static/css/dashboard.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
    <?php $nav_page = ''; include __DIR__.'/../components/header.php'; ?>
    <div id="container">
        <div id="chocolate-detail-container">
            <?php
            echo '
                    <div class="chocolate-detail-name">
                        <h2>'.$chocolate['name'].'</h2>
                    </div>
                    <form id="add-stock-form" onsubmit="callAddStock(event)">
                        <div class="chocolate-detail-body">
                            <div class="chocolate-detail-img">
                                <img class="chocolate-image" src="static/images/'.$chocolate['id'].'">
                            </div>
                            <div class="chocolate-detail-desc">
                                <ul>
                                    <li>Amount sold: '.$chocolate['sold'].'</li>
                                    <li>Price: '.$chocolate['price'].'</li>
                                    <li>Amount: '.$chocolate['stock'].'</li>
                                    <li>Description: '.$chocolate['description'].'</li>
                                    <li>
                                        <ul>
                                            <li>Amount to Add:</li>
                                            <li>
                                                <div>
                                                    <input class="amount-input" type="text" id="amount" name="amount" required>
                                                </div>
                                                <div>
                                                    <input id="inc-amount" type="button" onclick="incAmount()" value="+">
                                                </div>
                                                <div>
                                                    <input id="dec-amount" type="button" onclick="decAmount()" value="-">
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="chocolate-detail-option">
                                <input class="form-input-submit" type="button" onclick="goBack()" value="Cancel">
                                <input class="form-input-submit" type="submit" value="Add">
                            </div>
                        </div>
                    </form>
                ';
            ?>
        </div>
    </div>
    <script src="/static/js/responsive.js"></script>
    <script src="/static/js/add_stock_chocolate.js"></script>
    </body>
</html>
