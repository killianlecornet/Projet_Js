<?php
include ("data/connect_data.php");

$req = $db->prepare('UPDATE perso SET pseudo=:pseudo');


$req->bindValue(':pseudo', $_POST['pseudo'],PDO::PARAM_STR);


$executeIsOk = $req->execute();

if($executeIsOk){
    header("Location: classe.php");
}

?>