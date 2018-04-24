// recherche de recipe dans listRecipe
$('#formSeekRecipe').submit(function (e) {
    e.preventDefault();
});

$('#name').keyup(function () {
    // on lance la fonction seulement si au moins 2 lettre dans le input, ou 0
    if($(this).val().length > 2 || $(this).val().length === 0) {
        $('#page').val(0);
        sendForm(true);
    }
});

$('#categoryId').change(function(){
    $('#page').val(0);
   sendForm(true);
});

function sendForm(reset = false){
    let form = $('#formSeekRecipe');
    let page = parseInt($('#page').val());

    // on sérialize les données pour envoyer tout le contenu du formulaire en POST
    $.post("/recipe/search", form.serialize()).done(function (html) {// ('url de l'action , tous le contenu du form)
        if(reset === false) {
            let contentList = $('#list').html();
            $('#list').html(contentList + html);
        }else{
            $('#list').html(html);
        }
        $('#page').val(page+1);
    });
}

sendForm();// on lance la recherche dès le premier chargement de la page
infiniteScroll();

function infiniteScroll(){
    // on initialise ajaxready à true au premier chargement de la fonction
    $(window).data('ajaxready', true);
    let deviceAgent = navigator.userAgent.toLowerCase();
    let agentID = deviceAgent.match(/(iphone|ipod|ipad)/);

    $(window).scroll(function() {
        // On teste si ajaxready vaut false, auquel cas on stoppe la fonction
        if ($(window).data('ajaxready') == false) return;

        if(($(window).scrollTop() + $(window).height()) == $(document).height()
            || agentID && ($(window).scrollTop() + $(window).height()) + 150 > $(document).height()) {
            // lorsqu'on commence un traitement, on met ajaxready à false
            $(window).data('ajaxready', false);
            sendForm();
            $(window).data('ajaxready', true);
        }
    });
}