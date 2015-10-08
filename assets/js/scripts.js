function testConnexion() {
    AjaxCharge("utilisateur","GET");
}

function AjaxView(vue){
     $("#header").empty();
     $("#menu").empty();
     $("#content").empty();
    if(vue != "login.php"){
        $("#header").load("vues/header.php");
        $("#menu").load("vues/menu.php");
    }
    $("#content").load("vues/"+vue);
}

function AjaxCharge(ws,method){
     $.ajax({
        url: ws,
        method: method
    }).success(function (data) {
        data = JSON.parse(data);
        AjaxView(data.page);
    });
}

function loadLivre(id){
    $('#liste').empty();
    if(id != 0){
        data = {};
        data.id = id;
         $.ajax({
            url: "livre",
            method: "POST",
            data : data
        }).success(function (data) {
            data = JSON.parse(data);
            AfficheLivre(data);
        });
    }else{
        $.ajax({
            url: "livre",
            method: "GET"
        }).success(function (data) {
            AfficheLivres(data);
        });
    }
    
}

function AfficheLivre(livre){
    var html = "<a class='btn btn-info' onclick='loadLivre(0)'><i class='fa fa-arrow-left'></i>Retour</a>\n\
<div class='row'>\n\
<div class='col-md-3'>\n\
<img src='"+livre[0].couverture+"'/></div>\n\
<div class='col-md-9'>"+livre[0].description+"</div>\n\
</div>\n\
<div class='row'>\n\
<div class='col-md-12'>\n\
<audio controls>\n\
  <source src='./assets/livres/"+livre[0].emplacement+"' type='audio/mpeg'>\n\
Your browser does not support the audio element.\n\
</audio>\n\
</div>\n\
</div>";
    $('#liste').append(html);
}

function AfficheLivres(data){  
    data = JSON.parse(data);
    var livres = "";
    $.each(data, function(key,value){
            livres += '<div class="col-md-6 livre" onclick="loadLivre('+value.idLivre+')">\n\
                                <img class="couverture" src="'+value.couverture+'" alt="couverture" />\n\
                                <h3>'+value.titre+'</h3>\n\
                                <span class="info">\n\
                                    Auteur : <span class="auteur"><i>'+value.auteur+'</i>,</span>\n\
                                    Editeur : <span class="editeur"><i>'+value.editeur+'</i>,</span>\n\
                                    Date : <span class="date"><i>'+value.date+'</i></span>\n\
                                </span>\n\
                                <p class="description">'+value.description+'</p>\n\
                                <br/>\n\
<div class="rating"><a href="#5" title="Donner 5 étoiles">☆</a><a href="#4" title="Donner 4 étoiles">☆</a><a href="#3" title="Donner 3 étoiles">☆</a><a href="#2" title="Donner 2 étoiles">☆</a><a href="#1" title="Donner 1 étoile">☆</a></div>\n\
                             </div>';
        });
        $('#liste').append(livres);
}

function deconnexion(){
    $.ajax({
        url: "utilisateur",
        method: "PUT"
    }).success(function (data) {
        data = JSON.parse(data);
        AjaxView(data.page);
    });
}
