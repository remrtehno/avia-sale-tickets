<template>
    <div>
        <select
            :name="name"
            :class="className"
            :data-showSearch="this.showSearch"
        >
            <option v-if="this.showEmpty" value="">Не выбрано</option>
            <option
                :value="getValue(index)"
                :selected="getSelected(index)"
                v-for="(option, index) in dataOptions"
                :key="option"
            >
                {{ option }}
            </option>
        </select>
    </div>
</template>

<script>
import { pipe, pluck, uniq, equals } from "ramda";
import { DATA_TYPES } from "../constants/dataTypes";

export default {
    props: {
        //data for render options
        options: { default: null, type: String },
        //provided values for rendered options
        values: { default: null, type: String },
        //name for select
        name: { default: null, type: String },
        //custom class name for select
        className: { default: null, type: String },
        //select specified property from povided data
        pluck: { default: null, type: String },
        //calue provided for detect current option selected
        value: { default: null, type: String },
        //type of value provided
        valueType: { default: DATA_TYPES.STRING, type: String },
        //show search bash
        showSearch: { default: false, type: Boolean },
        //show not selected option
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

        if (this.valueType === DATA_TYPES.JSON) {
            try {
                this.dataSelectedValue = JSON.parse(this.value);
            } catch (e) {
                console.error("Couldn't parse JSON");
            }
        } else if (this.valueType === DATA_TYPES.STRING) {
            this.dataSelectedValue = this.value;
        }
    },
    methods: {
        getValue(index) {
            return this.dataValues.length > 0
                ? this.dataValues[index]
                : this.dataOptions[index];
        },

        getSelected(index) {
            const currentValue = this.getValue(index);

            return equals(this.dataSelectedValue, currentValue);
        },
    },
    data() {
        return {
            dataOptions: [],
            dataValues: [],
            dataSelectedValue: null,
        };
    },
};
</script>
