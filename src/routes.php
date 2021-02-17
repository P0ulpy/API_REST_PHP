<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;


return function (App $app) {
    require_once "ClientsManager.php";
    
    $clientManager = new ClientsManager($app);

    $app->get('/clients', function (Request $request, Response $response, array $args) use ($clientManager) {
        
        $clients = $clientManager->getClients();
        $response->getBody()->write($clients);

        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/client/{id}', function (Request $request, Response $response, array $args) use ($clientManager) {

        $client = $clientManager->getClient((int)$args['id']);
        $response->getBody()->write($client);

        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/addClient', function (Request $request, Response $response, array $args) use ($clientManager) {
        
        $client = json_decode($request->getBody());
        var_dump($client);

        $res = $clientManager->addClient($client);
        $response->getBody()->write($res);

        return $response->withHeader('Content-Type', 'application/json');
    });
    





    $app->delete('/deleteClient/{id}', function (Request $request, Response $response, array $args) use ($clientManager) {
        
        $res = $clientManager->deleteClient($args['id']);
        $response->getBody()->write($res);

        return $response->withHeader('Content-Type', 'application/json');
    });
};
