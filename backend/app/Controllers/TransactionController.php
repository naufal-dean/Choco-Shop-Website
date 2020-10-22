<?php

namespace App\Controllers;

class TransactionController extends Controller
{
    # return user transactions in json
    public function get_user_transactions() {
        $res = \DatabaseConnection::prepare_query('SELECT * FROM transaction WHERE user_id = ? ORDER BY transaction_date DESC LIMIT ?, ?;');
        if ($res === false) {
            return $this->respondError('Database on server is not properly setup?', null, 500);
        }

        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        $count = isset($_GET['count']) ? $_GET['count'] : 1;

        # TODO: cek user_id gausah dari request, tapi dari cookie
        $res->bind_param('iii', $user_id, $offset, $count);

        if ($res->execute()) {
            $data = $res->get_result()->fetch_all();
            $res->free_result();
            return $this->respondSuccess('Success', $data, 200);
        } else {
            return $this->respondErrorCode('Query failed to execute', 500);
        }
    }
}
