// recherche de recettes à associer à un événement dans la modale.
$('#formFindRecipe').submit(function (e) {
    e.preventDefault();
});

$('#findRecipe').keyup(function () {
    // on lance la fonction seulement si au moins 2 lettre dans le input, ou 0
    if($(this).val().length > 2 || $(this).val().length === 0) {
        let recipe = $(this).val();
        $.post("/admin/event/searchRecipeToLink", {recipe: recipe}).done(function (html) {
            $('#list').html(html);
        });
    }
});