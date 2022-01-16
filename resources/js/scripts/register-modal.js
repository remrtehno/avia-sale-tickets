$(function () {
    var linkIndButton = ".as-ind-link";
    var linkOrgButton = ".as-org-link";
    var askModalAtTabLinks = ".ask-modal";
    var asOrg = ".as-org";
    var asInd = ".as-ind";
    var wrapperForms = ".register-forms-wrapper";
    var allForms = wrapperForms + " form";
    var selfModal = "#register";
    var hashLocation = location.hash.match(/\.as-org-link|\.as-ind-link/);
    var action = $(allForms).attr("action");

    function showRegisterForms() {
        $(wrapperForms).css("height", "auto").addClass("loaded");
    }

    function setLocationHash(path) {
        location.hash = path;
        $(allForms).attr("action", action + location.hash);
    }

    function showModal() {
        $(selfModal).modal("show").on("hidden.bs.modal", showRegisterForms);
    }

    //put into hash when click on tabs
    $.each([linkIndButton, linkOrgButton], function (_, value) {
        $(value).click(function () {
            setLocationHash(value);
        });
    });

    if ($(askModalAtTabLinks).length > 0 && !hashLocation) {
        showModal();

        $(asOrg).click(function () {
            $(askModalAtTabLinks).find(linkOrgButton).click();
            setLocationHash(linkOrgButton);
        });

        $(asInd).click(function () {
            $(askModalAtTabLinks).find(linkIndButton).click();
            setLocationHash(linkIndButton);
        });
    }

    if (hashLocation) {
        $(hashLocation[0]).click();
        showRegisterForms();
        return;
    }
});
