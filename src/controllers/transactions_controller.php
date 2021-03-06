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
                $response = $this->getAllTransactions();
            default:
                // var_dump($this->requestMethod);
                $response = $this->notFoundResponse();
                break;
        }
        // header($response['status_code_header']);
        // if ($response['body']) {
        //     echo $response['body'];
        // }
        var_dump($this->requestMethod);
        // echo $response['body'];
    }

    private function getAllTransactions()
    {
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode([
            'message' => 'Hello World'
        ]);
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
