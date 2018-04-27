// recherche de recettes à associer à un événement dans la modale.
$('#formFindRecipe').submit(function (e) {
    e.preventDefault();
});

$('#findRecipe').keyup(function () {
    // on lance la fonction seulement si au moins 2 lettres dans le input, ou 0
    if($(this).val().length > 2 || $(this).val().length === 0) {
        sendForm();
    }
});

$('#categoryId').change(function(){
    sendForm();
});

function sendForm(){
    let form = $('#formFindRecipe');

    // on sérialize les données pour envoyer tout le contenu du formulaire en POST
    $.post("/admin/event/searchRecipeToLink", form.serialize()).done(function (html) {// ('url de l'action , tous le contenu du form)
        $('#list').html(html);
    });
}

sendForm();

$('#myModal1').on('hidden.bs.modal', function (e) {
    window.location.reload();
});