var page = 1;
url = window.location.href;
$(document).ready(function(){
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height() ) {
            page++;
            loadMoreData(page);
        }
    });
});

function loadMoreData(page) {

    $.ajax({
        url: "?page=" + page,
        type: "GET",
        beforeSend: function() {
            $('.ajax-load').show();
        }
    }).done(function(data) {
        if(data.html == "") {
            return;
        }
        console.log(data);
        $('.ajax-load').hide();
        $("#message-list").append(data.html);
    }).fail(function(jqXHR, ajaxOptions, thrownError) {
        alert('服务器未响应');
    });
}
