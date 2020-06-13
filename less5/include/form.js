$(document).ready(function() {
    $('form').submit(function(event) {
        var json;
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                json = jQuery.parseJSON(result);
                if (json.url) {
                    window.location.href = json.url;
                }else if(json.type == 'delete' && json.message == 'yes'){
                    $('body').load('/gallery.php');
                }else if(json.type == 'upload') {
                    $('#info').html(json.message);
                }
            },
        });
    });
});