$(function () {
    $(document).on("click", ".plus-btn", function () {
        var parentElement = $(this).closest(".parent-plus-btn");

        parentElement
            .find('input[type="file"]')
            .eq(0)
            .clone()
            .val("")
            .appendTo(parentElement);
    });
});
