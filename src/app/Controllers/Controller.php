<?php

namespace App\Controllers;

class Controller
{
    /**
     * @param bool $check_su
     * @return array|null
     */
    public function check_auth($check_su=false) {
        if (empty($_COOKIE['CHOCO_SESSION'])) {
            header('Location: /login');
            exit();
        }
        $res = \DatabaseConnection::prepare_query('SELECT * FROM user WHERE access_token = BINARY ? and token_creation_time > DATE_SUB(now(), INTERVAL 1 HOUR);');
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

    /**
     * @param array $data
     * @param int $statusCode
     * @return false|string
     */
    public function respondJson(array $data, $statusCode=200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        return json_encode($data);
    }

    /**
     * @param $message
     * @param null $data
     * @param int $statusCode
     * @return false|string
     */
    public function respondSuccess($message, $data=null, $statusCode=200) {
        return $this->respondJson([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * @param $message
     * @param $statusCode
     * @return false|string
     */
    public function respondSuccessCode($message, $statusCode) {
        return $this->respondSuccess($message, null, $statusCode);
    }

    /**
     * @param $message
     * @param null $data
     * @param int $statusCode
     * @return false|string
     */
    public function respondError($message, $data=null, $statusCode=400) {
        return $this->respondJson([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * @param $message
     * @param $statusCode
     * @return false|string
     */
    public function respondErrorCode($message, $statusCode) {
        return $this->respondError($message, null, $statusCode);
    }
}
