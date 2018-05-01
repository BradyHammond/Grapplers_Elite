$(".show-answer").click(function() {
    if ($(this).children().hasClass("fa-caret-right")) {
        $(this).children().removeClass("fa-caret-right");
        $(this).children().addClass("fa-caret-down");
    }

    else {
        $(this).children().removeClass("fa-caret-down");
        $(this).children().addClass("fa-caret-right");
    }
});