<!DOCTYPE html>
<html>
    <head>
        <title>Search Result - Choco Shop</title>
        <link rel="stylesheet" href="/static/css/header.css">
        <link rel="stylesheet" href="/static/css/search.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php $nav_page = 'dashboard'; include __DIR__.'/../components/header.php'; ?>
        <div id="chocolates-search-container">
            <?php
            // page content
            foreach ($chocolates_showed as $chocolate) {
                echo '
                    <div class="chocolate-search-container" onclick="location.href=\'/detail_chocolate/'.$chocolate['id'].'\';">
                        <div class="chocolate-search-image">
                            <img class="chocolate-search-img"
                                src="/static/images/chocolates/chocolate_'
                                .$chocolate['id'].'.'.$chocolate['image_file_type'].'"
                                alt="'.$chocolate['name'].'">
                        </div>
                        <div class="chocolate-search-desc">
                            <h2>'.$chocolate['name'].'</h2>
                            <div class="chocolate-search-info">
                                <p>Amount sold: '.$chocolate['sold'].'</p>
                                <p>Price: '.$chocolate['price'].'</p>
                                <p>Amount remaining: '.$chocolate['stock'].'</p>
                                <p>Description:</p>
                                <p>'.$chocolate['description'].'</p>
                            </div>
                        </div>
                    </div>
                ';
            }
            echo '<div class="page-nav">';
            // page link
            $query_arr = [];
            if (isset($_GET['name'])) $query_arr['name'] = $_GET['name'];
            if (isset($_GET['limit'])) $query_arr['limit'] = $_GET['limit'];
            // prev page
            if ($page > 1) {
                $query_arr['page'] = $page - 1;
                echo '<a href="?'.http_build_query($query_arr).'">&lt;&lt;</a>';
            }
            // selected page
            for ($i = 1; $i <= $total_page; $i++) {
                $query_arr['page'] = $i;
                if ($i === $page)
                    echo '<a class="active-page" href="?'.http_build_query($query_arr).'">'.$i.'</a>';
                else
                    echo '<a href="?'.http_build_query($query_arr).'">'.$i.'</a>';
            }
            // next page
            if ($page < $total_page) {
                $query_arr['page'] = $page + 1;
                echo '<a href="?'.http_build_query($query_arr).'">&gt;&gt;</a>';
            }
            echo '</div>';
            ?>
        </div>
        <script src="/static/js/responsive.js"></script>
    </body>
</html>
