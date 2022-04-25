import { sha256, sha224 } from "js-sha256";

$(function () {
    $("#cash-or-transfer").change(function () {
        if ($(this).prop("checked")) {
            $($(this).attr("tab-2")).tab("show");
        } else {
            $($(this).attr("tab-1")).tab("show");
        }
    });

    // $("#sha256").val(sha256($("#sha256").val()));
    $(".contacts").toggle();
    $("#radio-card-cash input").on("change", function () {
        $(".booking-submit").toggle();
        $(".contacts").toggle();
        $("#cash-or-transfer").attr("disabled", (_, attr) => !attr);
    });
});
