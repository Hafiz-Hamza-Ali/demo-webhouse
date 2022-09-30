var base_url = $('input[name="base_url"]').val();
var urlParams = new URLSearchParams(window.location.search);

function hideRjectAndShowAccept($text) {
    $("#claim_detail_model .claim-details-table .summary").text($text);
    $("#claim_detail_model .claim-details-table .btn-accept").show();
    let btnReject = $("#claim_detail_model .claim-details-table .btn-reject");
    btnReject.addClass("btn-default");
    btnReject.removeClass("btn-success");
    btnReject.text("Reject");
    btnReject.show();
    $("#claim_detail_model").modal("show");
}

function hideAcceptAndShowReject($text) {
     $("#claim_detail_model .claim-details-table .summary").text($text);
    // $("#claim_detail_model .claim-details-table .btn-accept").hide();
     //let btnReject = $("#claim_detail_model .claim-details-table .ok");
    // btnReject.removeClass("btn-default");
    // btnReject.addClass("btn-success");
    // btnReject.text("Ok");
    $(".btn-reject").hide();
    $(".btn-success").hide();
    $(".btn-ok").removeClass('d-none');
    $(".btn-ok").removeAttr("style");
    $(".btn-ok").text("Ok");
   // $(".btn-ok").show();
     $("#claim_detail_model").modal("show");
    
}

$(".btn-view").click(function () {
    // alert();
    let dontAppend = [
        "id",
        "created_at",
        // "full_name",
        // "email_address",
        // "house_number",
        // "post_code",
        // "telephone_number",
        // "current_solicitors",
    ];
   
    appendClaimDetailData(this, dontAppend);
    hideRjectAndShowAccept("Please accept or reject this claim...");
    $('.btn-ok').hide();
    $('.claim_detail_full_name').parent().hide();
    $('.claim_detail_email_address').parent().hide();
    $('.claim_detail_house_number').parent().hide();
    $('.claim_detail_post_code').parent().hide();
    $('.claim_detail_telephone_number').parent().hide();
    $('.claim_detail_current_solicitors').parent().hide();

});
$(".btn-claim").click(function () {
    // alert();
    let dontAppend = [
        "id",
        "created_at",
        "full_name",
        "email_address",
        "house_number",
        "post_code",
        "telephone_number",
        "current_solicitors",
    ];
   
    appendClaimDetailData(this, dontAppend);
    
    hideRjectAndShowAccept("Please accept or reject this claim...");
});
function myFunction(val) {
    let dontAppend = [
        "id",
        "created_at",
        // "full_name",
        // "email_address",
        // "house_number",
        // "post_code",
        // "telephone_number",
        // "current_solicitors",
    ];
    var sel = document.getElementsByClassName(val);

    appendClaimDetailData(sel, dontAppend);
    
    $('.claim_detail_full_name').parent().hide();
    $('.claim_detail_email_address').parent().hide();
    $('.claim_detail_house_number').parent().hide();
    $('.claim_detail_post_code').parent().hide();
    $('.claim_detail_telephone_number').parent().hide();
    $('.claim_detail_current_solicitors').parent().hide();
    hideRjectAndShowAccept("Please accept or reject this claim...");
    $('.btn-ok').hide();
}
function myFunctions(val) {
    let dontAppend = [
         "id",
         "created_at",
        // "full_name",
        // "email_address",
        // "house_number",
        // "post_code",
        // "telephone_number",
        // "current_solicitors",
    ];
    var sel = document.getElementsByClassName(val);

    appendClaimDetailData(sel, dontAppend);
    $( ".btn-reject" ).removeClass('reject');
    hideRjectAndShowAccept("Please accept or reject this claim...");
}
$(".accepted-claim-view").click(function () {
    let dontAppend = ["id", "created_at"];

    appendClaimDetailData(this, dontAppend);
    $( ".btn-reject" ).removeClass('reject');
    hideAcceptAndShowReject("This Claim has now been accepted by you.");
});

if (urlParams.has("claim")) {
    var claimId = urlParams.get("claim");
    var BtnView = $(".tab-content .not_accepted #" + claimId + " a");
    if (BtnView.length) {
        BtnView.trigger("click");
    } else {
        $.ajax({
            url: base_url + "/claimant/" + claimId,
            success: function (result) {
                if (result.id) {
                    $.each(result, function (key, val) {
                        $(
                            "#claim_detail_model .claim-details-table .claim_detail_" +
                                key
                        ).text(val);
                    });
                    $("#claim_detail_model .claim_id").val(result.id);
                    hideAcceptAndShowReject(
                        "This claim has been accepted by other lawyer."
                    );
                    $("#claim_detail_model #claimDetailsModalLabel").text(
                        "Claim " + claimId
                    );
                }
            },
        });
    }
}

$(".btn-ok").click(function () {
    $("#claim_detail_model").modal("hide");
});

function appendClaimDetailData(elm, dontAppend) {
    let appenddata = "";
    $($(elm).parent("td")).each(function () {
        $.each(this.attributes, function () {
            if (!dontAppend.includes(this.name)) {
                appenddata +=
                    '<tr><td class="table_td_label">' +
                    titleCase(this.name.replaceAll("_", " ")) +
                    '</td><td class="claim_detail_' +
                    this.name +
                    '" class="table_td_value">' +
                    this.value +
                    "</td></tr>";
            }
        });
        $("#claim_detail_model .claim-details-table table tbody").html(
            appenddata
        );
        $("#claim_detail_model .claim_id").val(this.attributes.id.value);
        $("#claim_detail_model #claimDetailsModalLabel").text(
            "Claim " + this.attributes.id.value
        );
    });
      // "full_name",
        // "email_address",
        // "house_number",
        // "post_code",
        // "telephone_number",
        // "current_solicitors",

    $(".claim_detail_transfer_reason").siblings("td").first().html("Reason");
    $(".claim_detail_claim_type").siblings("td").first().html("Type Of Claim");
    $(".claim_detail_claim_value").siblings("td").first().html("Value");
}
