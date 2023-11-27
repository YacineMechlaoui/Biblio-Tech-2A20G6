<?php
include '../../controller/PackController.php';
$p=new PackC();

$p->deletePack($_GET['idd']);
header('Location:pack-list.php');

?>