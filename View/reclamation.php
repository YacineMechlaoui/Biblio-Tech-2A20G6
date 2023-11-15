<!DOCTYPE html>
<html>
<head>
    <title>Contactez -nous en cas de r&eacute;clamation</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header class="container">
        <h2><img src="logo.jpg"  width="50" height="50"> BIBLIO-TECH</h2>
    </header>
    <div class="container">
        <div class="part">
            <img src="fache.jpg" alt="Trulli" width="300" height="230" style="padding: 10%;">
            <h1>>Toujours à l’ecoute de vos demande</h1>
        </div>
        <div class="part">
            <h1>Contactez -nous en cas de r&eacute;clamation</h1>
            <form action="../controller/ReclamationController.php" method="post">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Pr&eacute;nom" required>
                <textarea name="texte" placeholder="Texte (commentaire)" rows="4" required></textarea>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="tel" placeholder="T&eacute;l&eacute;phone" required>
                <input type="date" name="date" placeholder="Date de demande" required>
                <input type="submit" value="Soumettre">
            </form>
        </div>
    </div>
    <footer class="container">
        <h2><img src="logo.jpg"  width="50" height="50" > BIBLIO-TECH</h2>
    </footer>
</body>
</html>
