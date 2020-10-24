<!DOCTYPE html>
<html>
    <head>
        <title>Detail - Choco Shop</title>
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
                        <div class="chocolate-detail-body">
                            <div class="chocolate-detail-img">
                                <img class="chocolate-image"
                                    src="/static/images/chocolates/chocolate_'
                                    .$chocolate['id'].'.'.$chocolate['image_file_type'].'"
                                    alt="'.$chocolate['name'].'">
                            </div>
                            <div class="chocolate-detail-desc">
                                <ul>
                                    <li>Amount sold: '.$chocolate['sold'].'</li>
                                    <li>Price: '.$chocolate['price'].'</li>
                                    <li>Amount: '.$chocolate['stock'].'</li>
                                    <li>Description: '.$chocolate['description'].'</li>
                                </ul>
                            </div>
                        </div>                
                    ';
                    echo '<div class="chocolate-detail-option">';
                    if ($user_info['is_superuser']) {
                        echo '<a class="chocolate-detail-btn" href="/detail_chocolate/'.$id.'/add">Add Stock</a>';
                    } else {
                        if ((int) $chocolate['stock'] > 0)
                            echo '<a class="chocolate-detail-btn" href="/detail_chocolate/'.$id.'buy">Buy Now</a>';
                    }
                    echo '</div>';
                ?>
            </div>
        </div>
    <script src="/static/js/responsive.js"></script>
    </body>
</html>
