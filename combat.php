<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>RPG_JavaScript</title>
</head>

<body>

    <?php

    include ("data/connect_data.php");//On apelle la connexion a la base de donnée qui est dans le dossier data
    $req = $db->prepare('SELECT * FROM classe WHERE id=:num');// On select TOUT  dans classe qui a ['id'] demander ex: la premiere classe a 1 comme id 

    $req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);// on veux que :num sois egale a IDtable

    $executeIsOk = $req->execute();// On execute

    $liste = $req->fetch();

    $req2 = $db->prepare('SELECT * FROM perso');// On select TOUT dans la table perso

    $req2->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

    $executeIsOk2 = $req2->execute();

    $liste2 = $req2->fetch();

    ?>

    <input type="hidden"  name="IDtable" value="<?= $liste['id'] ?>"><!-- pour récuperer IDtable on la mis dans un hidden pour pas qu'il sois afficher -->
    <div>

        <div>
            <img src="img/barre_vie_mana.png" style="width: 18%;"/> <!-- affichage de la barre de vie -->
        </div>

        <div style="position:absolute;top:-0.6%;left:10%;z-index:2;font-size:90%"><!-- positionnement de la barre d'hp -->
            <p>
                <?= $liste['hp'] ?>/ <?= $liste['hp'] ?>
            </p> 
        </div> 
        <div style="position:absolute;top:2.5%;left:10%;z-index:2;font-size:90%"><!-- positionnement de la barre de mana -->
            <p>
                <?= $liste['mp'] ?>/ <?= $liste['mp'] ?>
            </p>
        </div>
        <div style="position:absolute;top:4.5%;left:10%;z-index:2;font-size:120%;color: tan;text-transform: uppercase;letter-spacing: 1px;"><!-- affichage de la barre du mana -->
            <p>
                <?= $liste2['pseudo'] ?>
            </p>
        </div> 
    </div>

    <?php 

    include ("data/connect_data.php");
    $req = $db->prepare('SELECT * FROM classe WHERE id=:num');// On select TOUT dans la table classe avec id

    $req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

    $executeIsOk = $req->execute();

    $liste = $req->fetchAll();
    
    ?>


    <div>
        <form class="box-fight" action="" method="" name="login">
            <h1 class="box-title"><!-- choix afficher après avoir cliqué sur "combattre" -->
                Option de Combat
            </h1> <!-- choix afficher après avoir cliqué sur "combattre" -->
            
            <?php  foreach ($liste as $liste): ?>

                <ul style="text-align: center;padding: 0;">
                    <a href="" class=" btn-btn-fight btn-fight">
                        <?= $liste['skill_1'] ?>
                    </a>  
                    <a href="" class="btn-btn-fight btn-fight">
                        <?= $liste['skill_2'] ?>
                    </a>
                    
                    <br>
                    <br>
                    <br> <!-- bouton des skills(sorts) -->

                    <a href="menu.php?IDtable=<?= $liste['id'] ?>" class=" btn-btn-fight btn-fight">
                        FUIR
                    </a> <!-- bouton fuir -->

                    <div class="monster"></div> <!--creation du monstre a afficher -->
                </ul>
                <br>

            <?php endforeach ?>
        </form>
    </div>
    
</body>
</html>