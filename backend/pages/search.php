<!DOCTYPE html>
<html>
    <head>
        <title>Search Result - Choco Shop</title>
        <link rel="stylesheet" href="/static/css/header.css">
        <link rel="stylesheet" href="/static/css/search.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php $nav_page = ''; include __DIR__.'/../components/header.php'; ?>
        <div id="chocolates-search-container">
        </div>
        <div id="page-nav" class="hidden">
            <?php
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<a class="page_number" onclick="getChocolates('.$i.')">'.$i.'</a>';
                }
            ?>
        </div>
        <input type="hidden" value="<?php echo urlencode($_GET['name']); ?>">
        <script src="/static/js/search.js"></script>
        <script src="/static/js/responsive.js"></script>
    </body>
</html>
