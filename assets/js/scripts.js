function testConnexion() {
    $.ajax({
        url: "utilisateur",
        method: "GET"
    }).success(function (data) {
        data = JSON.parse(data);
        AjaxView(data.page);
    });
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

function deconnexion(){
    $.ajax({
        url: "utilisateur",
        method: "PUT"
    }).success(function (data) {
        data = JSON.parse(data);
        AjaxView(data.page);
    });
}