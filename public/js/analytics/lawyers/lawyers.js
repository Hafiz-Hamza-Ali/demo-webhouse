function search_suggestion(search)
{
// console.log(search);
    // let search_val=document.getElementById(search).getAttribute("value");
    let filter=$("#type").val();
    window.location.href = window.location.origin+window.location.pathname+'?search='+search+'&filter='+filter;
}
$( document ).ready(function() {
    $('.close').click(function() {
        $('.modal-table td').html('');
    });
    $("#listName").hide();
    $(".search").click(function() {
    let search=$("#search").val();
    window.location.href = window.location.origin+window.location.pathname+'?search='+search+'&filter='+filter;
    });
});
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var filter = $(this).attr("id");
        $('#type').val(filter);
    });
    //change input type
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        $("#listName").addClass('d-none');
        e.preventDefault();
        var filter = $(this).attr("id");
        if(filter == 'id'){
            $('#search').val('');
        $('#search').bind('keypress', only_number);
        $('#search').unbind('keypress', only_character)
        }
        if(filter != 'id'){
        $('#search').val('');
            $('#search').unbind('keypress', only_number);
            $('#search').bind('keypress', only_character)
        }
    });
});
function only_number(event) {
    var value = String.fromCharCode(event.which);
    var pattern = new RegExp(/^[0-9]+$/i);
    return pattern.test(value);
  }
  function only_character(event) {
    var value = String.fromCharCode(event.which);
    var pattern = new RegExp(/[a-zåäö ]/i);
    return pattern.test(value);
  }

