$("#cash-or-transfer").change(function () {
    if ($(this).prop("checked")) {
        $($(this).attr("tab-2")).tab("show");
    } else {
        $($(this).attr("tab-1")).tab("show");
    }
});
