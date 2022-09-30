var base_url = $('input[name="base_url"]').val();
// $(document).ready(function () {
//     $(".d-none").on("click", function (event) {
//         window.location.href = "http://stackoverflow.com";

//         //(... rest of your JS code)
//     });
// });

async function callAjax(url, method, data) {
    var response = [];

    await $.ajax({
        url: url,
        data: data,
        method: method,
        success: function (result) {
            response["response"] = result;
            response["status"] = true;
        },
        error: function (xhr, status, error) {
            response["response"] = xhr;
            response["status"] = false;
            alert("Request failed: " + status);
        },
    });
    return response;
}
async function ajaxSubmition(elm) {
    let data = elm.serialize();
    let method = elm.attr("method");
    let url = elm.attr("action");

    console.log(url);

    let res = await callAjax(url, method, data);
    let messageElm = elm.find(".message");
    messageElm.html(
        '<div class="alert alert-' +
            (res["response"]["status"] == true ? "success" : "danger") +
            '">' +
            res["response"]["message"] +
            "</div>"
    );

    return res["response"]["status"];
}

$("body").on("submit", ".ajax-submition", async function (event) {
    event.preventDefault();
    let elm = $(this);
    let res = await ajaxSubmition(elm);
});

$("body").on("submit", ".form-profile-updation", async function (event) {
    event.preventDefault();

    let elm = $(this);
    let res = await ajaxSubmition(elm);
    console.log(res);
    //alert("1");

    if (res == true) {
        let hide_submit_btn = $(this).find(".btn-accept").first();
        let hide_cancel_btn = $(this).find(".btn-cancel").first();
        let hide_delete_btn = $(this).find(".btn-danger").first();
        let hide_delete_alert = $(this).find(".delte-alert").first();
        $(hide_submit_btn).hide();
        $(hide_cancel_btn).text('ok');
        $(".btn-cancel").css({"color": "#fff","background-color": "#47a447","border-color": "#398439"});
        $(".btn-cancel").on("click", function(){ location.reload(); });
        $(hide_delete_btn).hide();
        $(hide_delete_alert).hide();
        $(".d-none").show();
    }
});

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function validateEmail(email) {
    const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
function validatePhoneNumber(number) {
    const re =
        /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm;
    return re.test(number);
}

function validateZipCode(code) {
    const re =
        /^[A-Z]{1,2}[0-9RCHNQ][0-9A-Z]?\s?[0-9][ABD-HJLNP-UW-Z]{2}$|^[A-Z]{2}-?[0-9]{4}$/;
    return re.test(code);
}

function validateNumber(value) {
    var re = /^[0-9]+$/;
    return re.test(value);
}

function validateNumeric(value) {
    var re = /^[0-9]+$/;
    return re.test(value);
}

function validateAlpha(value) {
    var re = /^[a-zA-Z\s]*$/;
    return re.test(value);
}

function validateAlphaNumeric(value) {
    var re = /^[a-zA-Z0-9]/;
    return re.test(value);
}

function titleCase(str) {
    var splitStr = str.toLowerCase().split(" ");
    for (var i = 0; i < splitStr.length; i++) {
        splitStr[i] =
            splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);
    }
    return splitStr.join(" ");
}

