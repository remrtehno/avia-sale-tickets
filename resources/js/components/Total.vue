<template>
    <div>
        <span class="red" style="font-size: 23px">UZS {{ getTotal }}</span>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    props: {
        priceAdult: { default: 0, type: Number },
        priceChild: { default: 0, type: Number },
        priceInfant: { default: 0, type: Number },
        additional: { default: 0, type: Number },
        exchangeRate: { default: 1, type: Number },
    },
    computed: {
        ...mapGetters(["bookingForms"]),
        getTotal() {
            const adults = this.priceAdult * this.bookingForms.adults;
            const children = this.priceChild * this.bookingForms.children;
            const infants = this.priceInfant * this.bookingForms.infants;

            return this.formatPrice(
                (adults + children + infants + this.additional) *
                    this.exchangeRate
            );
        },
    },

    methods: {
        formatPrice(value = "0") {
            return Number(value)
                .toFixed(2)
                .replace(/\d(?=(\d{3})+\.)/g, "$& ");
        },
    },
};
</script>
