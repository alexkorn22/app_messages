
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