function liveValidation(elm) {
    var mesaage = "";
    var status = true;
    var elmValue = elm.value;
    var elmRequiredMessage = $(elm).attr("live_required_message");
    var elmNumberOnlyMessage = $(elm).attr("live_numberOnly_message");
    var elmLetterOnlyMessage = $(elm).attr("live_letterOnly_message");
    var elmAlphaNumericOnlyMessage = $(elm).attr(
        "live_alphaNumericOnly_message"
    );
    var elmValidEmailMessage = $(elm).attr("live_validEmail_message");
    var elmMaxNumberMessage = $(elm).attr("live_maxNumber_message");
    var elmName = elm.name.replace("_", " ");
    elmName = titleCase(elmName);

    $(elm).each(function () {
        $.each(this.attributes, function () {
            if (this.name == "live_required") {
                if (elmValue == "") {
                    if (elmRequiredMessage != undefined) {
                        mesaage = elmRequiredMessage;
                    } else {
                        mesaage += "<br>Please enter your " + elmName;
                    }
                    status = false;
                }
            }
            if (this.name == "live_check_required") {
                var checkedElm = $(elm)
                    .closest(".form-group")
                    .find("input[type='checkbox']:checked");
                if (checkedElm.length == 0) {
                    if (elmRequiredMessage != undefined) {
                        mesaage = elmRequiredMessage;
                    } else {
                        mesaage += "<br>Please select at least one " + elmName;
                    }
                    status = false;
                }
            }
            if (this.name == "live_radio_required") {
                var checkedElm = $(elm)
                    .closest(".form-group")
                    .find("input[type='radio']:checked");
                if (checkedElm.length == 0) {
                    if (elmRequiredMessage != undefined) {
                        mesaage = elmRequiredMessage;
                    } else {
                        mesaage += "<br>Please select at least one " + elmName;
                    }
                    status = false;
                }
            }
            if (elmValue != "") {
                if (this.name == "live_numeric_only") {
                    if (!validateNumeric(elmValue)) {
                        if (elmNumberOnlyMessage != undefined) {
                            mesaage = elmNumberOnlyMessage;
                        } else {
                            mesaage += "<br>Numbers only";
                        }
                        status = false;
                    }
                }
                if (this.name == "live_letters_only") {
                    if (!validateAlpha(elmValue)) {
                        if (elmLetterOnlyMessage != undefined) {
                            mesaage = elmLetterOnlyMessage;
                        } else {
                            mesaage += "<br>Letters only";
                        }
                        status = false;
                    }
                }

                if (this.name == "live_alpha_numeric") {
                    if (!validateAlphaNumeric(elmValue)) {
                        if (elmAlphaNumericOnlyMessage != undefined) {
                            mesaage = elmAlphaNumericOnlyMessage;
                        } else {
                            mesaage += "<br>Letters or numbers only";
                        }
                        status = false;
                    }
                }

                if (this.name == "live_email") {
                    if (!validateEmail(elmValue)) {
                        if (elmValidEmailMessage != undefined) {
                            mesaage = elmValidEmailMessage;
                        } else {
                            mesaage += "<br>Please enter a valid Email Address";
                        }
                        status = false;
                    }
                }
                if (this.name == "max") {
                    var ElmLenght = elmValue.length;
                    var Atrrlenght = this.value.length;

                    if (ElmLenght > Atrrlenght) {
                        if (elmMaxNumberMessage != undefined) {
                            mesaage = elmMaxNumberMessage;
                        } else {
                            mesaage +=
                                "<br>Max. length upto " +
                                Atrrlenght +
                                " digits";
                        }
                        status = false;
                    }
                }
                if (this.name == "maxlength") {
                    var ElmLenght = elmValue.length;
                    var Atrrlenght = this.value;

                    if (ElmLenght > Atrrlenght) {
                        if (elmMaxNumberMessage != undefined) {
                            mesaage = elmMaxNumberMessage;
                        } else {
                            mesaage +=
                                "<br>Max. length upto " +
                                Atrrlenght +
                                " digits";
                        }
                        status = false;
                    }
                }
            }
        });
    });

    var elmParent = $(elm).closest(".form-group");
    elmParent.find(".error-message").remove();

    if (status == false) {
        mesaage = mesaage.replace(/^(<br>)/, "").replace("[]", "");
        $(elmParent).append(
            '<div class="error-message" style="color: red">' +
                mesaage +
                "</div>"
        );
    }

    return status;
}

function liveShowFieldValidStatus(elm, status) {
    var elmParent = $(elm).closest(".form-group");
    elmParent.find(".glyphicon").remove();
    elmParent.addClass("has-feedback");

    if (status == false) {
        elmParent.removeClass("has-success");
        elmParent.addClass("has-error");
        $(elm).after(
            '<span class="glyphicon glyphicon-remove form-control-feedback"></span>'
        );
    } else {
        elmParent.removeClass("has-error");
        elmParent.addClass("has-success");
        $(elm).after(
            '<span class="glyphicon glyphicon-ok form-control-feedback"></span'
        );
    }
}

$("body").on("keyup", ".live_validation", async function () {
    liveShowFieldValidStatus(this, liveValidation(this));
});

$(".modal_one").click(function () {
    let elm = $(this);
    let elmId = elm.attr("id");
    let modalHeader = modalOneDataContainer[elmId + "_header"];
    let modalBody = modalOneDataContainer[elmId + "_body"];
    let modal = $("#modal_one_container #modalOne");
    modal.find(".modal-header").html(modalHeader);
    modal.find(".modal-body .panel").html(modalBody);
    modal.modal("show");
});

function changePasswordViewConfirm(
    inputIdconfirm,
    eyeViewIdconfirm,
    slashEyeIdconfirm
) {
    const type =
        $(`#${inputIdconfirm}`).attr("type") === "password"
            ? "text"
            : "password";
    $(`#${inputIdconfirm}`).attr("type", type);
    if (type === "password") {
        $(`#${eyeViewIdconfirm}`).show();
        $(`#${slashEyeIdconfirm}`).hide();
    } else {
        $(`#${eyeViewIdconfirm}`).hide();
        $(`#${slashEyeIdconfirm}`).show();
    }
}

// show password requirement div on input focus
$("#password")
    .focusin(function () {
        $(".password-requirements").show();
    })
    .focusout(function () {
        $(".password-requirements").hide();
    });
