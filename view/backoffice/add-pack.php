<?php
include '../../controller/PackController.php';
include '../../model/Pack.php';
$PackC= new PackC();
if(
isset($_POST['Nom_p'])&&
isset($_POST['Categorie'])&&
isset($_POST['prix'])&&
isset($_POST['Description']))

{
    if(!empty($_POST['Nom_p'])&&
        !empty($_POST['Categorie'])&&
        !empty($_POST['prix'])&&
        !empty($_POST['Description'])

    )
{
$pack=new pack(NULL,$_POST['Nom_p'],$_POST['Categorie'],$_POST['prix'],$_POST['Description']);
$PackC->addPack($pack);
header('Location:pack-list.php');
}
else
echo'Missing information';
}
?>
<html>
    <body>
        <form action="" method="POST">
            Nom_p:<input type="text" name="Nom_p">
            Categorie:<input type="text" name="Categorie">
            Prix:<input type="text" name="prix">
            Description:<input type="text" name="Description">

          
<input type="submit" value="save">
<input type="reset" value="annuler">
        </form>
    </body>
</html>