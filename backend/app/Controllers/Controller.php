<?php


class Controller
{
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
