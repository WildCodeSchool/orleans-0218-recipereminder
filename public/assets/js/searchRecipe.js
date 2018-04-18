
// recherche de recipe dans listRecipe
$('#formSeekRecipe').submit(function (e) {
    e.preventDefault();
});

$('#name').keyup(function () {
    // on lance la fonction seulement si au moins 2 lettre dans le input, ou 0
    if($(this).val().length > 2 || $(this).val().length === 0) {
        sendForm();
    }
});

$('#categoryId').change(function(){
   sendForm();
});

function sendForm(){
    let form = $('#formSeekRecipe');

    $.post("/recipe/search", form.serialize()).done(function (html) {
        $('#list').html(html);
    });
}