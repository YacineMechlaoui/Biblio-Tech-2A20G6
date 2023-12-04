<?php 
include '../../Controller/ReclamationC.php';

require_once '../../model/Reclamation.php';
session_start();
if(isset($_GET['id']))
{
    $recC = new ReclamationC();
    $recC->SupprimerRec($_GET['id']);
    header('Location:Rec_index.php');
}
?>