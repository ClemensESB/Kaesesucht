
$(document).on('click', '.page-link', function(e){
    e.preventDefault();

    var page_number = $(this).data('page-number');
    var current_query;

    if( $(this).data('query') ) {
        current_query = '?' + $(this).data('query');
    }
    else {
        current_query = '';
    }


    $.get( '/index.php' + current_query, {'page-number' : page_number}, function(data){
        $('#paging_1').html(data);
    })



})
