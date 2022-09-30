function hideRjectAndShowAccept($text) {
    $("#claim_detail_model .claim-details-table .summary").text($text);
    $("#claim_detail_model .claim-details-table .btn-delete").show();
    $("#claim_detail_model").modal("show");
}

function hideAcceptAndShowReject($text) {
    $("#claim_detail_model .claim-details-table .summary").text($text);
    $("#claim_detail_model .claim-details-table .btn-delete").hide();
    $("#claim_detail_model").modal("show");
}

$(".btn-view").click(function () {
    let dontAppend = ["id", "created_at"];
    appendClaimDetailData(this, dontAppend);
    hideRjectAndShowAccept("");
});

$(".accepted-claim-view").click(function () {
    let dontAppend = ["id", "created_at"];
    appendClaimDetailData(this, dontAppend);
    hideAcceptAndShowReject("");
});

$(".btn-reject").click(function () {
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
}
