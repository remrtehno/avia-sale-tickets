<template>
    <div>
        <div v-show="adults">
            {{ adults }} Взрослый
            <booking-form v-for="n in adults" :key="n"></booking-form>
            <hr />
        </div>

        <div v-show="children">
            {{ children }} Детский
            <booking-form v-for="n in children" :key="n"></booking-form>
            <hr />
        </div>

        <div v-show="infants">
            {{ infants }} Младенческий
            <booking-form v-for="n in infants" :key="n"></booking-form>
            <hr />
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
};
</script>
