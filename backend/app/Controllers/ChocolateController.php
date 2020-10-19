<?php

namespace App\Controllers;

class ChocolateController extends Controller
{
    public function show_top_selling_chocolates() {
        $res = \DatabaseConnection::execute_query('SELECT * FROM chocolate ORDER BY sold DESC LIMIT 10;');
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        }
        return $this->respondSuccess('Success', $res, 200);
    }

    public function id_lookup() {
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        $res = \DatabaseConnection::prepare_query('SELECT * FROM chocolate WHERE id = ?;');
        $res->bind_param('i', $id);
        $res->execute();
        $res = $res->get_result()->fetch_assoc();
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        } else if (!$res) {
            return $this->respondError('Chocolate Not Found', null, 404);
        }
        return $this->respondSuccess('Success', $res, 200);
    }

    public function find_chocolates() {
        $res = \DatabaseConnection::prepare_query('SELECT * FROM chocolate WHERE name LIKE CONCAT("%",?,"%") LIMIT 10;');
        $res->bind_param('s', $_GET['name']);
        $res->execute();
        $res = $res->get_result()->fetch_all(MYSQLI_ASSOC);
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        }
        return $this->respondSuccess('Success', $res, 200);
    }

    // TODO: Update chocolate data & Create transaction
    public function buy_chocolate() {
        session_start();
        # Auth check
        if (!isset($_SESSION['id'])) {
            return $this->respondError('Please login', null, 403);
        }

        # Form check
        if (!isset($_POST['address']) || !isset($_POST['amount'])) {
            return $this->respondError('Please enter email & amount', null, 400);
        }

        $id = explode('/', $_SERVER['REQUEST_URI'])[3];
        self::$conn->begin_transaction();
        $res = \DatabaseConnection::prepare_query('SELECT * FROM chocolate WHERE id = ?;');
        $res->bind_param('i', $id);
        $res->execute();
        $chocolate = $res->get_result()->fetch_all(MYSQLI_ASSOC);

        # Check chocolate if exists
        if ($chocolate === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        } else if (!$chocolate) {
            return $this->respondError('Chocolate Not Found', null, 404);
        }

        # Check stock
        if ($_POST['amount'] > $chocolate['stock']) {
            return $this->respondError('Insufficient Stock', null, 400);
        }

        # Update chocolate
        // $res = \DatabaseConnection::prepare_query('UPDATE chocolate SET stock = ?');
        // $res->bind_param('i', $id, $_POST['address'], $_POST['amount'], $chocolate['price']*$_POST['amount'],);
        // $res->execute();
        // $res = $res->get_result()->fetch_all(MYSQLI_ASSOC);

        # Create transaction
        // $res = \DatabaseConnection::prepare_query('SELECT * FROM chocolate WHERE id = ?;');
        // $res->bind_param('i', $id, $_POST['address'], $_POST['amount'], $chocolate['price']*$_POST['amount'],);
        // $res->execute();
        // $res = $res->get_result()->fetch_all(MYSQLI_ASSOC);
        self::$conn->commit();
        return $this->respondSuccess('Success', $res, 201);
    }
}
