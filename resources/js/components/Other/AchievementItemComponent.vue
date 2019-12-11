<template>
    <div>
        <page-title title="досягнення" uptitle="важливі"></page-title>
        <section class="history-section mt-50">
            <b-container>
                <router-link :to="{ name: 'achievements'}" class="news-item-router">
                    <img src="/img/arrow-left.png" alt="" class="news-item-router-img">
                    <h3 class="news-item-router-title">Важливі досягнення</h3>
                </router-link>

                <div class="news-item">
                    <div class="news-item-container">
                        <b-carousel
                            id="carousel-fade"
                            :interval="4000"
                            indicators
                            fade
                            img-width="1024"
                            img-height="450"
                        >
                            <b-carousel-slide
                                class="news-item-img"
                                v-for="(i, index) in this.$route.params.img"
                                :img-src="i"
                                :key="index"
                            ></b-carousel-slide>

                        </b-carousel>
                        <div class="news-item-description">
                            <div class="news-item-heading">
                                <h3 class="news-item-title"> {{ this.$route.params.title }}</h3>
                                <h3 class="news-item-date"> {{ this.$route.params.date }}</h3>
                            </div>

                            <hr class="news-item-line">
                            <div class="news-item-text">
                                <p>{{ this.$route.params.text }}</p>
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
    import paginate from '../PaginationComponent';

    export default {
        name: "AchievementItemComponent",
        data() {
            return {
                news: [
                    { id: 1, date: '01.01.19', title: 'kek lol kek lol kek lol kek lol', img: "/img/man_scream.png", text: 'lorem ipsum'},
                    { id: 2, date: '01.01.01', title: 'heute ist goot', img: "/img/test.jpg", text: 'lorem ipsum' },
                    { id: 3, date: '01.01.18', title: 'abra kadabra', img: "/img/test1.jpg", text: 'lorem ipsum' },
                    { id: 4, date: '01.01.15', title: 'peremoga', img: "/img/man_scream.png", text: 'lorem ipsum' },
                    { id: 5, date: '01.01.16', title: 'ne mogu bez', img: "/img/man_scream.png", text: 'lorem ipsum' },
                    { id: 6, date: '01.01.18', title: 'start rofl', img: "/img/man_scream.png", text: 'lorem ipsum' },
                    { id: 7, date: '01.01.18', title: 'omg', img: "/img/man_scream.png", text: 'lorem ipsum' },
                    { id: 8, date: '01.01.19', title: 'kek lol arbidol', img: "/img/man_scream.png", text: 'lorem ipsum' },
                    { id: 9, date: '01.01.18', title: `peremogen'ka`, img: "/img/man_scream.png", text: 'lorem ipsum' },
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
