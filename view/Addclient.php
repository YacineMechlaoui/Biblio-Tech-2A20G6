<?php
include '../controller/clientC.php';
include '../model/client.php';
$clientc = new clientC();
if(isset($_POST['nom'])&&
isset($_POST['prenom'])&&
isset($_POST['email'])&&
isset($_POST['telephone'])&&
isset($_POST['mdp'])&&
isset($_POST['adresse'])&&
isset($_POST['cin'])&&
isset($_POST['num_carte'])
)
{
    if(!empty($_POST['nom'])&&
    !empty($_POST['prenom'])&&
    !empty($_POST['email'])&&
    !empty($_POST['telephone'])&&
    !empty($_POST['mdp'])&&
    !empty($_POST['adresse'])&&
    !empty($_POST['cin'])&&
    !empty($_POST['num_carte'])
    )
    {
        $client=new client(NULL,$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['telephone'],$_POST['mdp'],$_POST['adresse'],$_POST['cin'],$_POST['num_carte']);
        var_dump( $client);
        $clientc->addclient($client);
        header('Location:listclient.php');
    }
    else
    echo 'Missing information';
}


?>
<html>
    <body>
        <form action="" method="POST">
            NOM:<input type="text" name="nom">
            PRENOM:<input type="text" name="prenom">
            EMAIL:<input type="text" name="email">
            TEL:<input type="text" name="telephone">
            MOT DE PASSE:<input type="text" name="mdp">
            ADRESSE:<input type="text" name="adresse">
            CIN:<input type="text" name="cin">
            NUMERO DU CARTE BANCAIRE:<input type="text" name="num_carte">
            <input type="submit" value="save">
            <input type="reset" value="annuler" >

        </form>
    </body>

</html>