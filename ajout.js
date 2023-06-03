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

      afficherEvents();
    };
    reader.readAsDataURL(image);
  } else {
    alert("Veuillez remplir tous les champs du formulaire.");
  }
}

function afficherEvents() {
  var eventsContainer = document.getElementById("eventsContainer");
  eventsContainer.innerHTML = "";

  for (var i = 0; i < events.length; i++) {
    var event = events[i];

    var eventElement = document.createElement("div");
    eventElement.className = "row";
    eventElement.innerHTML = `
      <div class="col-md-4">
        <h2 style='font-size: 12px;'>${event.titre}</h2>
        <img src="${event.image}" alt="Image uploadée" style='width: 160px; height: 90px;' class="img-fluid">
        <p><a href="${event.lien}" class="btn btn-primary">Lien</a></p>
      </div>
    `;

    eventsContainer.appendChild(eventElement);
  }
}

document.getElementById("ajouterBtn").addEventListener("click", ajouterEvent);
document.getElementById("afficherBtn").addEventListener("click", afficherEvents);
