window.onload = (event) => {
    $(".glyphicon").attr("disabled", true);
};
function search_suggestion(search)
{
    // console.log(search);
    // let search_val=document.getElementById(search).getAttribute("value");
    let filter=$("#type").val();
    window.location.href = window.location.origin+window.location.pathname+'?search='+search+'&filter='+filter;
}
function search_on_select(){
    $( document ).ready(function() {
    let search=$("#search").val();
    //  window.location.href = window.location.origin+window.location.pathname+'?search='+search;
});
}
    //on select search according to the suggestion end

$( document ).ready(function() {
    $(".glyphicon").attr("disabled", false);
    $('.close').click(function() {
        $('.modal-table td').html('');
    });
    $(".search").click(function() {
    let search=$("#search").val();
    window.location.href = window.location.origin+window.location.pathname+'?search='+search+'&filter='+filter;
    });
    $("#listName").hide();

    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var filter = $(this).attr("id");
        $('#type').val(filter);
	});
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        $("#listName").addClass('d-none');
        e.preventDefault();
        var filter = $(this).attr("id");
        if(filter == 'id'){
        $('#search').val('');
        $('#search').bind('keypress', only_number);
        $('#search').unbind('keypress', only_character)
        }
        if(filter == 'full_name'){
        $('#search').val('');
            $('#search').unbind('keypress', only_number);
            $('#search').bind('keypress', only_character)
        }
        if (filter == 'email') {
        $('#search').val('');
            $('#search').unbind('keypress', only_number);
            $('#search').unbind('keypress', only_character)
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

function myFunction(val) {
    var sel = document.getElementsByClassName(val);
    let eventData = $(this).find('.btn-view');
    console.log($('.'+val).attr('lawyer_sra_id'));
    var data=$('.'+val).attr('claim_type');
    $('.model_lawyer_sra_id').html($('.'+val).attr('lawyer_sra_id'));
    $('.model_lawyer_firm_name').html($('.'+val).attr('lawyer_firm_name'));
    $('.model_lawyer_full_name').html($('.'+val).attr('lawyer_full_name'));
    $('.model_lawyer_email').html($('.'+val).attr('lawyer_email'));
    $('.model_lawyer_area_of_law').html($('.'+val).attr('funding_arrangement'));
    $('.model_claim_id').html($('.'+val).attr('id'));
    $('.model_claim_start_date').html($('.'+val).attr('created_at'));
    $('.model_claim_end_date').html($('.'+val).attr('accepted_date'));
    $('.model_claim_days').html($('.'+val).attr('days'));
    $('.model_claim_status').html($('.'+val).attr('status'));
    $('.model_claim_type').html($('.'+val).attr('claim_type'));
    $('.model_claim_reason').html($('.'+val).attr('transfer_reason'));
    $('.model_claim_value').html($('.'+val).attr('claim_value'));
    $('.model_claim_full_name').html($('.'+val).attr('full_name'));
    $('.model_claim_email').html($('.'+val).attr('email_address'));
    $('.model_claim_house_number').html($('.'+val).attr('house_number'));
    $('.model_claim_post_code').html($('.'+val).attr('post_code'));
    $('.model_claim_telephone_number').html($('.'+val).attr('telephone_number'));
    $('.model_claim_incident_date').html($('.'+val).attr('incident_date'));
    $('.model_claim_limitation_date').html($('.'+val).attr('limitation_date'));
    $('.model_claim_court_date').html($('.'+val).attr('next_court_date'));
    $('.model_claim_limitation_date').html($('.'+val).attr('limitation_date'));
    $('.model_claim_law_firm').html($('.'+val).attr('lawyer_firm_name'));
    $('.model_claim_limitation_date').html($('.'+val).attr('limitation_date'));
    $('.model_claim_funding_arrangement').html($('.'+val).attr('funding_arrangement'));
    $('.model_claim_current_position').html($('.'+val).attr('current_position'));
}
