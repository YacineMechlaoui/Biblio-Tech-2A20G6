<?php
include '../controller/clientC.php';
$c= new clientC();
$tab=$c->listclient();


?>

<center><h1>Liste client</h1></center>
<h1><a href="Addclient.php">addclient</h1>
<table border="1" width="70%" align="center">
    <tr>
<th>IDclient</th>
<th>nom</th>
<th>prenom</th>
<th>Email</th>
<th>tel</th>
<th>mdp</th>
<th>adresse</th>
<th>cin</th>
<th>num carte bank</th>
</tr>
<?php
foreach ($tab as $client)
{
?>
<tr><td><?php echo $client['id_client'] ?></td>
<td><?= $client['nom'] ?></td>
<td><?= $client['prenom'] ?></td>
<td><?= $client['email'] ?></td>
<td><?= $client['telephone'] ?></td>
<td><?= $client['mdp'] ?></td>
<td><?= $client['adresse'] ?></td>
<td><?= $client['cin'] ?></td>
<td><?= $client['num_carte'] ?></td>
<td align="center">
                <form method="POST" action="update.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $client['id_client']; ?> name="id_client">
                </form>
            </td>
<td><a href="deletclient.php?idd=<?php echo $client['id_client'];?>">delete</td>

<?php }?>

</table>