<template>
    <div>

        <page-title title="історія школи" uptitle="дивовижна"></page-title>

        <section class="history-section mt-50">
            <b-container class="history-list">

                <b-row class="list-item d-flex" v-for="item in paginateArray" :key="item.id">
                    <b-col cols="12" xl="4" class="item-title-block">
                        <p class="year">{{item.date}}</p>
                        <p class="title">{{item.title}}</p>
                    </b-col>
                    <b-col cols="12" xl="8" class="content-block" v-if="item.images.length">
                        <b-carousel id="carousel-fade" fade indicators v-for="photo in item.images" :key="photo.images_id">
                            <b-carousel-slide
                                    caption="Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                Lorem Ipsum is simply dummy text of the printing orem Ipsum is simply dummy"
                                    :img-src="photo.file"
                            ></b-carousel-slide>
                        </b-carousel>
                    </b-col>
                    <b-col cols="12" xl="8" class="content-block" v-else>
                        <img src='/img/empty.png' alt="" class="news-img">
                    </b-col>
                </b-row>

                <paginate :items="data" @paginateArray="paginateArray = $event" :perPage="3"></paginate>

            </b-container>
        </section>

    </div>

</template>

<script>
    import paginate from '../PaginationComponent';

    export default {
        data() {
            return {
                data: [],
                paginateArray: [],
            }
        },
        components: {
            paginate
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                axios.get('/api/story')
                    .then((response) => {
                        console.log(response.data)
                        this.data = response.data;
                    })
            },
        }
    }
</script>

<style lang="sass" scoped>

    // page

    .history-section
        .item-title-block
            display: flex
            flex-direction: column
            justify-content: center
            align-items: center
            padding: 15px 60px 15px 15px
            border-right: 5px solid #6a0017
            line-height: 1
            .year
                color: #e91b47
                font-family: Montserrat
                font-size: 60px
                font-weight: 700
                text-transform: uppercase
                margin-bottom: 10px
            .title
                color: #2b2b2b
                font-family: Montserrat
                font-size: 31px
                font-weight: 700
                text-transform: uppercase
            &::before
                content: ""
                display: block
                position: absolute
                top: 50%
                right: -20px
                margin-top: -18px
                width: 35px
                height: 35px
                background-image: url("/img/history-circle.png")
            &::after
                content: ""
                display: block
                position: absolute
                top: 50%
                right: 30px
                margin-top: -16px
                width: 18px
                height: 31px
                background-image: url("/img/history-arrow.png")
        .content-block
            padding: 25px 0 25px 30px
        .list-item:last-of-type .content-block
                padding-bottom: 0
        .list-item:first-of-type .content-block
            padding-top: 0



    //adaptive

    @media (max-width: 1199px)
        .history-section
            .item-title-block
                flex-direction: row
                justify-content: space-between
                align-items: flex-end
                padding: 0 15px
                border-right: none
                .year
                    font-size: 91px
                    margin-bottom: 0
                    margin-right: 10px
                .title
                    font-size: 36px
                    text-align: right
                &::before
                    display: none
                &::after
                    display: none

            .content-block
                padding: 30px 15px 50px 15px
            .list-item:last-of-type .content-block
                padding-bottom: 30px
            .list-item:first-of-type .content-block
                padding-top: 30px

    @media (max-width: 575px)
        .history-section
            .item-title-block
                flex-direction: column
                justify-content: flex-start
                align-items: flex-start
                .year
                    font-size: 50px
                    margin-bottom: 10px
                    margin-right: 0
                .title
                    font-size: 28px
                    text-align: left


            .content-block
                padding: 10px 15px 40px 15px
            .list-item:last-of-type .content-block
                padding-bottom: 0
            .list-item:first-of-type .content-block
                padding-top: 10px

</style>
