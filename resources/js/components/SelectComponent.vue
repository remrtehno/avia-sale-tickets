<template>
    <div>
        <select :name="name" :class="className" :data-search="this.search">
            <option v-if="this.showEmpty" value="">Не выбрано</option>
            <option
                :value="getValue(index)"
                :selected="value === getValue(index)"
                v-for="(option, index) in dataOptions"
                :key="option"
            >
                {{ option }}
            </option>
        </select>
    </div>
</template>

<script>
import { pipe, pluck, uniq } from "ramda";

export default {
    props: {
        options: { default: null, type: String },
        values: { default: null, type: String },
        name: { default: null, type: String },
        className: { default: null, type: String },
        pluck: { default: null, type: String },
        value: { default: null, type: String },
        search: { default: false, type: Boolean },
        showEmpty: { default: false, type: Boolean },
    },
    mounted() {
        if (this.options) {
            this.dataOptions = (
                this.pluck ? pipe(pluck(this.pluck), uniq) : pipe(uniq)
            )(JSON.parse(this.options));
        }

        if (this.values) {
            this.dataValues = JSON.parse(this.values);
        }
    },
    methods: {
        getValue(index) {
            return this.dataValues.length > 0
                ? this.dataValues[index]
                : this.dataOptions[index];
        },
    },
    data() {
        return {
            dataOptions: [],
            dataValues: [],
        };
    },
};
</script>
