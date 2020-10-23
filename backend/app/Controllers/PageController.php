<?php

namespace App\Controllers;

class PageController extends Controller
{
    public function check_auth($check_su=false) {
        if (empty($_COOKIE['CHOCO_SESSION'])) {
            header('Location: /login');
            exit();
        }
        $res = \DatabaseConnection::prepare_query('SELECT * FROM user WHERE access_token = BINARY ? and token_creation_time > DATE_SUB(now(), INTERVAL 1 DAY);');
        $res->bind_param('s', $_COOKIE['CHOCO_SESSION']);
        $res->execute();
        $res = $res->get_result()->fetch_assoc();
        if ($check_su && !$res['is_superuser']) {
            header('Location: /');
            exit();
        }
        if (!$res) {
            header('Location: /login');
            exit();
        }
        return $res;
    }
    public function login_page() {
        include("../pages/login.php");
    }

    public function register_page() {
        include("../pages/register.php");
    }

    public function dashboard_page() {
        $page = "/";
        $user_info = $this->check_auth();
        $chocolates = \DatabaseConnection::execute_query("SELECT * FROM chocolate ORDER BY sold DESC LIMIT 10;");
        include("../pages/dashboard.php");
    }

    public function add_chocolate_page() {
        $user_info = $this->check_auth(true);
        include("../pages/add_chocolate.php");
    }

    public function transaction_history_page() {
        $user_info = $this->check_auth();
        $transactions = \DatabaseConnection::execute_query("SELECT c.id AS id, name, amount, total_price, transaction_date, transaction_time, address FROM transaction t INNER JOIN chocolate c ON t.chocolate = c.id WHERE user_id = ".$user_info['id'].";");
        include("../pages/transaction_history.php");
    }
}
