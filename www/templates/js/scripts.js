
OpenComment = function (val) {
    cur_parent = $(val).parent();
    cur_form = cur_parent.children('.form_comment');
    icon = $(val).children('i');
    if (cur_form.hasClass("hidden")) {
        cur_form.removeClass("hidden");
        icon.addClass("fa-angle-down");
        icon.removeClass("fa-angle-right");
    }
    else {
        cur_form.addClass("hidden");
        icon.removeClass("fa-angle-down");
        icon.addClass("fa-angle-right");
    }
}

$(document).ready(function () {

    var page;
    var param = location.
    search.
    slice(location.search.indexOf('?')+1).
    split('&');

    var result = [];
    for(var i = 0; i < param.length;i++) {
        var res = param[i].split('=');
        result[res[0]] = res[1];
    }

    if(result['page']) {
        page = result['page'];
    }
    else {
        page = 1;
    }

    var block = false;
    $(window).scroll(function () {

        if($(window).height() + $(window).scrollTop() >= $(document).height() && !block) {
            block = true;
            $(".load").fadeIn(500, function () {
                page++;
                $.ajax({
                    url:"/messages/allajax/",
                    type:"GET",
                    data:"page="+page+"&move=1",
                    success:function(html) {
                        if(html) {
                            $(html).appendTo($("#message_container")).hide().fadeIn(1000);
                        }
                        $(".load").fadeOut(500);
                        block = false;
                    }
                });
            });
        }
    });
});

empty_form = function (curElement) {
    cur_form = $(curElement);
    group = cur_form.children('.enter_text_group');
    text_area = group.children('.col-md-12').children('.enter_text');
    if(text_area.val() == '')
    {
        alert('Вы не ввели текст.');
        return false;
    }
    return true;
}
