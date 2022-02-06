<template>
    <div>
        <div v-show="adults">
            <booking-form
                type="adults"
                v-for="n in adults"
                :key="n"
                :number="n"
                title="Взрослый"
                :hideDelete="n === 1"
                @onClick="setPassengers('adults')"
            ></booking-form>
        </div>

        <div v-show="children">
            <booking-form
                type="children"
                v-for="n in children"
                :key="n"
                :number="n"
                title="Детский"
                @onClick="setPassengers('children')"
            ></booking-form>
        </div>

        <div v-show="infants">
            <booking-form
                type="infants"
                v-for="n in infants"
                :key="n"
                :number="n"
                title="Младенческий"
                @onClick="setPassengers('infants')"
            ></booking-form>
        </div>
    </div>
</template>

<script>
import BookingForm from "./BookingForm.vue";

export default {
    components: {
        BookingForm,
    },
    computed: {
        adults() {
            return this.$store.getters.bookingForms?.adults;
        },
        children() {
            return this.$store.getters.bookingForms?.children;
        },
        infants() {
            return this.$store.getters.bookingForms?.infants;
        },
    },

    methods: {
        setPassengers(nameField) {
            this.$store.commit("bookingFormCreator", {
                ...this.$store.getters.bookingForms,
                [nameField]: this.$store.getters.bookingForms[nameField] - 1,
            });
        },
    },
};
</script>
