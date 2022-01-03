import ExampleComponent from "./components/ExampleComponent";
import SelectComponent from "./components/SelectComponent";
import VDatePicker from "./components/VDatePicker.vue";
import Vue from "vue";

Vue.config.productionTip = false;

window.Event = new Vue();

new Vue({
    el: "#app",

    components: {
        ExampleComponent,
        SelectComponent,
        VDatePicker,
    },

    mounted() {
        $("[data-confirm]").on("click", () => {
            return confirm($(this).data("confirm"));
        });
    },
});
