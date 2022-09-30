$("body").on(
    "click",
    "input[name='specialist_areas[]']input[value='Other']",
    function () {
        var elm = $(this);
        var wrapperOtherDesc = elm
            .closest(".funkyradio")
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

$("body").on("click", ".modal-body .btn-accept", function (event) {
    var currentForm = $(this).closest("form"),
        curInputs = currentForm.find(
            "input[type='text'],input[type='checkbox'],input[type='radio'],input[type='email'],input[type='number'],input[type='url'], select"
        ),
        isValid = true;
    otherRadioContainer = "";
    window.scrollTo(0, 0);
    for (var i = 0; i < curInputs.length; i++) {
        elm = curInputs[i];
        value = elm.value;
        $(elm).closest(".form-group").removeClass("has-error");
        isValid = liveValidation(elm);
        if (!elm.validity.valid) {
            isValid = false;
            $(elm).closest(".form-group").addClass("has-error");
        } else {
            if (
                elm.checked &&
                elm.type == "checkbox" &&
                elm.name == "specialist_areas[]" &&
                value == "Other"
            ) {
                var elm = $(elm);
                var otherDiscValue = elm
                    .closest(".modal-body")
                    .find(".desc-other-wrapper input")
                    .val();
                otherRadioContainer = value + "(" + otherDiscValue + ")";
            }
        }
    }
    if (!isValid) {
        event.preventDefault();
    } else {
        $('input[name="specialist_areas[]"]input[value="Other"]').val(
            otherRadioContainer
        );
    }
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