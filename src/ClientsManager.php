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

    // DEBUG FUNCTION
    function wipe()
    {
        $queryA = $this->prepare("DELETE FROM client");

        $queryA->execute();

        $query = $this->prepare("INSERT INTO client (id, prenom, nom, telephone)
        VALUES  (1,'Bryan','Binet','0624563146')
              , (2,'Corentin','Derimay','0645789425') 
              , (3,'Florian','Aurousseau','0798463249') 
              , (4,'Robbin','Freville','0654234578') 
              , (5,'Robin','Zmuda','0234578965') 
              , (6,'Jimmy','Trespalle','032145785') 
              , (7,'Esteban','Loubatiere','0789453246') 
              , (8,'Theophile','Hesters','0632489756') 
              , (9,'Theo','Bertrand','0645289437') 
              , (10,'Antoine','Sanson','0642789425') 
              , (11,'Axel','Dardat','0645789425') 
              , (12,'Mathias','Morel','0789425368') 
              , (13,'Leo','Laurent','0147532259') 
              , (14,'Yann','Claudon','0457812249') 
              , (15,'Nicolas','Breugnot','0314758944') 
              , (16,'Maxime','Michel','0611442579') 
              , (17,'Romain','Aoulini','0245789543') 
              , (18,'Nicolas','Thomas','0642155796') 
              , (19,'Dimitry','Vincent','0642115789') 
              , (20,'Joris','Texier','0245778966') ");

        $query->execute();
    }

    public function getClients()
    {
        try {
            $query = $this->prepare('SELECT * FROM client');
            $query->execute();
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }

        return json_encode($query->fetchAll(PDO::FETCH_OBJ));
    }

    public function getClient($id)
    {
        try {
            $query = $this->prepare('SELECT * FROM client WHERE id='.$id);
            $query->execute();
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }

        return json_encode($query->fetch(PDO::FETCH_OBJ));
    }

    public function deleteClient($id)
    {
        $this->wipe();

        try {
            $query = $this->prepare('DELETE FROM client WHERE id='.$id);
            $query->execute();
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }

        return '{message: "success"}';
    }

    public function addClient(stdClass $client)
    {
        $this->wipe();

        try {
            $query = $this->prepare('INSERT INTO CLIENT VALUES 
            ('.$client->id.',
            "'.$client->nom.'",
            "'.$client->prenom.'",
            "'.$client->telephone.'")');
    
            $query->execute();
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }
    }

    public function alterClient(stdClass $client)
    {
        $this->wipe();

        try {
            $query = $this->prepare('UPDATE CLIENT 
            SET nom='.$client['nom'].',
                prenom='.$client['prenom'].',
                telephone='.$client['telephone'].
            'WHERE id='.$client['id']);
    
            $query->execute();
    
            return json_encode($query->fetchAll(PDO::FETCH_OBJ));
        }
        catch(PDOException $e) {
            return "{message: ".$e->getMessage()."}";
        }
    }
}