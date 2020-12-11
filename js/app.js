function openModal() {
    document.getElementById("modal").style.top = "150px";
}

function closeModal() {
    document.getElementById("modal").style.top = "-900px";
}

// Définition d'un compteur qui compte le nombre de visites sur la page

// Détection si le localStorage existe ou non
if(typeof localStorage!='undefined') {
    // Récupération de l'item visites
    var nbvisites = localStorage.getItem('Visites sur le site');
    // Vérification de la présence du compteur
    if(nbvisites!=null) {
        // Si oui, on convertit en nombre entier la chaîne de texte qui fut stockée
        nbvisites = parseInt(nbvisites);
    } else {
        nbvisites = 1;
    }
    // Incrémentation du compteur
    nbvisites++;
    // Stockage à nouveau dans le localStorage en attendant la prochaine visite...
    localStorage.setItem('Visites sur le site',nbvisites);
    } else {
    //Affichage d'une fenêtre pop-up si le localStorage ne fonctionne pas sur ce navigateur
        alert("localStorage n'est pas supporté");
    }

// Les autres éléments du local Storage définis en JavaScript sont situés dans le menu.php avec la balise <script>