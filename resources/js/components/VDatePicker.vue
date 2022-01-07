<template>
    <div class="datepicker-wrapper">
        <vue-date-picker
            header-color="green"
            :locale="{ lang }"
            v-model="date"
            :color="color"
            format="YYYY-MM-DD"
            formatOutput="YYYY"
            :name="name"
        ></vue-date-picker>
    </div>
</template>

<script>
import { VueDatePicker } from "@mathieustan/vue-datepicker";
import { THEME } from "../constants/theme";
import "@mathieustan/vue-datepicker/dist/vue-datepicker.min.css";

export default {
    components: { VueDatePicker },
    props: ["props", "locale", "name", "value", "days", "months"],
    data() {
        const today = new Date(
            Date.now() - new Date().getTimezoneOffset() * 60000
        );

        if (this.months) {
            today.setMonth(today.getMonth() + parseFloat(this.months) || 0);
        }

        if (this.days) {
            today.setDate(today.getDate() + parseFloat(this.days) || 0);
        }

        return {
            date: this.value || today.toISOString().substr(0, 10),
            lang: this.locale || "en",
            color: THEME.MAIN_GREEN,
        };
    },
};
</script>

<style lang="scss">
.datepicker-wrapper {
    z-index: 1;
    .vd-picker__input-icon {
        display: none;
    }
    .vd-picker__input input {
        font-size: 13px !important;
    }
}

.vd-picker-header__wrap-button {
    font-size: 19px;
}
.vd-picker-header {
    background-color: var(--main-green);
}
</style>
