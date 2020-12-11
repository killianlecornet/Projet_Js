<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
</head>
<body>

<?php 
//On apelle la connexion a la base de donnée qui est dans le dossier data
include ("data/connect_data.php");
//On select TOUT de la table perso
$req = $db->prepare('SELECT * FROM perso');
$executeIsOk = $req->execute();
$liste = $req->fetch();

?>

<!-- Cette form sert a faire un update lorsqu'on appuie sur le bouton on va etre rediriger sur la page modif.php grace a la methode POST ET ACTION="modif.php" -->
<form class="box" action="modif.php" method="post" name="login" enctype="multipart/form-data">
  
    
        
        <h1 class="box-title">Création du compte</h1>
        <input type="text" name="pseudo" class="box-input"  id="exampleFormControlInput1 pseudo" value="<?= $liste['pseudo'] ?>">

   
    <p><input type="submit" class="box-button" value="Suivant"></p>
</form>

</body>
</html>