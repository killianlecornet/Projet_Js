<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<?php 
//On apelle la connexion a la base de donnée qui est dans le dossier data
include ("data/connect_data.php");
// On select TOUT  dans classe qui a ['id'] demander ex: la premiere classe a 1 comme id 
$req = $db->prepare('SELECT * FROM classe WHERE id=:num');
// on veux que :num sois egale a IDtable
$req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);
// On execute
$executeIsOk = $req->execute();

$liste = $req->fetch();
// On select TOUT dans la table perso
$req2 = $db->prepare('SELECT * FROM perso');

$req2->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

$executeIsOk2 = $req2->execute();

$liste2 = $req2->fetch();

?>
    <!-- pour récuperer IDtable on la mis dans un hidden pour pas qu'il sois afficher -->
    <input type="hidden"  name="IDtable" value="<?= $liste['id'] ?>">
<div>
   <div>
   <img src="img/barre_vie_mana.png" style="width: 18%;"/> <!-- affichage de la barre de vie -->
   </div>
   <div style="position:absolute;top:-0.6%;left:10%;z-index:2;font-size:90%"><!-- positionnement de la barre d'hp -->
    <p><?= $liste['hp'] ?>/ <?= $liste['hp'] ?></p> 
    </div> 
    <div style="position:absolute;top:2.5%;left:10%;z-index:2;font-size:90%"><!-- positionnement de la barre de mana -->
    <p><?= $liste['mp'] ?>/ <?= $liste['mp'] ?></p>
    </div>
    <div style="position:absolute;top:4.5%;left:10%;z-index:2;font-size:120%;color: tan;text-transform: uppercase;letter-spacing: 1px;"><!-- affichage de la barre du mana -->
    <p><?= $liste2['pseudo'] ?></p>
    </div> 
</div>
<?php 
include ("data/connect_data.php");
// On select TOUT dans la table classe avec id 
$req = $db->prepare('SELECT * FROM classe WHERE id=:num');

$req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

$executeIsOk = $req->execute();

$liste = $req->fetchAll();
?>
<div>
<form class="box-fight" action="" method="" name="login">
<h1 class="box-title">Option de Combat</h1> <!-- choix afficher après avoir cliqué sur "combattre" -->
<!-- grace a cette boucle on affiche tout le temps les skill quelque sois la classe -->
<?php  foreach ($liste as $liste): ?>

<ul style="text-align: center;padding: 0;">
<a href="" class=" btn-btn-fight btn-fight"><?= $liste['skill_1'] ?></a>  <a href="" class="btn-btn-fight btn-fight"><?= $liste['skill_2'] ?></a><br><br><br> <!-- bouton des skills(sorts) -->
<a href="menu.php?IDtable=<?= $liste['id'] ?>" class=" btn-btn-fight btn-fight">FUIR</a> <!-- bouton fuir -->

 <div class="monster"></div> <!--creation du monstre a afficher -->
</ul>
<br>


<?php endforeach ?>
</form>
</div>
    
</body>
</html>