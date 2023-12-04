<?php

    require_once '..\..\config.php';
    require_once '..\..\Model\Reclamation.php';

    class ReclamationC {

        function afficherRec()
        {
            $requete = "select * from reclamation";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                //$result = $querry->fetchAll(PDO::FETCH_COLUMN, 1);
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function afficherRecByUser($id)
        {
            $requete = "select * from reclamation where id_user=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function getRecById($id)
        {
            $requete = "select * from reclamation where id=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        

        function AjouterRec($rec)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO reclamation
                (titre,type,description ,etat, id_user )
                VALUES
                (:titre,:type,:description,:etat,:id_client)
                ');
                
               $rs=$querry->execute([
                    
                    'titre'=>$rec->getTitre(),
                    'description'=>$rec->getDescription(),
                    'type'=>$rec->getType(),
                    'etat'=>$rec->getEtat(),
                    'id_client'=>$rec->getId_user()
                   
                    
                   
                ]);
                if ($rs) {
                    echo "Reclamation Created";
                }
                else {
                    echo "ERROR";
                }
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ModifierRec($rec)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE reclamation SET
                titre=:titre,description=:description,type=:type,etat=:etat,id_user=:id_client
                where id=:id');
                
                $querry->execute([
                    'id'=>$rec->getId(),
                    'titre'=>$rec->getTitre(),
                    'description'=>$rec->getDescription(),
                    'type'=>$rec->getType(),
                    'etat'=>$rec->getEtat(),
                    'id_client'=>$rec->getId_user()
                    

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function SupprimerRec($id)
        {
            $sql="DELETE FROM reclamation WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }
       
        function Recherche($search)
        {
            $requete = "select * from reclamation  WHERE titre LIKE '%$search%'";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
  

        
      

    }