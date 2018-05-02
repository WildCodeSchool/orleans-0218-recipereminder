$('.updateCategory').click(function(){
    let categoryId = $(this).attr('data-categoryId');
    let categoryName = $(this).attr('data-categoryName');

    $('#categoryIdToUpdate').val(categoryId);
    $('#newName').val(categoryName);
});

$('.deleteCategory').click(function(){
    let categoryId = $(this).attr('data-categoryId');
    let categoryName = $(this).attr('data-categoryName');
    $('#deleteName').text(categoryName);
    $('#categoryIdToDelete').val(categoryId);

    // On doit chercher si des recettes sont liés à la catégorie
    $.post('/admin/category/countRecipe',{categoryId : categoryId}).done(function(nbRecipe){
        console.log(nbRecipe);
        if(nbRecipe > 0){
            $('#nbRecipe').text('il existe '+nbRecipe+' recette encore associée à cette catégorie.');
        }
       else {
            $('#nbRecipe').text('Aucune recette associé à cette catégorie');
        }
    });
});