<?php

use Slim\App;

class ClientsManager extends PDO {
    
    function __construct(App $app) {

        $container = $app->getContainer();

        try 
        {
            $servername = $container['settings']['db']['host'];
            $username = $container['settings']['db']['username'];
            $password = $container['settings']['db']['password'];
            $database = $container['settings']['db']['database'];
            $driver = $container['settings']['db']['driver'];

            parent::__construct("$driver:host=$servername;dbname=$database", $username, $password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    public function getClients()
    {
        $query = $this->prepare('SELECT * FROM client');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getClient($id)
    {
        
    }

    public function deleteClient($id)
    {
        
    }

    public function addClient($client)
    {

    }

    public function alterClient($client)
    {

    }
}