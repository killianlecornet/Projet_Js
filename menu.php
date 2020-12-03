<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src= "https://code.jquery.com/jquery-1.12.4.min.js"> 
    <title>Document</title>
    
    </script>
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
<div>
   <div>
   <img src="img/statss.PNG" style="width: 18%;margin-top: 10%;margin-left: 82.3%;"/>
   </div>
   <div style="position:absolute;top:35.5%;left:89%;z-index:2;font-size:200%">
    <p><?= $liste['hp'] ?></p>
    </div> 
    <div style="position:absolute;top:45%;left:89%;z-index:2;font-size:200%">
    <p><?= $liste['atk'] ?></p>
    </div> 
    <div style="position:absolute;top:54.5%;left:89%;z-index:2;font-size:200%">
    <p><?= $liste['mp'] ?></p>
    </div> 
</div>
<div class="box2"></div> 
        <script type=""> 
            $(document).keydown(function(e) { 
                if (e.which == '38') { //haut
                    $(".box2").finish().animate({ 
                        top: "-=30" 
                    }); 
                } 
            }); 
            $(document).keydown(function(e) { 
                if (e.which == '40') { //descendre 
                    $(".box2").finish().animate({ 
                        top: "+=30" 
                    }); 
                } 
            }); 
            $(document).keydown(function(e) { 
                if (e.which == '37') { //gauche 
                    $(".box2").finish().animate({ 
                        left: "-=30" 
                    }); 
                } 
            });
            $(document).keydown(function(e) { 
                if (e.which == '39') { //droite 
                    $(".box2").finish().animate({ 
                        left: "+=30" 
                    }); 
                } 
            });
        </script> 
</body>
</html>