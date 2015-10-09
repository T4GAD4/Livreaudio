function testConnexion() {
    AjaxCharge("utilisateur", "GET");
}


function ChargeUser(){
    var livres = "";
    var etoile = "";
    $.ajax({
        url: "utilisateur",
        method: "PUT"
    }).success(function (data) {
        data = JSON.parse(data);
        $("#content").load("vues/user.php");
        $.each(data, function (key, value) {
            var texte = "";
            if (value.etat == 1 && value.time > 0) {
                texte = "En cours de lecture";
            } else if (value.etat == 2) {
                texte = "Déjà lu";
            } else if (value.note != null) {
                etoile = " ☆ "+value.note;
            }

            livres += '<div class="col-md-6 searchable" data-search="' + value.titre + ' ' + value.auteur + ' ' + value.editeur + ' ' + texte + '">\
                                    <img onclick="livres(' + value.idLivre + ')" class="couverture livre" src="' + value.couverture + '" alt="couverture" />\
                                    <h3 class="livre" onclick="loadLivre(' + value.idLivre + ')">' + value.titre + '</h3>\
                                    <br/>\
                                    <div class="rating"><span style="float:left;font-style:italic;font-weight:600;">' + texte +' '+etoile+'</span></div>\
                                 </div>';
        });
        setTimeout(function(){$('#meslivres').append(livres);},500);
    });
}