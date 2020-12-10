<?php
include ("data/connect_data.php");
$req = $db->prepare('SELECT hp FROM classe WHERE id=:num');

$req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

$_POST['hp'] - 50;


$req = $db->prepare('UPDATE classe SET hp=:hp WHERE id=:num');


$req->bindValue(':hp', $_POST['hp'],PDO::PARAM_STR);
$req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);


$req->execute();


?>