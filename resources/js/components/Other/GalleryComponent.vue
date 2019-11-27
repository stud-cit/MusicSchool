<template>
    <div>
        <page-title title="галерея" uptitle="Різноманітність"></page-title>
        <section class="gallery-section mt-50">
            <b-container >
                <div class="btn-group">
                    <button :class="{active: this.category == 'all'} " @click="setFilter('all')">Всі файли</button>
                    <button :class="{active: this.category == 'image'} " @click="setFilter('image')">Фотографії</button>
                    <button :class="{active: this.category == 'video'} " @click="setFilter('video')">Відеоролики</button>
                </div>
                <transition-group name="list" tag="div" class="row items-list">

                    <b-col xl="4" v-for="item of paginateList" class="list-item" :key="item.id">
                        {{item.type}}
                        <img src="img/gallery-1.png" alt="">
                    </b-col>

                </transition-group>
                <b-pagination
                        v-model="currentPage"
                        :total-rows="rows"
                        :per-page="perPage"
                        first-text="<<"
                        prev-text="<"
                        next-text=">"
                        last-text=">>"
                        class="justify-content-center"
                ></b-pagination>
            </b-container>
        </section>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                perPage: 6,
                currentPage: 1,
                category: 'all',
                items: [
                    { id: 1, type: 'video' },
                    { id: 2, type: 'image' },
                    { id: 3, type: 'image' },
                    { id: 4, type: 'image' },
                    { id: 5, type: 'image' },
                    { id: 6, type: 'video' },
                    { id: 7, type: 'video' },
                    { id: 8, type: 'image' },
                    { id: 9, type: 'video' },
                    { id: 10, type: 'video' },
                    { id: 11, type: 'image' },
                    { id: 12, type: 'video' },
                    { id: 13, type: 'video' },
                    { id: 14, type: 'image' },
                    { id: 15, type: 'image' },
                ],
                filteredItems: [],
            }
        },
        created() {
          this.filterList();
        },
        computed: {


            rows() {
                return this.filteredItems.length
            },
            paginateList() {
                return this.filteredItems.slice((this.currentPage-1)*this.perPage, this.currentPage*this.perPage);
            },



        },
        methods: {
            setFilter(category){
                this.category = category;
                this.filterList();
            },
            filterList() {
                this.filteredItems = this.items;

                if(this.category != 'all') {
                    this.filteredItems = this.filteredItems.filter((item) => {
                        return item.type == this.category;
                    })
                }
                else{
                    this.filteredItems = this.filteredItems
                }

            },

        }
    }
</script>

<style scoped>

    .list-enter {
        transform: scale(0.5) translatey(-80px);
        opacity:0;
    }

    .list-leave-to{
        transform: translatey(30px);
        opacity:0;
    }

    .list-leave-active {
        position: absolute;
        z-index:-1;
    }
    .list-item
    {
        transition: all .5s ease-in-out;
    }
</style>
