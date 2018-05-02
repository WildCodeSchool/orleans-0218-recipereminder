$('body').on('focus', '[contenteditable]', function() {
    var $this = $(this);
    $this.data('before', $this.html());
    return $this;
}).on('blur paste', '[contenteditable]', function() {
    var $this = $(this);
    if ($this.data('before') !== $this.html()) {
        $this.data('lastText',$this.data('before'));
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
    $this=$(this);
    let catchPhrase = $this.text();
    if (catchPhrase !== ''){
        $.post('/admin/changeCatchPhrase',{catchPhrase: catchPhrase});
    }
    else{
        $this.text($this.data('lastText'));
    }

});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});