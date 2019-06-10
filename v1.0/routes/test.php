<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/test', function () use ($api_log) {
    $this->get('', function (Request $rqst, Response $rsp, array $args) {
        $response["message"] = "";
        $rsp->getBody()->write(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT));
        $rsp->withHeader('Content-type', 'application/json')->withStatus(200);
        $this->logger->addInfo('in test/echo');
        return $rsp;
    });
    
    $this->get('/echo/{message}', function (Request $rqst, Response $rsp, array $args) {
        $response["data"] = array();
        $print = $this->data_response;
        $rsp = $print($rsp, $response, "TestSuccessful", $args['message']);
        return $rsp;
    });
    
    $this->get('/server_configuration', function (Request $rqst, Response $rsp, array $args) {  
        $hasMySQL = false; 
        $hasMySQLi = false; 
        $withMySQLnd = false; 
        $response["data"] = array();
        $message = "";
        if (function_exists('mysql_connect')) {
            $hasMySQL = true;
            $message .= "(Deprecated) MySQL is installed. ";
        } else {
            $message .= "(Deprecated) MySQL is not installed. ";
        }
        if (function_exists('mysqli_connect')) {
            $hasMySQLi = true;
            $message .= "and the new (improved) MySQL is installed. ";
        } else{
            $message .= "and the new (improved) MySQL is not installed. ";
        }
        if (function_exists('mysqli_get_client_stats')) {
            $withMySQLnd = true;
            $message .= "This server is using MySQLnd as the driver."; 
        } else{
            $message .= "This server is using libmysqlclient as the driver.";
        }

        $response["data"]["MySQL (Deprecated)"] = $hasMySQL;
        $response["data"]["MySQL (improved)"] = $hasMySQLi;
        $response["data"]["MySQLnd Driver"] = $withMySQLnd;

        $print = $this->data_response;
        $rsp = $print($rsp, $response, "TestSuccessful", $message);
        return $rsp;        
    });
   

    $this->get('/encryption/{message}', function (Request $rqst, Response $rsp, array $args) {  
        $response["data"] = array();
        $response["data"]["message_original"] =  $args['message'];
        $encrypt = $this->encrypt;
        $response["data"]["message_encrypted"] = $encrypt($args['message']);
        // $decrypt = $this->decrypt;
        // $response["data"]["message_decrypted"] = $decrypt($encrypt($args["message"]));

        $print = $this->data_response;
        $rsp = $print($rsp, $response, "TestSuccessful", "Encryption Successful");
        return $rsp;
    });
    
    $this->get('/encrypt/{message}', function (Request $rqst, Response $rsp, array $args) {  
        $response = array();
        $response["message_original"] =  $args['message'];
        $encrypt = $this->encrypt;
        $response["message_encrypted"] = $encrypt($args['message']);
        $rsp->getBody()->write(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT));
        $rsp->withHeader('Content-type', 'application/json')->withStatus(200);
        $this->logger->addInfo('in test/encrypt');
    });
    
    $this->get('/decrypt/{message}', function (Request $rqst, Response $rsp, array $args) {  
        $response = array();
        $response["message_original"] =  $args['message'];
        $decrypt = $this->decrypt;
        $response["message_decrypted"] = $decrypt(($args["message"]));
        $rsp->getBody()->write(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT));
        $rsp->withHeader('Content-type', 'application/json')->withStatus(200);
        $this->logger->addInfo('in test/decrypt');
    });
    
    $this->get('/phpinfo', function (Request $rqst, Response $rsp, array $args) {  
        phpinfo();
        $this->logger->addInfo('in test/phpinfo');
    });
});