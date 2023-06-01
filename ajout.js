var events = [];

function ajouterEvent() {
  var titre = document.getElementById("titre").value;
  var lien = document.getElementById("lien").value;
  var image = document.getElementById("image").files[0];
  
  if (titre && lien && image) {
    var reader = new FileReader();
    reader.onload = function(e) {
      var event = {
        titre: titre,
        lien: lien,
        image: e.target.result
      };
      events.push(event);
      
      document.getElementById("titre").value = "";
      document.getElementById("lien").value = "";
      document.getElementById("image").value = "";
    };
    reader.readAsDataURL(image);
  } else {
    alert("Veuillez remplir tous les champs du formulaire.");
  }
}

function afficherEvents() {
  var resultatHTML = "<html><head><title>Événements</title>" +
                     "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>" +
                     "</head><body>" +
                     "<div class='container'>";

  for (var i = 0; i < events.length; i++) {
    var event = events[i];
    resultatHTML += "<div class='row'>" +
                    "<div class='col-md-4'>" +
                    "<h2>" + event.titre + "</h2>" +
                    "<img src='" + event.image + "' alt='Image uploadée' class='img-fluid'>" +
                    "<p><a href='" + event.lien + "' class='btn btn-primary'>Lien</a></p>" +
                    "</div>" +
                    "</div>";
  }

  resultatHTML += "<button onclick='window.close()' class='btn btn-secondary'>Retour</button>" +
                  "</div></body></html>";

  var nouvelleFenetre = window.open("", "_blank");
  nouvelleFenetre.document.write(resultatHTML);
}

document.getElementById("ajouterBtn").addEventListener("click", ajouterEvent);
document.getElementById("afficherBtn").addEventListener("click", afficherEvents);
