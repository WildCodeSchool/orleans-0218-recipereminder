
// recherche de recipe dans listRecipe
$('#formSeekRecipe').submit(function (e) {
    e.preventDefault();
});

$('#seekRecipe').keyup(function () {
    let recipe = $(this).val();
    $.post("/recipe/search", { recipe: recipe }).done(function (html) {
        $('#list').html(html);
    });
});