<template>
    <div>
        <div v-show="adults">
            <booking-form
                :disabled-email="n !== 1"
                v-model="email"
                :email="email"
                type="ADT"
                v-for="n in adults"
                :key="n"
                :number="n"
                title="Взрослый"
                :hideDelete="n === 1"
                @onClick="setPassengers('adults')"
                :formsData="formsData"
                :loggedIn="loggedIn"
            ></booking-form>
        </div>

        <div v-show="children">
            <booking-form
                :disabled-email="true"
                v-model="email"
                :email="email"
                type="CHD"
                v-for="n in children"
                :key="n"
                :number="n"
                title="Детский"
                @onClick="setPassengers('children')"
                :formsData="formsData"
                :loggedIn="loggedIn"
            ></booking-form>
        </div>

        <div v-show="infants">
            <booking-form
                :disabled-email="true"
                v-model="email"
                :email="email"
                type="INF"
                v-for="n in infants"
                :key="n"
                :number="n"
                title="Младенческий"
                @onClick="setPassengers('infants')"
                :formsData="formsData"
                :loggedIn="loggedIn"
            ></booking-form>
        </div>
    </div>
</template>

<script>
import BookingForm from "./BookingForm.vue";

export default {
    props: {
        old: {
            type: String,
            default: "[]",
        },
        loggedIn: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        const formsData = JSON.parse(this.old || "{}");
        const email = formsData?.adults && formsData?.adults["1"].email;

        return {
            email,
            formsData,
        };
    },
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
        setBag(nameField) {
            console.log(nameField);
        },
    },
    mounted() {},
};
</script>
