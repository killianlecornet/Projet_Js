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
//On se connect a la BDD
include ("data/connect_data.php");
//On select TOUT  de la table classe avec son id pour afficher hp/atk/def etc
$req = $db->prepare('SELECT * FROM classe WHERE id=:num');

$req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

$executeIsOk = $req->execute();

$liste = $req->fetch();
//On select TOUT  dans la table perso pour afficher le pseudo
$req2 = $db->prepare('SELECT * FROM perso');

$req2->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

$executeIsOk2 = $req2->execute();

$liste2 = $req2->fetch();

?>
<!-- pour récuperer IDtable on la mis dans un hidden pour pas qu'il sois afficher -->
    <input type="hidden"  name="IDtable" value="<?= $liste['id'] ?>">
<div>
   <div><!-- Ici on affiche la barre de vie avec les stats qui sont dedans  -->
   <img src="img/barre_vie_mana.png" style="width: 18%;"/>  <!--  La barre de vie (img fait sur paint) -->
   </div>
   <div style="position:absolute;top:-0.6%;left:10%;z-index:2;font-size:90%"> <!-- Les hp et les hp max  -->
    <p><?= $liste['hp'] ?> / <?= $liste['max_hp'] ?></p> <!-- on recup les valeurs dans la table classe  -->
    </div> 
    <div style="position:absolute;top:2.5%;left:10%;z-index:2;font-size:90%"> <!-- Les mp et les mp max  -->
    <p><?= $liste['mp'] ?> / <?= $liste['max_mp'] ?></p> <!-- on recup les valeurs dans la table classe  -->
    </div>
    <div style="position:absolute;top:4.5%;left:10%;z-index:2;font-size:120%;color: tan;text-transform: uppercase;letter-spacing: 1px;"> <!-- Le pseudo  -->
    <p><?= $liste2['pseudo'] ?></p> <!-- on recup les valeurs dans la table perso  -->
    </div> 
</div>
<div>
    <div>
    <img src="img/newstats.PNG" style="width: 18%;margin-top:0 auto;margin-left: 82.3%;"/> <!-- Les stats (img faut sur paint)  -->
    </div>
    <div style="position:absolute;top:9%;left:89%;z-index:2;font-size:125%;color: white;text-transform: uppercase;letter-spacing: 1px;"> <!-- Le pseudo  -->
    <p><?= $liste['nom_classe'] ?></p> <!-- on recup les valeurs dans la table classe  -->
    </div> 
    <div style="position:absolute;top:17.5%;left:89%;z-index:2;font-size:150%;color: grey;"> <!-- L'attaque  -->
    <p><?= $liste['atk'] ?></p> <!-- on recup les valeurs dans la table classe  -->
    </div> 
    <div style="position:absolute;top:25.5%;left:89%;z-index:2;font-size:150%;color: grey;"> <!-- Les hp  -->
    <p><?= $liste['hp'] ?> / <?= $liste['max_hp']?></p> <!-- on recup les valeurs dans la table classe  -->
    </div> 
    <div style="position:absolute;top:33.5%;left:89%;z-index:2;font-size:150%;color: grey;"> <!-- Les mp  -->
    <p><?= $liste['mp'] ?> / <?= $liste['max_mp']?></p> <!-- on recup les valeurs dans la table classe  -->
    </div>
    <div style="position:absolute;top:41.5%;left:89%;z-index:2;font-size:150%;color: grey;"> <!-- La def  -->
    <p><?= $liste['def'] ?></p> <!-- on recup les valeurs dans la table classe  -->
    </div>
    <div style="position:absolute;top:49.5%;left:89%;z-index:2;font-size:130%;color: grey;"><!-- L'esquive  -->
    <p><?= $liste['esquive'] ?></p> <!-- on recup les valeurs dans la table classe  -->
    </div>
    <div style="position:absolute;top:57.5%;left:89%;z-index:2;font-size:150%;color: grey;"><!-- La vitesse  -->
    <p><?= $liste['vitesse'] ?></p> <!-- on recup les valeurs dans la table classe  -->
    </div>
    <div style="position:absolute;top:65%;left:89%;z-index:2;font-size:160%;color: grey;"><!-- Les 2 skills  -->
    <p><?= $liste['skill_1'] ?>, <?= $liste['skill_2'] ?></p> <!-- on recup les valeurs dans la table classe  -->
    </div> 
