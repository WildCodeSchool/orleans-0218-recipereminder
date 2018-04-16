
// recherche de recipe dans listRecipe
$('#formSeekRecipe').submit(function(e){
    e.preventDefault();
});

$('#seekRecipe').keyup(function(){
    let recipe = $(this).val();
    //console.log(recipe);
    $.post( "/recipe/search", { recipe: recipe }).done(function(html){
        $('#list').html(html);
    });
});