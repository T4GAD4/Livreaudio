
$(document).ready(function () {
    

});

function AjaxVue(nomVue,block){
    $.post("")
    .success(function(data){
        console.log(JSON.parse(data.result));

        //Si on est connecte, on affiche le header connecté
        //Si on est pas connecte, on affiche le header déconnecté
    });
    
}