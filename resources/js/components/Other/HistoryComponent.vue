<template>
    <div>
        <div class="title-block">
            <div class="notes">
                <b-container>
                    <b-row>
                        <b-col xl="8">
                            <h1 class="title">
                                <span class="uptitle">дивовижна</span><br>
                                історія школи
                            </h1>
                        </b-col>
                        <b-col xl="4">
                            <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text simply dummy text dum</div>
                        </b-col>
                    </b-row>


                </b-container>
            </div>
        </div>
        <section class="history-section">
            <b-container class="history-list">

                <b-row class="list-item d-flex" v-for="item in paginateList" :key="item.id" >
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
                <!--<b-row class="list-item d-flex">-->
                    <!--<b-col xl=4 class="history-title-block">-->
                        <!--<p class="year">2005</p>-->
                        <!--<p class="title">Новий відділ</p>-->
                    <!--</b-col>-->
                    <!--<b-col xl="8" class="content-block">-->
                        <!--<b-carousel-->
                                <!--id="carousel-fade"-->
                                <!--fade-->
                                <!--indicators >-->
                            <!--<b-carousel-slide-->
                                    <!--caption="Lorem Ipsum is simply dummy text of the printing and typesetting industry-->
                                <!--Lorem Ipsum is simply dummy text of the printing orem Ipsum is simply dummy"-->
                                    <!--img-src="https://picsum.photos/1024/480/?image=10"-->
                            <!--&gt;</b-carousel-slide>-->
                            <!--<b-carousel-slide-->
                                    <!--caption="Lorem Ipsum is simply dummy text of the printing and typesetting industry-->
                                <!--Lorem Ipsum is simply dummy text of the printing orem Ipsum is simply dummy"-->
                                    <!--img-src="https://picsum.photos/1024/480/?image=12"-->
                            <!--&gt;</b-carousel-slide>-->
                            <!--<b-carousel-slide-->
                                    <!--caption="Lorem Ipsum is simply dummy text of the printing and typesetting industry-->
                                <!--Lorem Ipsum is simply dummy text of the printing orem Ipsum is simply dummy"-->
                                    <!--img-src="https://picsum.photos/1024/480/?image=22"-->
                            <!--&gt;</b-carousel-slide>-->
                        <!--</b-carousel>-->
                    <!--</b-col>-->
                <!--</b-row>-->
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
                perPage: 4,
                currentPage: 1,
                items: [
                    { id: 1, first_name: 'Fred', last_name: 'Flintstone' },
                    { id: 2, first_name: 'Wilma', last_name: 'Flintstone' },
                    { id: 3, first_name: 'Barney', last_name: 'Rubble' },
                    { id: 4, first_name: 'Betty', last_name: 'Rubble' },
                    { id: 5, first_name: 'Pebbles', last_name: 'Flintstone' },
                    { id: 6, first_name: 'Bamm Bamm', last_name: 'Rubble' },
                    { id: 7, first_name: 'The Great', last_name: 'Gazzoo' },
                    { id: 8, first_name: 'Rockhead', last_name: 'Slate' },
                    { id: 9, first_name: 'Pearl', last_name: 'Slaghoople' },
                ]
            }
        },
        computed: {
            rows() {
                return this.items.length
            },
            paginateList() {
                return this.items.slice((this.currentPage-1)*this.perPage, this.currentPage*this.perPage);
            }

        },

    }
</script>

<style lang="sass" scoped>
    .history-section
        margin-top: 50px
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
        .list-item:last-of-type .content-block
                padding-bottom: 0
        .content-block
            padding-bottom: 50px
            padding-left: 30px
            padding-right: 0

</style>
