<?php

namespace App\Controllers;

class PageController extends Controller
{
    public function login_page() {
        include("../pages/login.php");
    }

    public function register_page() {
        include("../pages/register.php");
    }

    public function dashboard_page() {
        include("../pages/dashboard.php");
    }

    public function add_chocolate_page() {
        include("../pages/add_chocolate.php");
    }
}
