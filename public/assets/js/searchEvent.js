
// recherche de recipe dans listRecipe
$('#formSeekEvent').submit(function (e) {
    e.preventDefault();
});

$('#event').keyup(function () {
    // on lance la fonction seulement si au moins 2 lettre dans le input, ou 0
    if($(this).val().length > 2 || $(this).val().length === 0) {
        $('#page').val(0);
        searchEvent(true);
    }
});

$('#dateStart').change(function(){
    //on vérifie que la date de fin est renseignée
    if($('#dateEnd').val()!= ''){
        $('#page').val(0);
        searchEvent(true);
    }
});

$('#dateEnd').change(function(){
    //on vérifie que la date de début est renseignée
    if($('#dateStart').val()!= ''){
        $('#page').val(0);
        searchEvent(true);

    }
});

function searchEvent(reset=false){
    let form = $('#formSeekEvent');
    let page = parseInt($('#page').val());
    $.post("/event/search", form.serialize()).done(function (html) {
        if(reset === false) {
            console.log('ef');
            $('#list').append(html);
        }else{
            $('#list').html(html);
        }

        $('#page').val(page+1);
    });
}

infiniteScroll();
searchEvent();

function infiniteScroll(){
    // on initialise ajaxready à true au premier chargement de la fonction
    $(window).data('ajaxready', true);
    let deviceAgent = navigator.userAgent.toLowerCase();
    let agentID = deviceAgent.match(/(iphone|ipod|ipad)/);

    $(window).scroll(function() {
        // On teste si ajaxready vaut false, auquel cas on stoppe la fonction
        if ($(window).data('ajaxready') == false) return;

        if(($(window).scrollTop() + $(window).height()) == $(document).height()
            || agentID && ($(window).scrollTop() + $(window).height()) + 200 > $(document).height()) {
            // lorsqu'on commence un traitement, on met ajaxready à false
            $(window).data('ajaxready', false);
            searchEvent();
            $(window).data('ajaxready', true);
        }
    });
}