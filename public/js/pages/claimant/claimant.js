$(document).ready(function () {
    $(".Solicitors").hide();
    $(".fund").hide();
    $(".claims").on("click", function () {
        var v = $(this).find("input[name='claim_type']").val();
        $(".text_claim_type").html(v);
    });
    $(".claim-summary-wrapp").hide();
    var btnProcess = $(".btnProcess"),
        navListItems = $("div.setup-panel div a"),
        allWells = $(".setup-content"),
        allNextBtn = $(".nextBtn");
    firstFlow = $(".first-flow");
    secondFlow = $(".second-flow");
    dates = [];
    otherRadioContainer = [];
    $(".container-confirm").hide();
    allWells.hide();

    btnProcess.click(function (e) {
        firstFlow.hide();
        $(".container-confirm").show();
    });
    $(".scnd-step").click(function (e) {
        // alert();
        $(".container-confirm").hide();
      
        secondFlow.show();
        navListItems.removeClass("btn-success").addClass("btn-default");
        secondFlow.find(".stepwizard-step a").first().addClass("btn-success");
        secondFlow.find(".setup-content").first().show();
    });

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr("href")),
            $item = $(this);

        if (!$item.hasClass("disabled")) {
            navListItems.removeClass("btn-success").addClass("btn-default");
            $item.addClass("btn-success");
            allWells.hide();
            $target.show();
            $target.find("input:eq(0)").focus();
        }
    });
    

    allNextBtn.click(function () {
        console.log($(this).hasClass("soli"));
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $(
                'div.setup-panel div a[href="#' + curStepBtn + '"]'
            )
                .parent()
                .next()
                .children("a"),
            curInputs = curStep.find(
                "input[type='text'],input[type='radio'],input[type='email'],input[type='number'],input[type='url'], select"
            ),
            isValid = true;
        window.scrollTo(0, 0);
        if( $(this).hasClass("soli"))
        {
            let current= $('#currentsolicitors').val();
           
            if(current == ''){
                $(".Solicitors").show();
                $(".data").addClass('has-error');
             event.preventDefault();
             return false;
            }
            else{    
                $(".Solicitors").hide();
                $(".data").removeClass('has-error');
            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
               
                let elm = curInputs[i];
                let name = elm.name;
                let value = elm.value;
    
                isValid = applayLiveValidation(elm);
    
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                } else {
                    if (elm.checked && elm.type == "radio") {
                        if (
                            value == "Other" &&
                            (name == "claim_type" ||
                                name == "transfer_reason" ||
                                name == "funding_arrangement")
                        ) {
                            var otherDiscValue = $(elm)
                                .closest(".setup-content")
                                .find(".desc-other-wrapper input")
                                .val();
                            value = value + "(" + otherDiscValue + ")";
                            otherRadioContainer[name] = value;
                        }
                        $("#text_" + name).text(value);
                    } else if (
                        elm.type == "text" ||
                        elm.type == "email" ||
                        elm.type == "url" ||
                        elm.type == "number" ||
                        elm.type == "select-one"
                    ) {
                        $("#text_" + name).text(value);
                        if (
                            name == "incident_day" ||
                            name == "incident_month" ||
                            name == "incident_year" ||
                            name == "limitation_day" ||
                            name == "limitation_month" ||
                            name == "limitation_year" ||
                            name == "next_court_day" ||
                            name == "next_court_month" ||
                            name == "next_court_year"
                        ) {
                            dates[name] = value;
                        }
                    }
                }
            }
    
            if (curStepBtn == "step-4" && isValid == true) {
                curStep.find(".details-wrapp").hide();
                curStep.find(".claim-summary-wrapp").show();
            } else {
                $("#step-4").find(".details-wrapp").show();
                $("#step-4").find(".claim-summary-wrapp").hide();
            }
    
            if (curStepBtn == 'step-5') {
             console.log (dates['incident_day'].length);
             if(dates['incident_day'].length>1){
                $('#text_incident_date').text(dates['incident_day'] + '-' + moment().month(dates['incident_month']).format("MMM") + '-' + dates['incident_year']);
             }
             else{
                $('#text_incident_date').text("0"+dates['incident_day'] + '-' + moment().month(dates['incident_month']).format("MMM") + '-' + dates['incident_year']);
             }
             if(dates['limitation_day'].length>1){
                $('#text_limitation_date').text(dates['limitation_day'] + '-' + moment().month(dates['limitation_month']).format("MMM") + '-' + dates['limitation_year']);
             }
             else{
                $('#text_limitation_date').text("0"+dates['limitation_day'] + '-' + moment().month(dates['limitation_month']).format("MMM") + '-' + dates['limitation_year']);
             }
             if(dates['next_court_day'].length>1){
                $('#text_next_court_date').text(dates['next_court_day'] + '-' + moment().month(dates['next_court_month']).format("MMM") + '-' + dates['next_court_year']);
             }
             else{
                $('#text_next_court_date').text("0"+dates['next_court_day'] + '-' + moment().month(dates['next_court_month']).format("MMM") + '-' + dates['next_court_year']);
             }
            }
       
        
            if (isValid) nextStepWizard.removeAttr("disabled").trigger("click");
        }
            
       
        }
        else{    
            $(".Solicitors").hide();
        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
           
            let elm = curInputs[i];
            let name = elm.name;
            let value = elm.value;

            isValid = applayLiveValidation(elm);

            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            } else {
                if (elm.checked && elm.type == "radio") {
                    if (
                        value == "Other" &&
                        (name == "claim_type" ||
                            name == "transfer_reason" ||
                            name == "funding_arrangement")
                    ) {
                        var otherDiscValue = $(elm)
                            .closest(".setup-content")
                            .find(".desc-other-wrapper input")
                            .val();
                        value = value + "(" + otherDiscValue + ")";
                        otherRadioContainer[name] = value;
                    }
                    $("#text_" + name).text(value);
                } else if (
                    elm.type == "text" ||
                    elm.type == "email" ||
                    elm.type == "url" ||
                    elm.type == "number" ||
                    elm.type == "select-one"
                ) {
                    $("#text_" + name).text(value);
                    if (
                        name == "incident_day" ||
                        name == "incident_month" ||
                        name == "incident_year" ||
                        name == "limitation_day" ||
                        name == "limitation_month" ||
                        name == "limitation_year" ||
                        name == "next_court_day" ||
                        name == "next_court_month" ||
                        name == "next_court_year"
                    ) {
                        dates[name] = value;
                    }
                }
            }
        }

        if (curStepBtn == "step-4" && isValid == true) {
            curStep.find(".details-wrapp").hide();
            curStep.find(".claim-summary-wrapp").show();
        } else {
            $("#step-4").find(".details-wrapp").show();
            $("#step-4").find(".claim-summary-wrapp").hide();
        }

        if (curStepBtn == 'step-5') {
         console.log (dates['incident_day'].length);
         if(dates['incident_day'].length>1){
            $('#text_incident_date').text(dates['incident_day'] + '-' + moment().month(dates['incident_month']).format("MMM") + '-' + dates['incident_year']);
         }
         else{
            $('#text_incident_date').text("0"+dates['incident_day'] + '-' + moment().month(dates['incident_month']).format("MMM") + '-' + dates['incident_year']);
         }
         if(dates['limitation_day'].length>1){
            $('#text_limitation_date').text(dates['limitation_day'] + '-' + moment().month(dates['limitation_month']).format("MMM") + '-' + dates['limitation_year']);
         }
         else{
            $('#text_limitation_date').text("0"+dates['limitation_day'] + '-' + moment().month(dates['limitation_month']).format("MMM") + '-' + dates['limitation_year']);
         }
         if(dates['next_court_day'].length>1){
            $('#text_next_court_date').text(dates['next_court_day'] + '-' + moment().month(dates['next_court_month']).format("MMM") + '-' + dates['next_court_year']);
         }
         else{
            $('#text_next_court_date').text("0"+dates['next_court_day'] + '-' + moment().month(dates['next_court_month']).format("MMM") + '-' + dates['next_court_year']);
         }
        }
   
    
        if (isValid) nextStepWizard.removeAttr("disabled").trigger("click");
    }
    });

    $("div.setup-panel div a.btn-success").trigger("click");
    
});

