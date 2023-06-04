$(document).ready(function(){
    var $carrousel = $('#carrousel') ; //cible le bloc du carrousel
    $img = $('#carrousel img') ; //cible les images dans carousel
    indexImg = $img.length - 1 ; //index du dernier element donc egal a longueur de $img - 1
    i = 0 ;// initialisation d'un compteur
    $currentImg = $img.eq(i); //initialisation d'une image courrante avec l'index i
    $img.css('display', 'none'); // on cache les images
    $currentImg.css('display', 'block'); //affichage des images courrantes
    $carrousel.append('<div class="controls"> <span class="prev">Precedent</span> <span class="next">Suivant</span> </div>');
    $('.next').click(function(){ // image suivante 
        i++; // on incrémente le compteur 
        if( i <= indexImg ){ 
            $img.css('display', 'none'); // on cache les images 
            $currentImg = $img.eq(i); // on définit la nouvelle image 
            $currentImg.fadeIn(); // puis on l'affiche 
        } 
        else{ 
            i = 0; 
            $img.css('display', 'none'); // on cache les images 
            $currentImg = $img.eq(i); // on définit la nouvelle image 
            $currentImg.fadeIn(); // puis on l'affiche 
        }
    }); 
    $('.prev').click(function(){ // image précédente 
        i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante" 
        if( i >= 0 ){ 
            $img.css('display', 'none'); 
            $currentImg = $img.eq(i); 
            $currentImg.fadeIn();
        } 
        else{ 
            i = indexImg; 
            $img.css('display', 'none'); 
            $currentImg = $img.eq(i); 
            $currentImg.fadeIn();
        }
    });
    function slideImg(){//fonction qui fait défiler les images toutes les 4 secondes
        setTimeout(function(){ // on utilise une fonction anonyme
            if (i < indexImg){ // si le compteur est inférieur au dernier index
                i++; //incrémentation
            }
            else { //on reprend à la première image
                i = 0;
            }
            $img.css('display', 'none'); 
            $currentImg = $img.eq(i);
            $currentImg.fadeIn();
            slideImg();//récursivité pour que la fonction se répète
        }, 3000); // intervalle de 3 secondes
    }
    
   slideImg();
  });