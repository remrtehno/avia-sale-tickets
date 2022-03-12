<template>
    <div>
        <span class="red" style="font-size: 30px">${{ getTotal }}</span>
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
    },
    computed: {
        ...mapGetters(["bookingForms"]),
        getTotal() {
            const adults = this.priceAdult * this.bookingForms.adults;
            const children = this.priceChild * this.bookingForms.children;
            const infants = this.priceInfant * this.bookingForms.infants;

            return adults + children + infants + this.additional;
        },
    },
};
</script>
