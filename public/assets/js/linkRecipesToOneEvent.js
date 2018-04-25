
$('.linkBtn').click(function(){
    let recipeId = $(this).attr('data-recipeId');
    let eventId = $('#list').attr('data-eventId');
    let success = $('<p class="success"><span class="glyphicon glyphicon-thumbs-up"></span> <strong>Cette recette est maintenant liée à l\'événement !</strong></p>')
    success.insertAfter($(this));
    $(this).hide();
    $.post("/admin/event/linkRecipeToEvent", {recipeId:recipeId,eventId:eventId}).done(function (html) {// ('url de l'action , tous le contenu du form)
        console.log(html);
    });
});
