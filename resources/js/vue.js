import Vue from "vue";

import ExampleComponent from "./components/ExampleComponent.vue";
import SelectComponent from "./components/SelectComponent.vue";
import VDatePicker from "./components/VDatePicker.vue";
import StarRating from "./components/StarRating.vue";
import InputSpinner from "./components/InputSpinner.vue";

Vue.config.productionTip = false;

window.Event = new Vue();

new Vue({
    el: "#app",

    components: {
        ExampleComponent,
        SelectComponent,
        VDatePicker,
        StarRating,
        InputSpinner,
    },

    mounted() {
        $("[data-confirm]").on("click", () => {
            return confirm($(this).data("confirm"));
        });
    },
});
