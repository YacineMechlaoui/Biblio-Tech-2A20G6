<?php
require '../../config.php';
class PackC
{
    public function listPack()
    {
        $sql='SELECT * FROM pack';
        $db=config::getConnexion();
        try{
            $list=$db->query($sql);
            return $list;
        }
        catch(Exception $e)
        {
            die("Erreur".$e->getMessage());
        }
    }
    public function deletePack($id)
{
    $sql = "DELETE FROM pack WHERE id_pack = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(":id", $id); 

    try {
        $req->execute();
    } catch (Exception $e) {
        die('error:' . $e->getMessage());
    }
} 
function addPack($pack)
{
    $sql='INSERT INTO pack VALUE(NULL, :Nom_p, :Categorie, :prix,:Description)';
    $db=config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute(
        ['Nom_p'=>$pack->getNom_p(),
        'Categorie'=>$pack->getCategorie(),
        'prix'=>$pack->getprix(),
        'Description'=>$pack->getDescription(),
        
    ]);
    }
    catch(Exception $e)
    {
        die("Erreur".$e->getMessage());
    }
}

    
    function showPack($id)
    {
        $sql = "SELECT * from pack where id_pack = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $packs = $query->fetch();
            return $packs;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updatePack($packs, $id_pack)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE pack SET 
                Nom_p = :Nom_p, 
                Categorie = :Categorie, 
                prix = :prix, 
                Description = :Description 
            WHERE id_pack = :id'
        );
        
        
        $query->execute([
            'id' => $id_pack,
            'Nom_p' => $packs->getNom_p(),
            'Categorie' => $packs->getCategorie(),
            'prix' => $packs->getPrix(),
            'Description' => $packs->getDescription(),
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

}
?>