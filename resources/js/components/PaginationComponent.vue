<template>
    <div>
    <slot></slot>
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
    </div>

</template>
<script>
    export default {

        props:{
            perPage: Number,
            currentPage: Number,
            items: Array

        },
        data() {
            return {

            }
        },
        computed: {

            // rows() {
            //     return this.items.length
            // },
            // paginateList() {
            //     return this.items.slice((this.currentPage-1)*this.perPage, this.currentPage*this.perPage);
            // },


        },

    }
</script>