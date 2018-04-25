
$('.linkBtn').click(function(){
    let recipeId = $(this).attr('data-recipeId');
    let eventId = $('#list').attr('data-eventId');

    $.post("/admin/event/linkRecipeToEvent", {recipeId:recipeId,eventId:eventId}).done(function (html) {// ('url de l'action , tous le contenu du form)
        console.log(html);
    });
});
