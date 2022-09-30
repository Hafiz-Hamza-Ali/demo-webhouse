$(document).ready(function (e) {
    $('.search-panel .dropdown-menu').find('a').click(function (e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#", "");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });

    $('.data-table-analytics').DataTable({
        "searching": false
    });
    //$('.data-table-lawyer').DataTable();

});

var num = 40;

// $(window).bind('scroll', function () {
//     if ($(window).scrollTop() > num) {
//         $('.custom-navtabs').addClass('fixed-top-tabs');
//         $("#sidebar").addClass('fixed-sidebar');
//     } else {
//         $('.custom-navtabs').removeClass('fixed-top-tabs');
//         $("#sidebar").removeClass('fixed-sidebar');
//     }
// });
// $(document).ready(function () {
//     $('.data-table-analytics').DataTable();
// });

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
$("#sra_pswd_reset")
    .focusin(function () {
        $(".password-requirements").show();
    })
    .focusout(function () {
        $(".password-requirements").hide();
    });
