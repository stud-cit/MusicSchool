<template>
    <div>
        <page-title :title="page.title" :uptitle="page.uptitle" :description="page.description"></page-title>
        <section class="history-section mt-50">
            <b-container>
                <router-link :to="{ name: 'news'}" class="news-item-router">
                    <img src="/img/arrow-left.png" alt="" class="news-item-router-img">
                    <h3 class="news-item-router-title">Всі новини</h3>
                </router-link>

                <div class="news-item">
                    <div class="news-item-container">
                        <b-carousel
                            v-if="data.images.length"
                            id="carousel-fade"
                            :interval="8000"
                            controls
                            img-width="1024"
                            img-height="450"
                        >
                            <silentbox-group>
                                <silentbox-item v-for="(i, index) in data.images" :key="index" :src="i.file">
                                    <b-carousel-slide :img-src="i.file"></b-carousel-slide>
                                </silentbox-item>
                            </silentbox-group>
                        </b-carousel>
                        <div class="news-item-description">
                            <div class="news-item-heading">
                                <h3 class="news-item-title"> {{ data.title }}</h3>
                                <h3 class="news-item-date"> {{ data.date.split('-').reverse().join('.').substr(0,6) +
                                    data.date.split('-').reverse().join('.').substr(7,2)}}</h3>
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
    import getData from '../mixins/getData';
    export default {
        name: "NewsItemComponent",
        mixins: [getData],
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
            this.getInfoPage('news');
        },
        methods: {
            getData() {
                axios.get('/api/news/'+this.$route.params.id)
                    .then((response) => {
                        this.data = response.data;
                    })
            }
        }
    }
</script>

<style>
    .w-100 {
        max-height: 400px;
        object-fit: scale-down;
        background-color: #3d3a3a;
    }
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
        color: #3d3a3a;
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
        font-size: 18px;
        font-weight: 800;
        text-transform: uppercase;
    }
    .news-item-date {
        margin-left: 25px;
        font-size: 18px;
        font-weight: 800;
        text-transform: uppercase;
    }
    .news-item-line {
        width: 50px;
        height: 1px;
        border-color: #3d3a3a;
        margin-left: 0;
    }
    .news-item-text {
        white-space: pre-wrap;
        text-indent: 1.2em;
        margin-bottom: 77px;
        font-size: 18px;
    }
    /*max-width: 768px*/
    @media (max-width: 768px) {
        .news-item-subwrapper {
            width: 584px;
        }
        .news-item-heading {
            flex-direction: column;
        }
        .news-item-heading {
            flex-direction: column-reverse;
            text-align: right;
        }
    }
    /*max-width: 414px*/
    @media (max-width: 414px) {
        .news-item-subwrapper {
            width: 330px;
            bottom: -52px;
            right: -29px;
        }
    }
</style>
