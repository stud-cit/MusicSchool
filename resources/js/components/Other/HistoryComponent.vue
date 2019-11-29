<template>
    <div>

        <page-title title="історія школи" uptitle="дивовижна"></page-title>

        <section class="history-section mt-50">
            <b-container class="history-list">

                <b-row class="list-item d-flex" v-for="item in paginateArray" :key="item.id" >
                    <b-col xl=4 class="history-title-block">
                        <p class="year">2005</p>
                        <p class="title">Новий відділ {{item.id}}</p>
                    </b-col>
                    <b-col xl="8" class="content-block">
                        <b-carousel
                                id="carousel-fade"
                                fade
                                indicators >
                            <b-carousel-slide
                                    caption="Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                Lorem Ipsum is simply dummy text of the printing orem Ipsum is simply dummy"
                                    img-src="https://picsum.photos/1024/480/?image=10"
                            ></b-carousel-slide>
                            <b-carousel-slide
                                    caption="Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                Lorem Ipsum is simply dummy text of the printing orem Ipsum is simply dummy"
                                    img-src="https://picsum.photos/1024/480/?image=12"
                            ></b-carousel-slide>
                            <b-carousel-slide
                                    caption="Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                Lorem Ipsum is simply dummy text of the printing orem Ipsum is simply dummy"
                                    img-src="https://picsum.photos/1024/480/?image=22"
                            ></b-carousel-slide>
                        </b-carousel>
                    </b-col>
                </b-row>

                <paginate :items="items" @paginateArray="paginateArray = $event" perPage="3"></paginate>

            </b-container>
        </section>

    </div>

</template>

<script>
    import paginate from '../PaginationComponent';

    export default {
        data() {
            return {

                items: [
                    { id: 1 },
                    { id: 2 },
                    { id: 3 },
                    { id: 4 },
                    { id: 5 },
                    { id: 6 },
                    { id: 7 },
                    { id: 8 },
                    { id: 9 },
                ],
                paginateArray: [],
            }
        },
        computed: {

        },
        components: {
            paginate
        }

    }
</script>

<style lang="sass" scoped>
    .history-section
        .history-title-block
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

</style>
