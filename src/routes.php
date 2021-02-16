<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;


return function (App $app) {
    require_once "ClientsManager.php";
    
    $clientManager = new ClientsManager($app);

    $app->get('/clients', function (Request $request, Response $response, array $args) use ($clientManager) {
        
        $clients = $clientManager->getClients();
        $response->getBody()->write(json_encode($clients));

        return $response->withHeader('Content-Type', 'application/json');
    });
};
