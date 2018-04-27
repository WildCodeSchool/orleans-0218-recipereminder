$('.updateCategory').click(function(){
    let categoryId = $(this).attr('data-categoryId');
    let categoryName = $(this).attr('data-categoryName');

    $('#categoryIdToUpdate').val(categoryId);
    $('#newName').val(categoryName);
});