<?php require("inc/header.inc.php"); ?>

<body>

    <?php 

        /*#######################################################################
        ############### Connexion et requête SQL vers la BDD ####################
        #########################################################################*/

        // On apelle la connexion a la base de donnée qui est dans le dossier data
        require ("data/connect_data.php");

        // On select TOUT  dans classe qui a ['id'] demander ex: la premiere classe a 1 comme id 
        $req = $db->prepare('SELECT * FROM classe WHERE id=:num');

        // on veux que :num sois egale a IDtable
        $req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

        // On execute la requête SQL
        $executeIsOk = $req->execute();

        $liste = $req->fetch();

        // On select TOUT dans la table perso
        $req2 = $db->prepare('SELECT * FROM perso');

        $req2->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

        $executeIsOk2 = $req2->execute();

        $liste2 = $req2->fetch();

    ?>

    <?php 

        // On select TOUT dans la table classe avec id 
        $req = $db->prepare('SELECT * FROM classe WHERE id=:num');

        $req->bindValue(':num',$_GET['IDtable'],PDO::PARAM_INT);

        $executeIsOk = $req->execute();

        $liste = $req->fetchAll();
    ?>

    <!-- ####################################################################
    ####################### Affichage sur la page ###########################
    ######################################################################### -->

    <!-- affichage de la barre d'état en l'appelant grâce au fichier barre_vie_perso.inc.php -->
    <?php require ("inc/barre_vie_perso.inc.php"); ?>

    <div>
        <form class="box-fight" action="" method="" name="login">
            <h1 class="box-title">Option de Combat</h1> <!-- choix afficher après avoir cliqué sur "combattre" -->
            
            <!-- grace a cette boucle on affiche tout le temps les skills quelque sois la classe -->
            <?php  foreach ($liste as $liste): ?>

                <ul style="text-align: center;padding: 0;">
                    <a href="" class=" btn-btn-fight btn-fight">
                        <?= $liste['skill_1'] ?>
                    </a>  
                    <a href="" class="btn-btn-fight btn-fight">
                        <?= $liste['skill_2'] ?>
                    </a>
                    <!-- bouton des skills(sorts) -->
                    
                    <br>
                    <br>
                    <br> 
                    
                    <a href="menu.php?IDtable=<?= $liste['id'] ?>" class=" btn-btn-fight btn-fight">
                        FUIR
                    </a> 
                    <!-- bouton fuir -->

                    <div class="monster">
                        <!--creation du monstre a afficher -->
                    </div>
                </ul>
                <br>

            <?php endforeach ?>
        </form>

    </div>
    
</body>
</html>