import Vue from "vue";

import ExampleComponent from "./components/ExampleComponent";
import SelectComponent from "./components/SelectComponent";
import VDatePicker from "./components/VDatePicker.vue";
import StarRating from "./components/StarRating.vue";

Vue.config.productionTip = false;

window.Event = new Vue();

new Vue({
    el: "#app",

    components: {
        ExampleComponent,
        SelectComponent,
        VDatePicker,
        StarRating,
    },

    mounted() {
        $("[data-confirm]").on("click", () => {
            return confirm($(this).data("confirm"));
        });
    },
});
