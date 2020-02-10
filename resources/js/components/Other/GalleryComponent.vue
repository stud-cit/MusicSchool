<template>
    <div>
        <page-title :title="page.title" :uptitle="page.uptitle" :description="page.description"></page-title>
        <section class="gallery-section mt-50">
            <div class="container" >
                <div class="btn-group">
                    <button :class="[{active: this.category == 'all'}, 'mr-4']" @click="setFilter('all')">Всі файли</button>
                    <button :class="[{active: this.category == 'img'}, 'mr-4']" @click="setFilter('img')">Фотографії</button>
                    <button :class="{active: this.category == 'video'}" @click="setFilter('video')">Відеоролики</button>
                </div>
                <silentbox-group name="list" tag="div" class="row gallery-list">
                    <silentbox-item v-for="item of paginateArray" v-if="item.type == 'img'" :key="item.id" :src="'/user-file/gallery/'+item.file" class="col-12 col-md-6 col-xl-4 list-item">
                        <img :src="'/user-file/gallery/'+item.file">
                    </silentbox-item>
                    <div v-else class="col-12 col-md-6 col-xl-4 list-item">
                        <iframe height="300px" width="100%" :src="'https://www.youtube.com/embed/'+item.file.slice(item.file.length - 11, item.file.length)" frameborder="0" allowfullscreen></iframe>
                    </div>
                </silentbox-group>
            </div>
            <paginate :items="filteredItems" @paginateArray="paginateArray = $event" :perPage="12"></paginate>
        </section>
    </div>

</template>

<script>
    import paginate from '../PaginationComponent';
    import getData from '../mixins/getData';
    export default {
        mixins: [getData],
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
            this.getInfoPage('gallery');
            document.title = "Галерея";
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
            }
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
