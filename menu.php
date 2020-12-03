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
include ("data/connect_data.php");
$req = $db->prepare('SELECT * FROM classe WHERE id=:num');

$req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

$executeIsOk = $req->execute();

$liste = $req->fetch();

?>
    <input type="hidden"  name="IDtable" value="<?= $liste['id'] ?>">
<div>
   <div>
   <img src="img/barre_vie_mana.png" style="width: 18%;"/>
   </div>
   <div style="position:absolute;top:0%;left:10%;z-index:2;font-size:100%">
    <p><?= $liste['hp'] ?>/ <?= $liste['hp'] ?></p>
    </div> 
    <div style="position:absolute;top:2.75%;left:10%;z-index:2;font-size:100%">
    <p><?= $liste['mp'] ?>/ <?= $liste['mp'] ?></p>
    </div> 
</div>
    
</body>
</html>