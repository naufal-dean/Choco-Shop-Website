<?php

namespace App\Controllers;

class PageController extends Controller
{
    public function check_auth() {
        if (empty($_COOKIE['CHOCO_SESSION'])) {
            header('Location: /login');
            exit();
        }
        $res = \DatabaseConnection::prepare_query('SELECT * FROM user WHERE access_token = BINARY ? and token_creation_time > DATE_SUB(now(), INTERVAL 1 DAY);');
        $res->bind_param('s', $_COOKIE['CHOCO_SESSION']);
        $res->execute();
        $res = $res->get_result()->fetch_assoc();
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
        $row = $this->check_auth();
        include("../pages/dashboard.php");
    }

    public function add_chocolate_page() {
        $row = $this->check_auth();
        include("../pages/add_chocolate.php");
    }
}
