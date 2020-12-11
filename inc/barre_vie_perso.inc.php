<!-- pour récuperer IDtable on la mis dans un hidden pour pas qu'il ne soit affiché -->
    
<input type="hidden"  name="IDtable" value="<?= $liste['id'] ?>"><div>

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