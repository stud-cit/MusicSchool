<template>
    <div>
        <page-title title="актуальні" uptitle="новини"></page-title>
        <section class="history-section mt-50">
            <b-container>
                <router-link :to="{ name: 'news'}" class="news-item-router">
                    <img src="/img/arrow-left.png" alt="" class="news-item-router-img">
                    <h3 class="news-item-router-title">Всі новини</h3>
                </router-link>

                <div class="news-item">
                    <div class="news-item-container">
                        <b-carousel
                            v-if="data.images.length != 0"
                            id="carousel-fade"
                            :interval="4000"
                            indicators
                            fade
                            img-width="1024"
                            img-height="450"
                        >
                            <b-carousel-slide
                                class="news-item-img"
                                v-for="(i, index) in data.images"
                                :key="index"
                                :img-src="i.file"
                            ></b-carousel-slide>

                        </b-carousel>
                        <div class="news-item-description">
                            <div class="news-item-heading">
                                <h3 class="news-item-title"> {{ data.title }}</h3>
                                <h3 class="news-item-date"> {{ data.date }}</h3>
                            </div>

                            <hr class="news-item-line">
                            <div class="news-item-text">
                                <p>{{ data.text }}</p>
                            </div>
                        </div>

                        <div class="news-item-subwrapper"></div>
                    </div>
                </div>
            </b-container>
        </section>
    </div>
</template>

<script>
    export default {
        name: "NewsItemComponent",
        data() {
            return {
                data: {
                    title: '',
                    text: '',
                    date: '',
                    images: []
                },
            }
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                axios.get('/api/news/'+this.$route.params.id)
                    .then((response) => {
                        this.data = response.data;
                        this.data.date = this.data.date.slice(2).split('-').reverse().join('.');
                        console.log(this.data)
                    })
            },
        }
        /*v-for="i in this.$route.params.img"*/
    }
</script>

<style scoped>
    .news-item {
        position: relative;
        margin-bottom: 129px;
        display: flex;
        flex-direction: column;
        box-shadow: 5px 5px 25px rgba(0, 0, 0, 0.16);
        background: #ffffff;
    }

    .news-item-router {
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .news-item-router-img {
        margin-right: 24px;
        height: -webkit-fit-content;
        height: -moz-fit-content;
        height: fit-content;
    }

    .news-item-router-title {
        padding-top: 5px;
        font-size: 32px;
        text-decoration: none;
        color: #2B2B2B;
    }

    .news-item-subwrapper {
        width: 1059px;
        height: -webkit-fill-available;
        height: -moz-available;
        height: fill-available;
        background: -webkit-gradient(linear, left top, left bottom, from(#e91b47), to(#6a0017));
        background: -o-linear-gradient(top, #e91b47 0%, #6a0017 100%);
        background: linear-gradient(180deg, #e91b47 0%, #6a0017 100%);
        position: absolute;
        z-index: -100;
        bottom: -80px;
        right: -80px;
    }

    .news-item-img {
        position: relative;
        width: 100%;
        margin-bottom: 44px;
        height: 450px;
    }

    .news-item-description {
        padding: 0 45px;
        display: flex;
        flex-direction: column;
        justify-content: start;
    }

    .news-item-heading {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;

    }
    .news-item-title {
        font-size: 42px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .news-item-date {
        font-size: 42px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .news-item-line {
        width: 50px;
        height: 1px;
        border-color: #2B2B2B;
        margin-left: 0;
    }

    .news-item-text {
        margin-bottom: 77px;
        font-size: 18px;
    }
</style>
