<?php require("inc/header.inc.php"); ?>

<?php

/*#######################################################################
############### Connexion et requête SQL vers la BDD ####################
#########################################################################*/

require ("data/connect_data.php");
//on modifie perso grace au set pseudo=:pseudo 
$req = $db->prepare('UPDATE perso SET pseudo=:pseudo');

// on veux que :pseudo sois egale a pseudo(récuper dans le form de index.php)
$req->bindValue(':pseudo', $_POST['pseudo'],PDO::PARAM_STR);

$executeIsOk = $req->execute();
//Lorsque tout est bon cela redirige directement a classe.php
if($executeIsOk){
    header("Location: classe.php");
}

?>