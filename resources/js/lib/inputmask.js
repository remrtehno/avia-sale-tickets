import Inputmask from "inputmask";

Inputmask.extendAliases({
    dategood: {
        alias: "datetime",
        //@TODO set 20yy as default, to avoid set morer than 20xx years
        inputFormat: "yyyy-mm-dd",
        placeholder: "_",
        min: "2010",
        max: "2060",
    },
});

Inputmask().mask(document.querySelectorAll("input"));
