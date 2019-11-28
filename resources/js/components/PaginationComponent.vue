<template>

    <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        first-text="<<"
        prev-text="<"
        next-text=">"
        last-text=">>"
        class="justify-content-center">
    </b-pagination>

</template>
<script>
    export default {

        props:{
            perPage: {
                type: Number,
                default: 6
            },
            items: Array

        },
        data() {
            return {
                currentPage: 1,
            }
        },
        computed: {

            rows() {
                this.$emit('paginateArray', this.items.slice((this.currentPage-1)*this.perPage, this.currentPage*this.perPage) );
                return this.items.length
            },


        },

    }
</script>