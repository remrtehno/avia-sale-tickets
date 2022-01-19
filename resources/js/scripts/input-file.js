$(function () {
    $(document).on("click", ".plus-btn", function () {
        console.log(
            $(this).closest(".parent-plus-btn").find('input[type="file"]').eq(0)
        );
        var parentElement = $(this).closest(".parent-plus-btn");

        parentElement
            .find('input[type="file"]')
            .eq(0)
            .clone()
            .appendTo(parentElement);
    });
});
