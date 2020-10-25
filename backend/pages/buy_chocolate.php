<!DOCTYPE html>
<html>
    <head>
        <title>Buy - Choco Shop</title>
        <link rel="stylesheet" href="/static/css/header.css">
        <link rel="stylesheet" href="/static/css/detail_chocolate.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
    <?php $nav_page = ''; include __DIR__.'/../components/header.php'; ?>
    <div id="container">
        <div id="chocolate-detail-container">
            <?php
            echo '
                    <div class="chocolate-detail-name">
                        <h2>Buy Chocolate</h2>
                    </div>
                    <form id="buy-form" onsubmit="callBuy(event)">
                        <div class="chocolate-detail-body">
                            <div class="chocolate-detail-img">
                                <img class="chocolate-image" src="static/images/'.$chocolate['id'].'">
                            </div>
                            <div class="chocolate-detail-desc">
                                <ul>
                                    <li><h3>'.$chocolate['name'].'</h3></li>
                                    <li><span class="label-form">Amount sold:</span> '.$chocolate['sold'].'</li>
                                    <li><span class="label-form">Price:</span> Rp <span id="price">'.$chocolate['price'].'</span>,00</li>
                                    <li><span class="label-form">Amount remaining:</span> '.$chocolate['stock'].'</li>
                                    <li><span class="label-form">Description:</span> '.$chocolate['description'].'</li>
                                    <li>
                                        <div class="amount-price-box">
                                            <ul class="amount-box">
                                                <li><span class="label-form">Amount to Buy:</span></li>
                                                <li class="chocolate-detail-amount">
                                                    <div>
                                                        <input id="dec-amount" type="button" onclick="decAmount()" value="-">
                                                    </div>
                                                    <div>
                                                        <input class="amount-input" type="text" id="amount" name="amount" value="0" required readonly>
                                                    </div>
                                                    <div>
                                                        <input id="inc-amount" type="button" onclick="incAmount()" value="+">
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="total-price-box">
                                                <li><span class="label-form">Total Price:</span></li>
                                                <li class="chocolate-detail-total-price">
                                                    Rp <span id="total-price">0</span>,00
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chocolate-detail-address">
                            <label class="form-input-label" for="address"><span class="label-form">Address:</span></label><br>
                            <textarea class="form-input-box" id="address" name="address" form="buy-form" required></textarea><br>
                        </div>
                        <div class="chocolate-detail-option">
                            <input class="form-input-submit chocolate-detail-btn" type="button" onclick="goBack()" value="Cancel">
                            <input class="form-input-submit chocolate-detail-btn" type="submit" value="Buy">
                        </div>
                    </form>
                ';
            ?>
        </div>
    </div>
    <script src="/static/js/helper.js"></script>
    <script src="/static/js/responsive.js"></script>
    <script src="/static/js/buy_chocolate.js"></script>
    </body>
</html>
