
// recherche de recipe dans listRecipe
$('#formSeekEvent').submit(function (e) {
    e.preventDefault();
});

$('#seekEvent').keyup(function () {

    // on lance la fonction seulement si au moins 2 lettre dans le input, ou 0
    if($(this).val().length > 2 || $(this).val().length === 0) {
        let event = $(this).val();
        $.post("/event/search", {event: event}).done(function (html) {
            $('#list').html(html);
        });
    }
});