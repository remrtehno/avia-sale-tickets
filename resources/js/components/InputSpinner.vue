<template>
    <div class="twidget-container">
        <div id="twidget-passenger-form" style="">
            <input
                type="hidden"
                name="totalPassengers"
                :value="totalPassengers"
            />
            <input type="hidden" name="adults" :value="adults" />
            <input type="hidden" name="children" :value="children" />
            <input type="hidden" name="infants" :value="infants" />
            <div class="twidget-passenger-form-wrapper">
                <ul class="twidget-age-group">
                    <li>
                        <div class="twidget-cell twidget-age-name">
                            Взрослые
                        </div>
                        <div class="twidget-cell twidget-age-select">
                            <number-input-spinner
                                v-model="adults"
                                :min="1"
                                :max="max.adults"
                                @input="input($event, 'adults')"
                                :key="componentKey"
                            />
                        </div>
                    </li>
                    <li>
                        <div class="twidget-cell twidget-age-name">
                            Дети до 12 лет
                        </div>
                        <div class="twidget-cell twidget-age-select">
                            <number-input-spinner
                                v-model="children"
                                :min="0"
                                :max="max.children"
                                @input="input($event, 'children')"
                                :key="componentKey"
                            />
                        </div>
                    </li>
                    <li>
                        <div class="twidget-cell twidget-age-name">
                            Дети до 2 лет
                        </div>
                        <div class="twidget-cell twidget-age-select">
                            <number-input-spinner
                                v-model="infants"
                                :min="0"
                                :max="adults"
                                :key="componentKey"
                            />
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import NumberInputSpinner from "vue-number-input-spinner";
import { mapGetters } from "vuex";

export default {
    components: { NumberInputSpinner },
    props: {
        maxPassengers: {
            type: Number,
            default: 10,
        },
        maxLimit: {
            type: Number,
            default: 10,
        },
    },
    data() {
        return {
            componentKey: 0,
            adults: 1,
            children: 0,
            infants: 0,
            max: {
                adults: this.maxPassengers,
                children: this.maxPassengers - 1,
            },
        };
    },
    methods: {
        input(event, name) {
            if (name === "adults") {
                this.max.children = this.computedMaxPassengers - this.adults;
            }

            if (name === "children") {
                this.max.adults = this.computedMaxPassengers - this.children;
            }
        },
        //@TODO Best force rerender
        forceRerender() {
            this.componentKey += 1;
        },
    },
    computed: {
        ...mapGetters(["bookingForms"]),
        totalPassengers() {
            this.$store.commit("bookingFormCreator", {
                adults: this.adults,
                children: this.children,
                infants: this.infants,
            });

            return this.adults + this.children + this.infants;
        },
        computedMaxPassengers() {
            if (this.maxPassengers > this.maxLimit) {
                return this.maxLimit;
            }
            return this.maxPassengers;
        },
    },
    mounted() {
        this.max = {
            adults: this.computedMaxPassengers,
            children: this.computedMaxPassengers - 1,
        };
    },
    watch: {
        bookingForms() {
            this.adults = this.bookingForms.adults;
            this.children = this.bookingForms.children;
            this.infants = this.bookingForms.infants;
            //@TODO Best force rerender
            this.forceRerender();
        },
    },
};
</script>

<style lang="scss">
#twidget-passenger-form,
#twidget-guest-form {
    width: 270px;
    padding-top: 7px;
    background: #fff;
    color: var(--black);

    z-index: 999;
}
.twidget-age-group {
    display: table;
    width: 100%;
    padding: 0;
}
.twidget-age-group li {
    display: table-row;
}
.twidget-age-group li .twidget-age-name {
    width: 50%;
}
.twidget-age-group li .twidget-cell {
    display: table-cell;
    height: 44px;
    vertical-align: middle;
}
.twidget-age-group li .twidget-age-select {
    padding-right: 10px;
    width: 40%;
}

.twidget-age-select .twidget-dec {
    width: 35px;
    height: 35px;
    display: inline-block;
    text-indent: -9999px;
    cursor: pointer;
    border-radius: 25px;
    line-height: 35px;
    background: #fff 50% 50%/14px no-repeat;
    /* background-image: url(./images/minus.png); */
}
.twidget-age-select .twidget-num {
    width: 30%;
    text-align: center;
    line-height: 1.4;
    display: inline-block;
}
.twidget-age-select .twidget-inc {
    width: 35px;
    height: 35px;
    display: inline-block;
    text-indent: -9999px;
    cursor: pointer;
    border-radius: 25px;
    line-height: 35px;
    background: #fff 50% 50%/14px no-repeat;
    background-image: url("../../../public/static/images/plus.png");
}
.twidget-age-select .twidget-num input {
    width: 100%;
    padding: 0;
    text-align: center;
}
.twidget-tab-content input[type="text"] {
    line-height: 50px;
    height: 50px;
    padding: 0 37px 0 12px;
    overflow: hidden;
    text-overflow: ellipsis;
}
.vnis__button {
    width: 35px !important;
    height: 35px !important;
    background: #fff 50% 50%/14px no-repeat !important;
    color: var(--main-green) !important;
    border-radius: 25px;
    transition: 0.3s !important;
    font-size: 0px !important;
    &:first-of-type {
        background-image: url("../../../public/static/images/minus.png") !important;
    }
    &:last-of-type {
        background-image: url("../../../public/static/images/plus.png") !important;
    }

    &:hover {
        background-color: #e0e0e0 !important;
    }
    &:focus {
        outline: none !important;
    }
}
.vnis__input {
    font-size: 14px !important;
    height: 35px !important;
    border: 0 !important;
}
</style>
