<?php

require '../config.php';

class clientC
{

    public function listclient()
    {
        $sql= "SELECT * FROM client";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteclient($ide)
    {
        $sql= "DELETE FROM client WHERE id_client = :idd";
        $db = config::getconnexion();
        $req = $db->prepare($sql);
        $req->bindValue("idd",$ide);//pour faire la correction

        try
        {
            $req->execute();
        }catch (Exception $e){
            die("Erreur".$e->getMessage());
        }


    }
    function addclient($client)
    {
        $sql = "INSERT INTO client VALUES (NULL, :nom,:prenom, :email,:tel,:mdp,:adresse,:cin,:num_carte)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'email' => $client->getEmail(),
                'tel' => $client->getTel(),
                'mdp' => $client->getmdp(),
                'adresse' => $client->getadresse(),
                'cin' => $client->getcin(),
                'num_carte' => $client->getnum_carte()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showclient($id_client)
    {
        $sql = "SELECT * from client where id_client = $id_client";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateclient($client, $id_client)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE client SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    email = :email, 
                    telephone = :tel
                    mdp = :mdp,
                    adresse = :adresse,
                    cin = :cin,
                    num_carte = :numcarte
                WHERE id_client= :idclient'
            );
            
            $query->execute([
                'id_client' => $id,
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'email' => $client->getEmail(),
                'telephone' => $client->getTel(),
                'mdp' => $client->getmdp(),
                'adresse' => $client->getadresse(),
                'cin' => $client->getcin(),
                'num_carte' => $client->getnum_carte(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>