function applayLiveValidation(elm) {
    status = true;
    if ($(elm).hasClass("live_validation")) {
        var status = liveValidation(elm);
        if (
            !status &&
            elm.name != "claim_type" &&
            elm.name != "transfer_reason" &&
            elm.name != "claim_value" &&
             elm.name != "current_solicitors" &&
            elm.name != "funding_arrangement" &&
           
            elm.name != "current_position"
        ) {
            liveShowFieldValidStatus(elm, status);
        }
    }
    return status;
}

$(
    'input[name="claim_type"], input[name="transfer_reason"], input[name="funding_arrangement"]'
).click(function () {
    var elm = $(this);
    var wrapperOtherDesc = elm
        .closest(".setup-content")
        .find(".desc-other-wrapper");
    var elmValue = elm.val();
    if (elmValue == "Other") {
        wrapperOtherDesc.removeClass("hidden");
        wrapperOtherDesc.find("input").attr("type", "text");
    } else {
        wrapperOtherDesc.addClass("hidden");
        wrapperOtherDesc.find("input").attr("type", "hidden");
    }
});

$("form").submit(function () {
    $('input[name="claim_type"]input[value="Other"]').val(
        otherRadioContainer["claim_type"]
    );
    $('input[name="funding_arrangement"]input[value="Other"]').val(
        otherRadioContainer["funding_arrangement"]
    );
    $('input[name="transfer_reason"]input[value="Other"]').val(
        otherRadioContainer["transfer_reason"]
    );
});
$("#password")
    .focusin(function () {
        $(".password-requirements").show();
    })
    .focusout(function () {
        $(".password-requirements").hide();
    });
    $('.numberonly').keypress(function (e) {    
        console.log(e.keyCode);
                    var charCode = (e.which) ? e.which : event.keyCode    
                    if(e.keyCode===43)
                    {
                        return true;
                    }
                    else if (String.fromCharCode(charCode).match(/[^0-9]/g)) {   
        
                        return false;                                
                    }
    });
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        }