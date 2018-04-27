$('body').on('focus', '[contenteditable]', function() {
    var $this = $(this);
    $this.data('before', $this.html());
    return $this;
}).on('blur paste', '[contenteditable]', function() {
    var $this = $(this);
    if ($this.data('before') !== $this.html()) {
        $this.data('before', $this.html());
        $this.trigger('change');
    }
    return $this;
});

$('body *[contenteditable]').keydown(function(e) {
    // trap the return key being pressed
    if (e.keyCode === 13) {
        // prevent the default behaviour of return key pressed
        return false;
    }
});

$('#catchPhrase').change(function(){
    let catchPhrase = $(this).text();
    $.post('/admin/changeCatchPhrase',{catchPhrase: catchPhrase});
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});