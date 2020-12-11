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

$req2 = $db->prepare('SELECT * FROM perso');

$req2->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

$executeIsOk2 = $req2->execute();

$liste2 = $req2->fetch();

?>
    <input type="hidden"  name="IDtable" value="<?= $liste['id'] ?>">
<div>
   <div>
   <img src="img/barre_vie_mana.png" style="width: 18%;"/>
   </div>
   <div style="position:absolute;top:-0.6%;left:10%;z-index:2;font-size:90%">
    <p><?= $liste['hp'] ?> / <?= $liste['max_hp'] ?></p>
    </div> 
    <div style="position:absolute;top:2.5%;left:10%;z-index:2;font-size:90%">
    <p><?= $liste['mp'] ?> / <?= $liste['max_mp'] ?></p>
    </div>
    <div style="position:absolute;top:4.5%;left:10%;z-index:2;font-size:120%;color: tan;text-transform: uppercase;letter-spacing: 1px;">
    <p><?= $liste2['pseudo'] ?></p>
    </div> 
</div>
<div>
    <div>
    <img src="img/newstats.PNG" style="width: 18%;margin-top:0 auto;margin-left: 82.3%;"/>
    </div>
    <div style="position:absolute;top:9%;left:89%;z-index:2;font-size:125%;color: white;text-transform: uppercase;letter-spacing: 1px;">
    <p><?= $liste['nom_classe'] ?></p>
    </div> 
    <div style="position:absolute;top:17.5%;left:89%;z-index:2;font-size:150%;color: grey;">
    <p><?= $liste['atk'] ?></p>
    </div> 
    <div style="position:absolute;top:25.5%;left:89%;z-index:2;font-size:150%;color: grey;">
    <p><?= $liste['hp'] ?> / <?= $liste['max_hp']?></p>
    </div> 
    <div style="position:absolute;top:33.5%;left:89%;z-index:2;font-size:150%;color: grey;">
    <p><?= $liste['mp'] ?> / <?= $liste['max_mp']?></p>
    </div>
    <div style="position:absolute;top:41.5%;left:89%;z-index:2;font-size:150%;color: grey;">
    <p><?= $liste['def'] ?></p>
    </div>
    <div style="position:absolute;top:49.5%;left:89%;z-index:2;font-size:130%;color: grey;">
    <p><?= $liste['esquive'] ?></p>
    </div>
    <div style="position:absolute;top:57.5%;left:89%;z-index:2;font-size:150%;color: grey;">
    <p><?= $liste['vitesse'] ?></p>
    </div>
    <div style="position:absolute;top:65%;left:89%;z-index:2;font-size:160%;color: grey;">
    <p><?= $liste['skill_1'] ?>, <?= $liste['skill_2'] ?></p>
    </div> 
</div>
<div class="box2"></div> 
        <script type=""> // deplacement en javascript du personnage principal(avec les fleches directionnelles)
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

        <?php
            $ok = $liste['id'];
            $pdo = new PDO("mysql:host=localhost;dbname=rpg_js", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));


            if (!empty($_POST)) {

                
                $requeteSQL = "INSERT INTO message (messages) VALUES ('$_POST[messages]')"; 
                $result = $pdo->exec($requeteSQL); 

                if (isset($_POST['upload'])) {

                    header("Location: combat.php?IDtable=$ok");
                }

                if (isset($_POST['upload2'])) {

                    $req = $db->prepare('DELETE FROM message');
                    $executeIsOk = $req->execute();
                    header("Location: menu.php?IDtable=$ok");
                    
                }

            }
            ?>

            <div class="">  
                <form method="POST" action="" enctype='multipart/form-data'>   <!-- Permet aux personnes de télécharger à la fois du texte et des fichiers -->

                    <div class="">
                        <input type="hidden" class="" id="messages" name="messages" value="Vous êtes entrez dans une zone de combat">
                    </div>
                <div>
                </div>

                    <button  name="upload" type="submit" class="btn-btn-outline-dark" id="OK">Combattre !</button>

                </form>
            </div>

    <div class="button_container">
                <button id="button_modal" onclick="openModal()" style="position: absolute;top: 10.5%;width: 17.95%;background-color: red;border: 0;color: white;height: 4%;"> Stats</button>
    </div>
    <div id="modal" style="width: 30%;height: 60%;background-color: white;position: absolute;text-align: center;top: -900px;margin-left:33%">
            <h1>Statistiques : <?= $liste['nom_classe'] ?></p></h1>
            <div style="font-size:110%;color: black;">
                <p>Skill 1: <?= $liste['skill_1'] ?></p>
                <p>Skill 2: <?= $liste['skill_2'] ?></p>
                <p>ATK : <?= $liste['atk'] ?></p>
                <p>HP : <?= $liste['hp'] ?> / <?= $liste['max_hp']?></p> 
                <p>MP : <?= $liste['mp'] ?> / <?= $liste['max_mp']?></p>
                <p>DEF : <?= $liste['def'] ?></p>
                <p>ESQ :<?= $liste['esquive'] ?></p>
                <p>VIT :<?= $liste['vitesse'] ?></p>
            </div> 
            <form method="POST" action="" enctype='multipart/form-data'>
                <input type="hidden" class="" id="messages" name="messages" value="Vous avez regardé vos stats">
                <button type="submit" id="close" onclick="closeModal()">Fermer</button>
            </form>
    </div>

    <script src="js/app.js" type="text/Javascript"></script>
 <!-- Définition d'un item dans le localstorage pour un test -->

    <script> 
        localStorage.setItem("Pseudo du joueur", "<?= $liste2['pseudo'] ?>");
        localStorage.setItem("Classe du personnage", "<?= $liste['nom_classe'] ?>");
        localStorage.setItem("Points de Vie", "<?= $liste['hp']?> / <?= $liste['max_hp'] ?>");
        localStorage.setItem("Points de Mana", "<?= $liste['mp']?> / <?=$liste['max_mp']?>");
        localStorage.setItem("Attaque", "<?= $liste['atk'] ?>");
        localStorage.setItem("Défense", "<?= $liste['def'] ?>");
        localStorage.setItem("Esquive", "<?= $liste['esquive'] ?>");
        localStorage.setItem("Vitesse", "<?= $liste['vitesse'] ?>");
    </script>
<div style="position: absolute;top: 50%;background-color: black;color: white;width: 14%;text-align: center;">
<?php 
        $pdo = new PDO("mysql:host=localhost;dbname=rpg_js", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

              $result = $pdo->query("SELECT * FROM message"); 
              while ($message = $result->fetch(PDO::FETCH_OBJ)) { ?>
              
                  <div><b><?php echo $message->messages ; ?></b></div>
                
                  
            <?php } ?>

            <form method="POST" action="" enctype='multipart/form-data'>
              
                <button type="submit" id="close" name="upload2" >Supp LOG</button>

            </form>



</div>
 
</body>
</html>