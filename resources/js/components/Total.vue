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
        priceAdultBag: { default: 0, type: Number },
        priceChildBag: { default: 0, type: Number },
        priceInfantBag: { default: 0, type: Number },
        additional: { default: 0, type: Number },
        exchangeRate: { default: 1, type: Number },
    },
    computed: {
        ...mapGetters(["bookingForms", "bags"]),
        getTotal() {
            const adults = this.priceAdult * this.bookingForms.adults;
            const children = this.priceChild * this.bookingForms.children;
            const infants = this.priceInfant * this.bookingForms.infants;

            const adults_bags =
                this.getBagsPrice(this.priceAdultBag - this.priceAdult) *
                (this.bags.ADT_bag || 0);
            const child_bags =
                this.getBagsPrice(this.priceChildBag - this.priceChild) *
                (this.bags.CHD_bag || 0);
            const infant_bags =
                this.getBagsPrice(this.priceInfantBag - this.priceInfant) *
                (this.bags.INF_bag || 0);

            return this.formatPrice(
                (adults +
                    children +
                    infants +
                    adults_bags +
                    child_bags +
                    infant_bags +
                    this.additional) *
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

        getBagsPrice(price = 0, priceWithBags = 0) {
            return Math.abs(priceWithBags - price);
        },
    },

    updated() {
        console.log(JSON.stringify(this.bags));
    },
};
</script>
