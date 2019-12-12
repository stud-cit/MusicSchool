<template>
    <div>
        <page-title title="галерея" uptitle="Різноманітність"></page-title>
        <section class="gallery-section mt-50">
            <b-container >
                <div class="btn-group">
                    <button :class="[{active: this.category == 'all'}, 'mr-4']" @click="setFilter('all')">Всі файли</button>
                    <button :class="[{active: this.category == 'img'}, 'mr-4']" @click="setFilter('img')">Фотографії</button>
                    <button :class="{active: this.category == 'video'}" @click="setFilter('video')">Відеоролики</button>
                </div>
                <transition-group name="list" tag="div" class="row gallery-list">

                    <b-col cols="12" md="6" xl="4" v-for="item of filteredItems" class="list-item" :key="item.id">
                        <img v-if="item.type == 'img'" :src="'/user-file/gallery/'+item.file" alt="">
                        <img v-else :src="'//img.youtube.com/vi/'+item.file.slice(item.file.length - 11, item.file.length)+'/mqdefault.jpg'">
                    </b-col>

                </transition-group>

            </b-container>
            <paginate :items="filteredItems" @paginateArray="paginateArray = $event"></paginate>
        </section>
    </div>

</template>

<script>
    import paginate from '../PaginationComponent';
    export default {
        data() {
            return {
                category: 'all',
                data: [],
                filteredItems: [],
                paginateArray: []
            }
        },
        created() {
            this.getData();
            this.filterList();
        },
        methods: {
            setFilter(category){
                this.category = category;
                this.filterList();
            },
            filterList() {
                if(this.category != 'all') {
                    this.filteredItems = this.data.filter((item) => {
                        return item.type == this.category;
                    })
                }
                else {
                    this.filteredItems = this.data;
                }
            },
            getData() {
                axios.get('/api/gallery')
                    .then((response) => {
                        this.data = response.data;
                        this.filteredItems = response.data;
                    })
            },
        },
        components: {
            paginate,
        }
    }
</script>

<style lang="sass" scoped>
    .gallery-section
        /*animation*/
        .list-enter
            transform: scale(0.5) translateY(-80px)
            opacity: 0


        .list-leave-to
            transform: translateY(30px)
            opacity: 0


        .list-leave-active
            position: absolute
            z-index: -1

        .list-item
            transition: all .5s ease-in-out

        /*style*/
        .btn-group
            display: flex
            button
                padding: 16px 25px
                border: 1px solid #707070
                background-color: #ffffff
                outline: none
                color: #707070
                font-family: Montserrat
                font-size: 20px
                line-height: 1.2
                font-weight: 400

            .active
                background-color: #6a0017
                color: #ffffff

        .list-item
            margin-top: 30px
            img
                width: 100%
                height: 316px
                object-fit: cover
                object-position: center 0

    // adaptive

    @media (max-width: 1199px)
        .gallery-section
            .btn-group
                button
                    flex-grow: 1
                    flex-wrap: wrap
    @media (max-width: 767px)
        .gallery-section
            .btn-group
                button
                    font-size: 14px
    @media (max-width: 575px)
        .mr-4
            margin-right: 0 !important
        .gallery-section
            .btn-group
                flex-wrap: wrap
                button
                    padding: 10px 5px
                    font-size: 14px
</style>
