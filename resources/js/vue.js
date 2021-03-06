import Vue from "vue";
import Vuex from "vuex";

import ExampleComponent from "./components/ExampleComponent.vue";
import SelectComponent from "./components/SelectComponent.vue";
import VDatePicker from "./components/VDatePicker.vue";
import StarRating from "./components/StarRating.vue";
import InputSpinner from "./components/InputSpinner.vue";
import BookingForms from "./components/BookingForms/BookingForms.vue";
import Total from "./components/Total.vue";

Vue.config.productionTip = false;

window.Event = new Vue();

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        bookingForms: {},
        bags: {},
        formBags: {},
    },
    mutations: {
        bookingFormCreator(state, bookingFormsData) {
            state.bookingForms = bookingFormsData;
        },
        setFormBags(state, formBags) {
            state.formBags = { ...state.formBags, ...formBags };
        },
    },
    getters: {
        bookingForms(state) {
            return state.bookingForms;
        },
        formBags(state) {
            return state.formBags;
        },
    },
});

new Vue({
    el: "#app",

    components: {
        ExampleComponent,
        SelectComponent,
        VDatePicker,
        StarRating,
        InputSpinner,
        BookingForms,
        Total,
    },
    store,

    mounted() {
        $("[data-confirm]").on("click", () => {
            return confirm($(this).data("confirm"));
        });
    },
});
