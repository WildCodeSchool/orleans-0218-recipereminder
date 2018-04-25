
// recherche de recipe dans listRecipe
$('#formSeekEvent').submit(function (e) {
    e.preventDefault();
});

$('#event').keyup(function () {

    // on lance la fonction seulement si au moins 2 lettre dans le input, ou 0
    if($(this).val().length > 2 || $(this).val().length === 0) {
       searchEvent();

    }
});

$('#dateStart').change(function(){
    //on vérifie que la date de fin est renseignée
    if($('#dateEnd').val()!= ''){
        searchEvent();
    }
});

$('#dateEnd').change(function(){
    //on vérifie que la date de début est renseignée
    if($('#dateStart').val()!= ''){
        searchEvent();
    }
});

function searchEvent(){
    let form = $(formSeekEvent);
    $.post("/event/search", form.serialize()).done(function (html) {
        $('#list').html(html);
    });
}