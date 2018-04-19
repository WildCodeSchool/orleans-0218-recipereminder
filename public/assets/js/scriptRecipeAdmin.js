// recherche de recipe dans listRecipe
$('#formSeekRecipe').submit(function (e) {
    e.preventDefault();
});

$('#seekRecipe').keyup(function () {

    // on lance la fonction seulement si au moins 2 lettre dans le input, ou 0
    if($(this).val().length > 2 || $(this).val().length === 0) {
        let recipe = $(this).val();
        $.post("/admin/recipeList/search", {recipe: recipe}).done(function (html) {
            $('#list').html(html);
        });
    }
});