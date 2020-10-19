<?php

namespace App\Controllers;

class UserController extends Controller
{
    public function show_users() {
        $res = \DatabaseConnection::execute_query('SELECT id, username, email FROM user;');
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        }
        return $this->respondSuccess('Success', $res, 200);
    }

    public function login() {
        $res = \DatabaseConnection::prepare_query('SELECT id, username, email FROM user WHERE username = ? and password = ?;');
        $res->bind_param('ss', $_POST['username'], $_POST['password']);
        $res->execute();
        $res = $res->get_result()->fetch_assoc();
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        } else if (!$res) {
            return $this->respondError('Login failed', null, 401);
        }
        session_start();
        $_SESSION['id'] = $res['id'];
        $_SESSION['username'] = $_POST['username'];
        return $this->respondSuccess('Successfully login', null, 2010;
    }

    public function logout() {
        session_destroy();
        return $this->respondSuccess('Successfully logout', null, 200);
    }

    public function register() {
        # Format checking
        if (preg_match('(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z]+$)', $_POST["email"]) == 0) {
            return $this->respondError('Please enter a correct email', null, 400);
        }
        if (preg_match('(^[A-Za-z0-9_]+$)', $_POST["username"]) == 0) {
            return $this->respondError('Please enter a correct username', null, 400);
        }

        # Username & email must be unique
        $res = \DatabaseConnection::prepare_query('SELECT id, username, email FROM user WHERE username = ? or email = ?;');
        $res->bind_param('ss', $_POST['username'], $_POST['email']);
        $res->execute();
        $res = $res->get_result()->fetch_assoc();
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        } else if ($res) {
            return $this->respondError('Email or username has been used already', null, 400);
        }

        $res = \DatabaseConnection::prepare_query('INSERT INTO user (username, email, password, is_superuser) VALUES (?, ?, ?, 1);');
        $res->bind_param('sss', $_POST['username'], $_POST['email'], $_POST['password']);
        $res->execute();
        session_start();
        $_SESSION['id'] = $res['id'];
        $_SESSION['username'] = $_POST['username'];
        return $this->respondSuccess('Successfully register', null, 201);
    }

    public function id_lookup() {
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        $res = \DatabaseConnection::prepare_query('SELECT id, username, email FROM user WHERE id = ?;');
        $res->bind_param('i', $id);
        $res->execute();
        $res = $res->get_result()->fetch_assoc();
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        }
        return $this->respondSuccess('Success', $res, 200);
    }

    public function email_lookup() {
        $res = \DatabaseConnection::prepare_query('SELECT id, username, email FROM user WHERE email = ?;');
        $res->bind_param('s', $_GET['value']);
        $res->execute();
        $res = $res->get_result()->fetch_assoc();
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        }
        return $this->respondSuccess('Success', $res, 200);
    }

    public function username_lookup() {
        $res = \DatabaseConnection::prepare_query('SELECT id, username, email FROM user WHERE username = ?;');
        $res->bind_param('s', $_GET['value']);
        $res->execute();
        $res = $res->get_result()->fetch_assoc();
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        }
        return $this->respondSuccess('Success', $res, 200);
    }

}