</div>
<div class="box2"></div> 
        <script type=""> // deplacement en JAVASCRIPT du personnage principal(avec les fleches directionnelles)
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
            // on veux stoker la valeur de id dans $ok pour pouvoir l utiliser lors du header("Location:");
            $ok = $liste['id'];
            //on se connect a la base de donnée
            $pdo = new PDO("mysql:host=localhost;dbname=rpg_js", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            // Si il y a un post (lorsqu on appuie sur un boutton dans un form avec la methode post)
            if (!empty($_POST)) {

                //on ajoute dans la table on ajoute messageS dans la table message 
                $requeteSQL = "INSERT INTO message (messages) VALUES ('$_POST[messages]')"; 
                $result = $pdo->exec($requeteSQL); 
                // si on appuie sur le bouton qui a un name="upload" alors sa fait le header("Location: combat.php?IDtable=$ok");
                if (isset($_POST['upload'])) {

                    header("Location: combat.php?IDtable=$ok");
                }
                // meme chose que au dessus mais la avec upload2
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
                    <!-- c'est le message qui sera mit dans la table messages -->
                        <input type="hidden" class="" id="messages" name="messages" value="Vous êtes entrez dans une zone de combat">
                    </div>
                <div>
                </div>
                    <!-- comme expliquer au dessus grace au name="upload" on va execute le if -->
                    <button  name="upload" type="submit" class="btn-btn-outline-dark" id="OK">Combattre !</button>

                </form>
            </div>

    <div class="button_container">
                <!-- bouton qui permet de faire aparaitre le pop up grace au onclick qui apelle la fonction openModal qui est dans app.js -->
                <button id="button_modal" onclick="openModal()" style="position: absolute;top: 10.5%;width: 17.95%;background-color: red;border: 0;color: white;height: 4%;"> Stats</button>
    </div><!-- Tout ce qui a dans cette div sert a mettre les valeurs qui sont dans la table classe dans la pop up -->
    <div id="modal" style="width: 30%;height: 60%;background-color: white;position: absolute;text-align: center;top: -900px;margin-left:33%">
            <h1>Statistiques : <?= $liste['nom_classe'] ?></p></h1>
            <div style="font-size:110%;color: black;">
                <p>Skill 1: <?= $liste['skill_1'] ?></p> <!-- le skill 1  -->
                <p>Skill 2: <?= $liste['skill_2'] ?></p> <!-- le skill 2  -->
                <p>ATK : <?= $liste['atk'] ?></p> <!-- l'attaque  -->
                <p>HP : <?= $liste['hp'] ?> / <?= $liste['max_hp']?></p> <!-- les hp  -->
                <p>MP : <?= $liste['mp'] ?> / <?= $liste['max_mp']?></p> <!-- les mp  -->
                <p>DEF : <?= $liste['def'] ?></p> <!-- la def  -->
                <p>ESQ :<?= $liste['esquive'] ?></p> <!-- l'esquive'  -->
                <p>VIT :<?= $liste['vitesse'] ?></p> <!-- la vitesse  -->
            </div> 
            <form method="POST" action="" enctype='multipart/form-data'> <!-- Ce form sert a fermer la popo up grace a la fonction closeModal  -->
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

    <!-- cette div sert a faire les log   -->
<div style="position: absolute;top: 50%;background-color: black;color: white;width: 14%;text-align: center;">
<?php 
        //on se connect a la base donnée
        $pdo = new PDO("mysql:host=localhost;dbname=rpg_js", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                // On select tout de la table message 
              $result = $pdo->query("SELECT * FROM message"); 
              //on fait une boucle pour qu'a chaque fois qu on a de nouvelle action elles se mettent a la suite
              while ($message = $result->fetch(PDO::FETCH_OBJ)) { ?>
              
                  <div><b><?php echo $message->messages ; ?></b></div>
                
                  
            <?php } ?>
                <!-- ce form permet d'effacer les logs grace au name=upluad2  -->
            <form method="POST" action="" enctype='multipart/form-data'>
              
                <button type="submit" id="close" name="upload2" >Supp LOG</button>

            </form>



</div>
 
</body>
</html>