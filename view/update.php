<?php

include '../controller/clientC.php';
include '../model/client.php';
$error = "";

// create client
$client = null;
// create an instance of the controller
$clientC = new clientC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["mdp"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["cin"]) &&
    isset($_POST["num_carte"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["mdp"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["cin"]) &&
        !empty($_POST["num_carte"])   
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $client = new client(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['mdp'],
            $_POST['adresse'],
            $_POST['cin'],
            $_POST['num_carte']
        );
        var_dump($client);
        
        $clientC->updateclient($client, $_POST['id_client']);

        header('Location:listclient.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listclient.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_client'])) {
        $client = $clientC->showclient($_POST['id_client']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="nom">Idclient :</label></td>
                    <td>
                        <input type="text" id="idclient" name="idclient" value="<?php echo $_POST['id_client'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $client['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $client['prenom'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $client['email'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="telephone">Téléphone :</label></td>
                    <td>
                        <input type="text" id="telephone" name="tel" value="<?php echo $client['telephone'] ?>" />
                        <span id="erreurTelephone" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="mdp">mot de passe :</label></td>
                    <td>
                        <input type="text" id="mdp" name="mdp" value="<?php echo $client['mdp'] ?>" />
                        <span id="erreurmotdepasse" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="adresse">adresse :</label></td>
                    <td>
                        <input type="text" id="adresse" name="adresse" value="<?php echo $client['adresse'] ?>" />
                        <span id="erreuradresse" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="cin">CIN :</label></td>
                    <td>
                        <input type="text" id="cin" name="cin" value="<?php echo $client['cin'] ?>" />
                        <span id="erreurcin" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="num_carte">numero du carte bancaire :</label></td>
                    <td>
                        <input type="text" id="num_carte" name="num_carte" value="<?php echo $client['num_carte'] ?>" />
                        <span id="erreurnum_carte" style="color: red"></span>
                    </td>
                </tr>



                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>