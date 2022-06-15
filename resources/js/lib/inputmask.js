import Inputmask from "inputmask";

const date = new Date();

Inputmask.extendAliases({
    dategood: {
        alias: "datetime",
        //@TODO set 20yy as default, to avoid set morer than 20xx years
        inputFormat: "dd-mm-yyyy",
        placeholder: "_",
        // min: "2010",
        // max: "2060",
    },
    birthday: {
        alias: "dategood",
        inputFormat: "dd-mm-yyyy",
        min: "1910",
        max: `${date.getFullYear()}-${
            date.getMonth() < 10
                ? "0" + (date.getMonth() + 1)
                : date.getMonth() + 1
        }-${date.getDate()}`,
    },
});

Inputmask().mask(document.querySelectorAll("input"));
