$('.linkBtn').click(function () {
    let eventId = $(this).attr('data-eventId');
    let recipeId = $('#list').attr('data-recipeId');
    let success = $('<p class="success"><span class="glyphicon glyphicon-thumbs-up"></span> <strong>Cet événement est maintenant lié à la recette !</strong></p>')
    success.insertAfter($(this));
    $(this).hide();
    $.post("/admin/event/linkRecipeToEvent", {recipeId: recipeId, eventId: eventId}).done(function (html) {// ('url de l'action , tout le contenu du form)
        console.log(html);
    });
});
