var page = 1;
url = window.location.href;
$(document).ready(function(){

    var category_id = url.split('category_id=')[1];
    if(category_id) {
        $("#category li[data-index='1']").removeClass();
        $("#category li[data-index='0']").attr("style", "top:"+ category_id*40 + "px");
        $("#category li[data-index='"+ category_id +"']").addClass('current');
    }

    $("#searchtxt").bind("input propertychange",function(event){
        $.ajax({
            url: '/search',
            type: "POST",
            data: {
                content : $("#searchtxt").val(),
            },
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        }).done(function(data) {
            if(data.html == "") {
                $(".search-result li").remove();
                return;
            }

            $(".search-result").css('display', 'block');
            $(".search-result li").remove();
            $(".search-result").append(data.html);
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('服务器未响应');
        });
    });

    if (/(iPhone|iPad|iPod|iOS|Android)/i.test(navigator.userAgent)) { //移动端
        $("#LAY_bloglist").append("<div class='layui-flow-more' id='more'><a onclick='loadAndoridData()'><cite>加载更多</cite></a></div>");
    } else {
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height() ) {
                page++;
                loadMoreData(page);
            }
        });
    }
});

function loadMoreData(page) {
    url.indexOf('?') !== -1 ? url+="&page=" + page : url+="?page=" + page;

    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function() {
            $('.ajax-load').show();
        }
    }).done(function(data) {
        if(data.html == "") {
            return;
        }
        $('.ajax-load').hide();
        $("#LAY_bloglist").append(data.html);
        if(/(iPhone|iPad|iPod|iOS|Android)/i.test(navigator.userAgent)) { //移动端
            if(!document.getElementById('nothing')) {
                $("#LAY_bloglist").append("<div class='layui-flow-more' id='more'><a onclick='loadAndoridData()'><cite>加载更多</cite></a></div>");
            }
        }
    }).fail(function(jqXHR, ajaxOptions, thrownError) {
        alert('服务器未响应');
    });
}

function loadAndoridData() {
    page++;
    $("#more").remove();
    loadMoreData(page);
}
