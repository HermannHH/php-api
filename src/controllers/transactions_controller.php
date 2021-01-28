<?php

namespace src\controllers;

class TransactionsController {

    private $requestMethod;
    private $transactionId;

    public function __construct($requestMethod, $transactionId)
    {
        $this->requestMethod = $requestMethod;
        $this->transactionId = $transactionId;
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':

            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getAllTransactions()
    {
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = 'hello world';
        return $response;
    }

    private function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}
?>
