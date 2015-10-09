function testConnexion() {
    AjaxCharge("utilisateur", "GET");
}

function AjaxView(vue) {
    $("#header").empty();
    $("#menu").empty();
    $("#content").empty();
    if (vue != "login.php") {
        $("#header").load("vues/header.php");
        $("#menu").load("vues/menu.php");
    }
    $("#content").load("vues/" + vue);
}

function AjaxCharge(ws, method) {
    $.ajax({
        url: ws,
        method: method
    }).success(function (data) {
        data = JSON.parse(data);
        AjaxView(data.page);
    });
}

function loadLivre(id) {
    if (id != 0) {
        data = {};
        data.id = id;
        $.ajax({
            url: "livre",
            method: "POST",
            data: data
        }).success(function (data) {
            data = JSON.parse(data);
            AfficheLivre(data);
        });
    } else {
        $.ajax({
            url: "livre",
            method: "GET"
        }).success(function (data) {
            AfficheLivres(data);
        });
    }

}

$(document).ajaxStart(function () {
    $('#spinner').css({
        'display': 'block'
    });
});

$(document).ajaxComplete(function () {
    $('#spinner').css({
        'display': 'none'
    });
});

function AfficheLivre(livre) {
    $('#titre').html(livre[0].titre);
    infos = livre[0].infos;
    var star5 = "";
    var star4 = "";
    var star3 = "";
    var star2 = "";
    var star1 = "";

    if (infos.note != null) {
        if (infos.note >= 1) {
            star1 = "active";
        }
        if (infos.note >= 2) {
            star2 = "active";
        }
        if (infos.note >= 3) {
            star3 = "active";
        }
        if (infos.note >= 4) {
            star4 = "active";
        }
        if (infos.note >= 5) {
            star5 = "active";
        }
    }

    var html = "<a class='btn btn-info' onclick='loadLivre(0)'><i class='fa fa-arrow-left'></i>Retour</a>\
        <div class='row livre-info'>\
            <div class='col-md-3' style=\"background:url('" + livre[0].couverture + "') no-repeat; background-size:cover;min-height:200px;\">\
            </div>\
            <div class='col-md-9'>\
            <span class='info'>\
                                    Auteur : <span class='auteur'><i>" + livre[0].auteur + "</i>,</span>\
                                    Editeur : <span class='editeur'><i>" + livre[0].editeur + "</i>,</span>\
                                    Date : <span class='date'><i>" + livre[0].date + "</i></span>\
                                    <div id='star' class='rating rating-fw'>\
                                        <a onclick='star(5," + livre[0].idLivre + ")' class='" + star5 + "' title='Donner 5 étoiles'>☆</a>\n\
                                        <a onclick='star(4," + livre[0].idLivre + ")' class='" + star4 + "' title='Donner 4 étoiles'>☆</a>\n\
                                        <a onclick='star(3," + livre[0].idLivre + ")' class='" + star3 + "' title='Donner 3 étoiles'>☆</a>\n\
                                        <a onclick='star(2," + livre[0].idLivre + ")' class='" + star2 + "' title='Donner 2 étoiles'>☆</a>\n\
                                        <a onclick='star(1," + livre[0].idLivre + ")' class='" + star1 + "' title='Donner 1 étoile'>☆</a>\n\
                                    </div>\
                                </span>\
                                <br/>\
                                <br/>\
                " + livre[0].description + "\
            </div>\
        </div>\
        <div class='row'>\
            <div class='col-md-12'>\
            <audio controls>\
              <source src='./assets/livres/" + livre[0].emplacement + "' type='audio/mpeg'>\
            Your browser does not support the audio element.\
            </audio>\
            </div>\
            <input type='hidden' name='idLivre' value='" + livre[0].idLivre + "'>\
        </div>";
    $('#liste').html(html);
    console.log($('audio'));
    setTimeout(function(){
        $('audio')[0].currentTime = parseInt(infos.time);
    }, 500);
}

function SaveTime() {
    if ($('audio').length != 0) {
        //On va envoyer les infos en BDD
        var time = $('audio')[0].currentTime;
        if (time < 0) {
            time = 0;
        }

        data = {};
        if (time > $('audio')[0].duration - 3) {
            data.etat = 2;
        } else {
            data.etat = 1;
        }
        data.time = time;
        data.idLivre = $('[name=idLivre]').val();
        AjaxMetier("etat", "POST", data);
    }
}

function AjaxMetier(ws, method, data) {
    $.ajax({
        url: ws,
        method: method,
        data: data
    });
}


function AfficheLivres(data) {
    SaveTime();
    $('#titre').html("L'ensemble de nos livres audio");
    data = JSON.parse(data);
    var livres = "";
    $.each(data, function (key, value) {
        var texte = "";
        if (value.infos) {
            if (value.infos.etat == 1 && value.infos.time > 2) {
                texte = "En cours de lecture";
            } else if (value.infos.etat == 2) {
                texte = "Déjà lu";
            }
        }

        livres += '<div class="col-md-6">\
                                <img onclick="loadLivre(' + value.idLivre + ')" class="couverture livre" src="' + value.couverture + '" alt="couverture" />\
                                <h3 class="livre" onclick="loadLivre(' + value.idLivre + ')">' + value.titre + '</h3>\
                                <span class="info">\
                                    Auteur : <span class="auteur"><i>' + value.auteur + '</i>,</span>\
                                    Editeur : <span class="editeur"><i>' + value.editeur + '</i>,</span>\
                                    Date : <span class="date"><i>' + value.date + '</i></span>\
                                </span>\
                                <p class="description">' + value.description + '</p>\
                                <br/>\
                                <div class="rating"><span style="float:left;font-style:italic;font-weight:600;">' + texte + '</span></div>\
                             </div>';
    });
    $('#liste').html(livres);
}

function deconnexion() {
    $.ajax({
        url: "utilisateur",
        method: "PUT"
    }).success(function (data) {
        data = JSON.parse(data);
        AjaxView(data.page);
    });
}

function star(note, idLivre) {
    data = {};
    data.idLivre = idLivre;
    data.note = note;
    data.fonction = "notation";
    $.ajax({
        url: "etat",
        method: "POST",
        data: data
    });

    var star5 = "";
    var star4 = "";
    var star3 = "";
    var star2 = "";
    var star1 = "";

    if (note != null) {
        if (note >= 1) {
            star1 = "active";
        }
        if (note >= 2) {
            star2 = "active";
        }
        if (note >= 3) {
            star3 = "active";
        }
        if (note >= 4) {
            star4 = "active";
        }
        if (note >= 5) {
            star5 = "active";
        }
    }

    var html = "    <a onclick='star(5," + idLivre + ")' class='" + star5 + "' title='Donner 5 étoiles'>☆</a>\n\
                    <a onclick='star(4," + idLivre + ")' class='" + star4 + "' title='Donner 4 étoiles'>☆</a>\n\
                    <a onclick='star(3," + idLivre + ")' class='" + star3 + "' title='Donner 3 étoiles'>☆</a>\n\
                    <a onclick='star(2," + idLivre + ")' class='" + star2 + "' title='Donner 2 étoiles'>☆</a>\n\
                    <a onclick='star(1," + idLivre + ")' class='" + star1 + "' title='Donner 1 étoile'>☆</a>\n\
                "
    $('#star').html(html);
}
