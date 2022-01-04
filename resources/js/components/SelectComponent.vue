<template>
    <div>
        <select :name="name" :class="className" :data-search="this.search">
            <option v-if="this.showEmpty" value="">Не выбрано</option>
            <option
                :selected="value === option"
                v-for="option in dataOptions"
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
    },
    data() {
        return {
            dataOptions: [],
        };
    },
};
</script>
