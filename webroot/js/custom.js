$(document).ready(function () {


    // Page Title
    $("div.content h3:first-child").addClass("pageTitle");

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

    $('h3 a').removeClass('btn-primary btn-success btn-danger').addClass('btn-default');
    $('h3 button').removeClass('btn-primary btn-success btn-danger').addClass('btn-default btn-sm');

});
