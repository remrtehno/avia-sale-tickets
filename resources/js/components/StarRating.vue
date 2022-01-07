<template>
    <div>
        <vue-star-rating
            :read-only="readOnly"
            v-model="currentRating"
            :star-size="size"
            @rating-selected="setCurrentSelectedRating"
        ></vue-star-rating>
    </div>
</template>

<script>
import VueStarRating from "vue-star-rating";

export default {
    components: { VueStarRating },
    props: {
        readOnly: { default: false, type: Boolean },
        rating: { default: 0, type: Number },
        size: { default: 18, type: Number },
    },
    methods: {
        setCurrentSelectedRating(rating) {
            console.log(rating);
            console.log(this.currentRating);
        },
        //@TODO Implement to Axios request to set Rating
        // https://www.npmjs.com/package/vue-star-rating
    },
    data() {
        return {
            currentRating: this.rating,
        };
    },
};
</script>
