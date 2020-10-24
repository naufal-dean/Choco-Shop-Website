<?php

namespace App\Controllers;

class TransactionController extends Controller
{
    private function get_user_info() {
        $res = \DatabaseConnection::prepare_query('SELECT * FROM user WHERE access_token = BINARY ? and token_creation_time > DATE_SUB(now(), INTERVAL 1 DAY);');
        $res->bind_param('s', $_COOKIE['CHOCO_SESSION']);
        $res->execute();
        $data = $res->get_result()->fetch_assoc();
        $res->free_result();
        if (!$res) {
            header('Location: /login');
            exit();
        }
        return $data;
    }

    # return user transactions
    public function get_user_transactions() {
        $user_info = $this->get_user_info();
        
        $user_id = $user_info['id'];
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        $count = isset($_GET['count']) ? $_GET['count'] : 1;

        $res2 = \DatabaseConnection::prepare_query('SELECT * FROM transaction WHERE user_id = ? ORDER BY transaction_date DESC LIMIT ?, ?;');
        $res2->bind_param('iii', $user_id, $offset, $count);

        if ($res2->execute()) {
            $data = $res2->get_result()->fetch_all();
            $res2->free_result();
            return $this->respondSuccess('Success', $data, 200);
        } else {
            return $this->respondErrorCode('Query failed to execute', 500);
        }
    }

    # return how many transactions does a user have
    public function get_user_transaction_count() {
        $user_info = $this->get_user_info();
        $res = \DatabaseConnection::execute_query('SELECT count(*) AS count FROM transaction WHERE user_id = '.$user_info['id'].';');
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        }
        return $this->respondSuccess('Success', $res[0]['count'], 200);
    }
}
