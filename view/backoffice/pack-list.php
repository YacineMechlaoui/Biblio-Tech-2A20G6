<?php
include '../../controller/PackController.php';
$p=new PackC();
$tab=$p->listPack();


?>

<center><h1>Packs list</h1>
<h1><a href="add-pack.php">Add a Pack</h1></center>
<table border="1" width="70%" align="center">
    <tr>
<th>IDPack</th>
<th>Nom_p</th>
<th>Categorie</th>
<th>prix</th>
<th>Description</th>

</tr>
<?php
foreach ($tab as $pack)
{
?>
<tr><td><?php echo $pack['id_pack']?> </td>
<td><?=  $pack['Nom_p'] ?></td>
<td><?=  $pack['Categorie']?> </td>
<td><?= $pack['prix'] ?></td>
<td><?=  $pack['Description'] ?></td>
<td align="center">
                <form method="POST" action="updatepack.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $pack['id_pack']; ?> name="id">
                </form>
            </td>
<td><a href="delete-Pack.php?idd=<?php echo $pack['id_pack'];?>">delete</td>

<?php }?>

</table>
