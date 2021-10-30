$(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
        $(this)
        .parent()
        .hasClass("active")
    ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .parent()
            .removeClass("active");
    } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
        $(this)
            .parent()
            .addClass("active");
    }
});


$('body,html').click(function(e) {
    $('.page-wrapper').removeClass('toggled');
});
$('#show-sidebar').click(function(e) {
    e.stopPropagation();
    $('.page-wrapper').toggleClass('toggled');
});
$('#close-sidebar').click(function(e) {
    $('.page-wrapper').removeClass('toggled');
});
$('.sidebar-wrapper').click(function(e) {
    e.stopPropagation();

});