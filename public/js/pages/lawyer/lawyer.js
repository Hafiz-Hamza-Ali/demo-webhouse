$(document).ready(function () {
    $('.data-a').on('click', function () {
        $('.plans_wrapper').removeClass('d-none');
        $('.dashboard-login').hide();
        
    });
    $(".claim-summary-wrapp").hide();
    //$("#confirm-subscribe").hide();
    var navListItems = $("div.setup-panel div a"),
        allWells = $(".setup-content"),
        allNextBtn = $(".nextBtn"),
        // btnConfirm = $('.btn-confirm'),
        otherRadioContainer = "";
    sraIdElm = "";
    lawyerEmailElm = "";

    allWells.hide();

    // btnConfirm.click(function () {
    //     $('.tabs_wpapper').show();
    //     $('.plans_wrapper').hide();
    // });

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

    allNextBtn.click(async function () {
        
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $(
                'div.setup-panel div a[href="#' + curStepBtn + '"]'
            )
                .parent()
                .next()
                .children("a"),
            curInputs = curStep.find(
                "input[type='text'],input[type='checkbox'],input[type='radio'],input[type='email'],input[type='number'],input[type='url'], select"
            ),
            isValid = true;
        specialist_areas = "";
        window.scrollTo(0, 0);
        var telephone=$('#telephone').val();
        if (telephone.indexOf(' ') >= 0) {
            $('#telephone').parent('div').addClass('has-error');
            $('#telephone').parent('div').addClass('has-feedback');
            $('#telephone').after( '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' );
         event.preventDefault();
         return false;
        }else{
        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            elm = curInputs[i];
            let name = elm.name;
            let value = elm.value;

            isValid = applayLiveValidation(elm);
            if (!elm.validity.valid) {
                isValid = false;
                $(elm).closest(".form-group").addClass("has-error");
            } else {
                if (elm.name == "email_address") {
                    if (!validateEmail(value)) {
                        isValid = false;
                        $(elm).closest(".form-group").addClass("has-error");
                    }
                    lawyerEmailElm = elm;
                } else if (elm.name == "telephone_number") {
                    if (!validatePhoneNumber(value)) {
                        isValid = false;
                        $(elm).closest(".form-group").addClass("has-error");
                    }
                } else if (elm.name == "sra_id") {
                    sraIdElm = elm;
                }

                if (
                    elm.checked &&
                    elm.type == "checkbox" &&
                    elm.name == "specialist_areas[]"
                ) {
                    if (value == "Other") {
                        var otherDiscValue = $(elm)
                            .closest(".setup-content")
                            .find(".desc-other-wrapper input")
                            .val();
                        value = value + "(" + otherDiscValue + ")";
                        otherRadioContainer = value;
                    }
                    if (specialist_areas == "") {
                        specialist_areas = value;
                    } else {
                        specialist_areas = specialist_areas + "," + value;
                    }
                } else if (elm.name != "specialist_areas[]") {
                    $("#text_" + name).text(value);
                }
            }
        }

        if (curStepBtn == "step-2") {
            var reqIsEmailExist = await isEmailExistAndSraId(
                sraIdElm.value,
                lawyerEmailElm.value
            );
            if (reqIsEmailExist["status"]) {
                let status = !reqIsEmailExist["response"]["status"];
                isValid = status;
                liveShowFieldValidStatus(lawyerEmailElm, status);
                if (!status) {
                    let elmParent = $(lawyerEmailElm).closest(".form-group");
                    elmParent.find(".error-message").remove();
                    $(elmParent).append(
                        '<div class="error-message" style="color: red">' +
                            reqIsEmailExist["response"]["message"] +
                            "</div>"
                    );
                }
            } else {
                isValid = false;
            }
        }

        $("#text_specialist_areas").text(specialist_areas);
        if (isValid) nextStepWizard.removeAttr("disabled").trigger("click");
    }
    });

    $("div.setup-panel div a.btn-success").trigger("click");

    $(".blue").click(function () {
        // $('#form').submit();
      //  $(".tabs_wpapper").show();
      $("#confirm-subscribe").show();
        $(".plans_wrapper").hide();
    });
    $(".confirm-subscribe").click(function () {
        // $('#form').submit();
        $(".tabs_wpapper").show();
      $("#confirm-subscribe").hide();
      
    });
    $("form").submit(function () {
        $('input[name="specialist_areas[]"]input[value="Other"]').val(
            otherRadioContainer
        );
    });
});

function applayLiveValidation(elm) {
    status = true;
    if ($(elm).hasClass("live_validation")) {
        var status = liveValidation(elm);
        if (!status && elm.name != "specialist_areas[]") {
            liveShowFieldValidStatus(elm, status);
        }
    }
    return status;
}

async function isEmailExistAndSraId(sra_id, lawyerEmail) {
    var baseUrl = $('input[name="base_url"]').val() + "/ajax/lawyer/has/email";
    var data = { sra_id: sra_id, email: lawyerEmail };
    var url = baseUrl;
    var method = "GET";
    let req = await callAjax(url, method, data);
    return req;
}

$("body").on(
    "click",
    "input[name='specialist_areas[]']input[value='Other']",
    function () {
        var elm = $(this);
        var wrapperOtherDesc = elm
            .closest(".setup-content")
            .find(".desc-other-wrapper");
        if (this.checked) {
            wrapperOtherDesc.removeClass("hidden");
            wrapperOtherDesc.find("input").attr("type", "text");
        } else {
            wrapperOtherDesc.addClass("hidden");
            wrapperOtherDesc.find("input").attr("type", "hidden");
        }
    }
    
);
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