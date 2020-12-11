<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>RPG_JavaScript</title>
</head>

<body>

    <?php 
    include ("data/connect_data.php");
        
    $req = $db->prepare('SELECT * FROM classe');
    $executeIsOk = $req->execute();
    $liste = $req->fetchAll();

    ?>

    <form class="box" action="" method="" name="login">
        <h1 class="box-title">
            Choisir la classe
        </h1>

        <?php  foreach ($liste as $liste): ?>

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