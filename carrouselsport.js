$(document).ready(function(){
    var $carrousel = $('#carrousel') ; //cible le bloc du carrousel
    $img = $('#carrousel img') ; //cible les images dans carousel
    indexImg = $img.length - 1 ; //index du dernier element donc egal a longueur de $img - 1
    i = 0 ;// initialisation d'un compteur
    $currentImg = $img.eq(i); //initialisation d'une image courrante avec l'index i
    $img.css('display', 'none'); // on cache les images
    $currentImg.css('display', 'block'); //affichage des images courrantes

    function slideImg(){//fonction qui fait défiler les images toutes les 4 secondes
        setTimeout(function(){ // on utilise une fonction anonyme
            if (i < indexImg){ // si le compteur est inférieur au dernier index
                i++; //incrémentation
            }
            else { //on reprend à la première image
                i = 0;
            }
            $img.fadeOut();
            $currentImg = $img.eq(i);
            $currentImg.fadeIn();
            slideImg();//récursivité pour que la fonction se répète
        }, 3000); // intervalle de 3 secondes
    }
    
   slideImg();
});
