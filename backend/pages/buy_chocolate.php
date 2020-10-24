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
                        <h2>'.$chocolate['name'].'</h2>
                    </div>
                    <form id="buy-form" onsubmit="callBuy(event)">
                        <div class="chocolate-detail-body">
                            <div class="chocolate-detail-img">
                                <img class="chocolate-image" src="static/images/'.$chocolate['id'].'">
                            </div>
                            <div class="chocolate-detail-desc">
                                <ul>
                                    <li><span>Amount sold:</span> '.$chocolate['sold'].'</li>
                                    <li><span>Price:</span> Rp '.$chocolate['price'].',00</li>
                                    <li><span>Amount:</span> '.$chocolate['stock'].'</li>
                                    <li><span>Description:</span> '.$chocolate['description'].'</li>
                                    <li>
                                        <ul>
                                            <li><span>Amount to Buy:</span></li>
                                            <li class="chocolate-detail-amount">
                                                <div>
                                                    <input id="dec-amount" type="button" onclick="decAmount()" value="-">
                                                </div>
                                                <div>
                                                    <input class="amount-input" type="text" id="amount" name="amount" required>
                                                </div>
                                                <div>
                                                    <input id="inc-amount" type="button" onclick="incAmount()" value="+">
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chocolate-detail-address">
                            <label class="form-input-label" for="address"><span>Address:</span></label><br>
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
