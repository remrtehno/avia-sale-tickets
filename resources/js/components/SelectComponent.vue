<template>
    <div>
        <select :name="name" :class="className">
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
    props: ["options", "name", "className", "pluck", "value"],
    mounted() {
        if (this.options && this.pluck) {
            this.dataOptions = pipe(
                pluck(this.pluck),
                uniq
            )(JSON.parse(this.options));
        }
    },
    computed() {},
    data() {
        return {
            dataOptions: [],
        };
    },
};
</script>
