<!DOCTYPE html>
<html>
    <head>
        <title>Transaction History - Choco Shop</title>
        <link rel="stylesheet" href="/static/css/header.css">
        <link rel="stylesheet" href="/static/css/rizky.css">
        <link rel="stylesheet" href="/static/css/transaction_history.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <?php $nav_page = 'transaction_history'; include __DIR__.'/../components/header.php' ?>
      <div id="container">
        <h1>Transaction History</h1>
        <div class='transaction-table'>
          <div class='transaction bordered'>
            <a class='transaction-column c1 bold'>Chocolate Name</a>
            <span class='transaction-column c2 bold'>Amount</span>
            <span class='transaction-column c3 bold'>Total Price</span>
            <span class='transaction-column c4 bold'>Date</span>
            <span class='transaction-column c5 bold'>Time</span>
            <span class='transaction-column c6 bold'>Address</span>
          </div>
          <?php 
            if (empty($transactions)) {
              $transactions = array(array("id"=>-1, "name"=>"-", "amount"=>"-", "total_price"=>"-", "transaction_date"=>"-", "transaction_time"=>"-", "address"=>"-"));
            }
            foreach ($transactions as $transaction) {
              $part = '';
              if ($transaction['id'] >= 0) {
                # TODO: ubah link ke halaman chocolate detail yg bener
                $link = '/detail_chocolate/'.$transaction['id'];
                $part = ' href="'.$link.'"';
              }
              echo "<div class='transaction'>";
              echo "<a class='transaction-column c1'".$part.">".$transaction['name']."</a>";
              echo "<span class='transaction-column c2'>".$transaction['amount']."</span>";
              echo "<span class='transaction-column c3'>".$transaction['total_price']."</span>";
              echo "<span class='transaction-column c4'>".$transaction['transaction_date']."</span>";
              echo "<span class='transaction-column c5'>".$transaction['transaction_time']."</span>";
              echo "<span class='transaction-column c6'>".$transaction['address']."</span>";
              echo "</div>";
            }
          ?>
        </table>
      </div>
      <script src="static/js/responsive.js"></script>
    </body>
</html>