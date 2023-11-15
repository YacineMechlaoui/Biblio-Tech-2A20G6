<?php
require_once('../model/ReclamationModel.php');

$model = new ReclamationModel();

// Reclamation form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $texte = $_POST["texte"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $date = $_POST["date"];

    // Check if fields are not empty
    if (empty($nom) || empty($prenom) || empty($texte) || empty($email) || empty($tel) || empty($date)) {
        $error_message = "Tous les champs sont obligatoires.";
    } else {
        $result = $model->insertReclamation($nom, $prenom, $texte, $email, $tel, $date);

        if ($result === true) {
            $success_message = "Reclamation soumise avec succès!";
        } else {
            $error_message = $result;
        }
    }
}

$model->closeConnection();
?>
