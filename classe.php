<?php require("inc/header.inc.php"); ?>

    <body>

        <?php

        //On apelle la connexion a la base de donnée qui est dans le dossier data avec l'élément require pour être sûr de l'obtenir
        require("data/connect_data.php");
        
        // On select TOUT dans la table classe 
        $req = $db->prepare('SELECT * FROM classe');
        $executeIsOk = $req->execute();
        //Lorsqu'on execute on demande un fetchAll pour que ça affiche tout le contenu de cette table
        $liste = $req->fetchAll();

        ?>
        <form class="box" action="" method="" name="login">
            <h1 class="box-title">Choisir la classe</h1>
            <!-- petite boucle pour afficher toutes les classes avec un petit href pour aller dans le menu -->
            <?php foreach ($liste as $liste): ?>

                <ul>
                    <a href="menu.php?IDtable=<?= $liste['id'] ?>" class="btn btn-success">
                        <?= $liste['nom_classe'] ?>
                    </a>
                </ul>
                <br>

            <?php endforeach ?>
        </form>

    </body>
</html>