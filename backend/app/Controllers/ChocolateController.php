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

    public function add_chocolate() {
        // name varchar(100),
        // price int,
        // description varchar(500),
        // stock int,
        $res = \DatabaseConnection::prepare_query('INSERT INTO chocolate (name, price, description, image_file_type, stock, sold) VALUES (?, ?, ?, ?, ?, 0);');
        if ($res) {
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $tmp = explode('.', basename($_FILES['image']['name']));
                $ext = end($tmp);
                $res->bind_param('sissi', $_POST['name'], $_POST['price'], $_POST['description'], $ext, $_POST['amount']);
                if ($res->execute()) {
                    $id = \DatabaseConnection::get_insert_id();
                    $file_name = 'chocolate_' . $id . '.' . $ext;
                    $target_file = __DIR__.'/../../public/static/'.$file_name;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    return $this->respondSuccessCode('New chocolate added!', 200);
                } else {
                    return $this->respondErrorCode('Query didnt work!', 500);
                }
            } else {
                return $this->respondErrorCode($_FILES['image']['error'], 400);
            }
        } else {
            return $this->respondErrorCode("Query wasnt prepared!", 500);
        }
    }

    public function add_stock_chocolate() {
        // get input
        parse_str(file_get_contents("php://input"), $input);

        // check input
        if (!isset($input['amount'])) {
            return $this->respondError('Please enter add stock amount', null, 400);
        }
        if ((int) $input['amount'] <= 0) {
            return $this->respondError('Please enter positive add stock amount', null, 400);
        }

        // get choco id
        $path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $arr = explode('/', rtrim($path, '/'));
        $id = $arr[count($arr) - 2];

        // check chocolate
        $res_1 = \DatabaseConnection::prepare_query('SELECT * FROM chocolate WHERE id = ?;');
        $res_1->bind_param('i', $id);
        $res_1->execute();
        $chocolates = $res_1->get_result()->fetch_all(MYSQLI_ASSOC);

        if ($chocolates === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        } else if (!$chocolates) {
            return $this->respondError('Chocolate Not Found', null, 404);
        }

        // add choco
        $chocolate = $chocolates[0];
        $new_stock = (int) $chocolate['stock'] + (int) $input['amount'];
        $res_2 = \DatabaseConnection::prepare_query('UPDATE chocolate SET stock = ? WHERE id = ?;');
        $res_2->bind_param('ii', $new_stock, $id);
        $res_2->execute();

        // return
        $res_1->execute();
        $chocolates = $res_1->get_result()->fetch_all(MYSQLI_ASSOC);
        if ($chocolates === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        } else if (!$chocolates) {
            return $this->respondError('Chocolate Not Found', null, 404);
        }
        return $this->respondSuccess('Chocolate stock added successfully', $chocolates[0], 200);
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
