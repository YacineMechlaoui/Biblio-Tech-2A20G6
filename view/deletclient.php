<?php
include '../controller/clientC.php';
$c= new clientC();

$c->deleteclient($_GET ['idd']);
header ('Location:listclient.php');


?>