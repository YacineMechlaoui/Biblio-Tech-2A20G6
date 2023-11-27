<?php
include '../../controller/PackController.php';
include '../../model/Pack.php';
$error = "";
$PackC = new PackC();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $id_pack = isset($_POST['id_pack']) ? $_POST['id_pack'] : null;
    $Nom_p = isset($_POST['Nom_p']) ? $_POST['Nom_p'] : null;
    $Categorie = isset($_POST['Categorie']) ? $_POST['Categorie'] : null;
    $prix = isset($_POST['prix']) ? $_POST['prix'] : null;
    $Description = isset($_POST['Description']) ? $_POST['Description'] : null;

    
    if ($id_pack !== null && $Nom_p !== null && $Categorie !== null && $prix !== null && $Description !== null) {
        
        $pack = new Pack($id_pack, $Nom_p, $Categorie, $prix, $Description);

        
        $packController = new PackC(); 
        $updateSuccess = $packController->updatePack($pack, $id_pack); 

       
        if ($updateSuccess) {
           
            header('Location: pack-list.php');
            exit();
        } else {
          
            echo "La mise à jour a échoué.";
           
        }
    } else {
       
        echo "Veuillez remplir tous les champs.";
        
    }
} else {
   
    echo "Erreur : Le formulaire n'a pas été soumis.";
    
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pack</title>
</head>
<body>
    <button><a href="pack-list.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_pack'])) {
    ?>

<form action="" method="POST">
        <input type="hidden" name="id_pack" value="<?php echo $pack->getid_pack(); ?>">
        
        <label for="Nom_p">Nom du Pack :</label>
        <input type="text" id="Nom_p" name="Nom_p" value="<?php echo $pack->getNom_p(); ?>"><br><br>
        
        <label for="Categorie">Catégorie :</label>
        <input type="text" id="Categorie" name="Categorie" value="<?php echo $pack->getCategorie(); ?>"><br><br>
        
        <label for="prix">Prix :</label>
        <input type="text" id="prix" name="prix" value="<?php echo $pack->getPrix(); ?>"><br><br>
        
        <label for="Description">Description :</label>
        <textarea id="Description" name="Description"><?php echo $pack->getDescription(); ?></textarea><br><br>
        
        <input type="submit" value="Mettre à jour">
    </form>
    <?php
    }
    ?>
</body>
</html>
