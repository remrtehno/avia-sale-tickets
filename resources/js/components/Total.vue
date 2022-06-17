<template>
    <div>
        <span class="red" style="font-size: 23px">UZS {{ total }}</span>
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
    data() {
        return {
            total: 0,
        };
    },
    computed: {
        ...mapGetters(["bookingForms", "formBags"]),
    },

    watch: {
        formBags() {
            this.total = this.getTotal();
        },
    },

    mounted() {
        this.total = this.getTotal();
    },

    methods: {
        formatPrice(value = "0") {
            return Number(value)
                .toFixed(2)
                .replace(/\d(?=(\d{3})+\.)/g, "$& ");
        },

        getCountPassengers(passengers = []) {
            return passengers.reduce(
                (acc, { bag }) => {
                    acc[bag]++;
                    return acc;
                },
                [0, 0]
            );
        },

        getTotal() {
            const prices = [
                [this.priceAdult, this.priceAdultBag],
                [this.priceChild, this.priceChildBag],
                [this.priceInfant, this.priceInfantBag],
            ];

            const countPassengers = [
                this.getCountPassengers(this.formBags.ADT),
                this.getCountPassengers(this.formBags.CHD),
                this.getCountPassengers(this.formBags.INF),
            ];

            const [adults, children, infants] = countPassengers.map(
                ([noBag, withBag], index) => {
                    const [priceNoBag, priceWithBag] = prices[index];

                    return noBag * priceNoBag + withBag * priceWithBag;
                }
            );

            return this.formatPrice(
                (adults + children + infants + this.additional) *
                    this.exchangeRate
            );
        },
    },
};
</script>
