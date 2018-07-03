
$(document).ready(function () {


    // Tabs
    $("div#tabs").tabs();

    // Page Title
    $( "div.content h3:first-child" ).addClass("pageTitle");

        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });



});
