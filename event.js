function afficherResultat() {
    var titre = document.getElementById("titre").value;
    var lien = document.getElementById("lien").value;
    var image = document.getElementById("image").files[0];
    
    if (titre && lien && image) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var resultatHTML = "<html><head><title>Résultat</title></head><body>" +
                           "<h2 style='font-size: 20px;'>" + titre + "</h2>" +
                           "<img src='" + e.target.result + "' alt='Image uploadée' style='width: 160px; height: 90px;'>" +
                           "<p><a href='" + lien + "'>Lien</a></p>" +
                           "</body></html>";
  
        var nouvelleFenetre = window.open("", "_blank");
        nouvelleFenetre.document.write(resultatHTML);
      };
      reader.readAsDataURL(image);
    } else {
      alert("Veuillez remplir tous les champs du formulaire.");
    }
  }
  
  document.getElementById("envoyerBtn").addEventListener("click", afficherResultat);
