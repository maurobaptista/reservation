<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'load.php';

$app->get('/test', function (Request $request, Response $response) {
    return $this->view->render($response, 'test.phtml');
});
$app->run();