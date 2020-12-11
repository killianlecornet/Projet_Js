<?php
include ("data/connect_data.php");

$req = $db->prepare('UPDATE perso SET pseudo=:pseudo');//on modifie perso grace au set pseudo=:pseudo 


$req->bindValue(':pseudo', $_POST['pseudo'],PDO::PARAM_STR);// on veux que :pseudo sois egale a pseudo(récuper dans le form de index.php)


$executeIsOk = $req->execute();

if($executeIsOk){//Lorsque tout est bon cela redirige directement a classe.php
    header("Location: classe.php");
}

?>