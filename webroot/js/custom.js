
$(document).ready(function () {


    // Page Title
    $( "div.content h3:first-child" ).addClass("pageTitle");

        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})


var series = [
{name: 'Company A', product: 'A1'},
{name: 'Company A', product: 'A2'},
{name: 'Company A', product: 'A3'},
{name: 'Company B', product: 'B1'},
{name: 'Company B', product: 'B2'}
]

$(".company").change(function(){
    var company = $(this).val();
    var options =  '<option value=""><strong>Products</strong></option>';
    $(series).each(function(index, value){
        if(value.name == company){
            options += '<option value="'+value.product+'">'+value.product+'</option>';
        }
    });

    $('.product').html(options);
});

function appendText(){
var options = "<option>3</option><option>3</option><option>3</option>";
$('select#product').html(options);
}            // Create text with DOM

$("body").append(options);
});
