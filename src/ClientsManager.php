<?php

use Slim\App;

class Client {}

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
        try 
        {
            $query = $this->prepare('SELECT * FROM client');
            $query->execute();

            return json_encode($query->fetchAll(PDO::FETCH_OBJ));
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }
    }

    public function getClient($id)
    {
        try 
        {
            $query = $this->prepare('SELECT * FROM client WHERE id='.$id);
            $query->execute();

            return json_encode($query->fetch(PDO::FETCH_OBJ));
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }
    }

    public function deleteClient($id)
    {
        try {
            $query = $this->prepare('DELETE FROM client WHERE id='.$id);
            $query->execute();

            return '{message: "success"}';
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }
    }

    public function addClient(array $client)
    {
        try {
            $query = $this->prepare('INSERT INTO CLIENT VALUES 
            ('.(isset($client['id']) ? $client['id'] : "").',
            "'.(isset($client['nom']) ? $client['nom'] : "").'",
            "'.(isset($client['prenom']) ? $client['prenom'] : "").'",
            "'.(isset($client['telephone']) ? $client['telephone'] : "").'")');
    
            $query->execute();
            
            return '{message: "success"}';
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }
    }

    public function alterClient(int $id, array $client)
    {
        try {
            $query = $this->prepare('UPDATE CLIENT 
            SET nom="'.(isset($client['nom']) ? $client['nom'] : "").'",
                prenom="'.(isset($client['prenom']) ? $client['prenom'] : "").'",
                telephone="'.(isset($client['telephone']) ? $client['telephone'] : "").'"
                WHERE id='.$id);
    
            $query->execute();
    
            return '{message: "success"}';
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }
    }
}