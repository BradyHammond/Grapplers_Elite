$("#adults").click(function() {
    if ($("#adults-caret").hasClass("fa-caret-right")) {
        $("#adults-caret").removeClass("fa-caret-right");
        $("#adults-caret").addClass("fa-caret-down");
    }

    else {
        $("#adults-caret").removeClass("fa-caret-down");
        $("#adults-caret").addClass("fa-caret-right");
    }

    $("#adults-dropdown").slideToggle();
});

$("#kids").click(function() {
    if ($("#kids-caret").hasClass("fa-caret-right")) {
        $("#kids-caret").removeClass("fa-caret-right");
        $("#kids-caret").addClass("fa-caret-down");
    }

    else {
        $("#kids-caret").removeClass("fa-caret-down");
        $("#kids-caret").addClass("fa-caret-right");
    }

    $("#kids-dropdown").slideToggle();
});

$("#about").click(function() {
    if ($("#about-caret").hasClass("fa-caret-right")) {
        $("#about-caret").removeClass("fa-caret-right");
        $("#about-caret").addClass("fa-caret-down");
    }

    else {
        $("#about-caret").removeClass("fa-caret-down");
        $("#about-caret").addClass("fa-caret-right");
    }

    $("#about-dropdown").slideToggle();
});

$("#menu-toggle").click(function() {
    if ($(".sidebar").height() == 72) {
        toggleResponsiveMenu()
        $(".sidebar").animate({
            height: "100%"
        });
    }

    else {
        $(".sidebar").animate({
            height: "72px"
        });
        setTimeout(toggleResponsiveMenu, 1000);
    }
});

function toggleResponsiveMenu() {
    $(".sidebar-nav").toggle()
    $(".logout-wrapper").toggle()
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});