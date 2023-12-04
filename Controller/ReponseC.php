<?php

    require_once '..\..\config.php';
    require_once '..\..\Model\Reponse.php';

    class ReponseC {

        function afficher()
        {
            $requete = "select * from reponse";
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
        function afficherbyUser($id)
        {
            $requete = "select * from reponse where id_admin=:id";
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

        function getOneById($id)
        {
            $requete = "select * from reponse where id=:id";
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

        function getOneByRecId($id)
        {
            $requete = "select * from reponse where id_rec=:id";
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

        

        function Ajouter($rep)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO reponse
                (contenu,id_rec,id_admin )
                VALUES
                (:contenu,:id_reclamation,:id_user)
                ');
                
               $rs=$querry->execute([
                    
                    'contenu'=>$rep->getContenu(),
                    'id_reclamation'=>$rep->getId_rec(),
                    'id_user'=>$rep->getId_admin()
                  
                   
                    
                   
                ]);
                if ($rs) {
                    echo " Response Created";
                }
                else {
                    echo "ERROR";
                }
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function Modifier($rep)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE reponse SET
                contenu=:contenu,id_rec=:id_reclamation,id_admin=:id_user
                where id=:id');
                
                $querry->execute([
                    'id'=>$rep->getId(),
                    'contenu'=>$rep->getContenu(),
                    'id_reclamation'=>$rep->getId_rec(),
                    'id_user'=>$rep->getId_admin()
                    

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function Supprimer($id)
        {
            $sql="DELETE FROM reponse WHERE id= :id";
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

      
  

        
      

    }