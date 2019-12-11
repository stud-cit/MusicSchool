<template>
    <div>
        <page-title title="досягнення" uptitle="важливі"></page-title>
        <section class="history-section mt-50">
            <b-container class="news-list">

                <div class="news" v-for="i in paginateArray" :key="i.id">
                    <router-link class="news-router" :to="{ name: 'achievements-item',
                             params: {id: i.id, date: i.date, title: i.title, img: i.img, text: i.text}}"
                    >
                        <div class="news-description">
                            <h3 class="news-date">{{i.date}}</h3>
                            <p class="news-text">{{i.title}}</p>
                            <hr class="news-line">
                        </div>
                        <div class="news-img-block">
                            <img :src="i.img[0]" alt="" class="news-img">
                        </div>
                    </router-link>
                </div>
            </b-container>

            <paginate :items="news" @paginateArray="paginateArray = $event" perPage="6"></paginate>
        </section>
    </div>
</template>

<script>
    import paginate from '../PaginationComponent';

    export default {
        name: "NewsComponent",
        data() {
            return {
                news: [
                    { id: 1, date: '01.01.19', title: 'kek lol kek lol kek lol kek lol', img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum'},
                    { id: 2, date: '01.01.01', title: 'heute ist goot', img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum' },
                    { id: 3, date: '01.01.18', title: 'abra kadabra', img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum' },
                    { id: 4, date: '01.01.15', title: 'peremoga', img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum' },
                    { id: 5, date: '01.01.16', title: 'ne mogu bez', img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum' },
                    { id: 6, date: '01.01.18', title: 'start rofl', img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum' },
                    { id: 7, date: '01.01.18', title: 'omg', img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum' },
                    { id: 8, date: '01.01.19', title: 'kek lol arbidol', img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum' },
                    { id: 9, date: '01.01.18', title: `peremogen'ka`, img: ["/img/man_scream.png", "/img/test.jpg", "/img/test1.jpg", "/img/test2.jpg"], text: 'lorem ipsum' },
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
    .news-list {
        display: flex;
        flex-wrap: wrap;
    }

    .news {
        position: relative;
        width: 30%;
        margin: 15px 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
        overflow: hidden;
        box-shadow: 5px 5px 25px rgba(0, 0, 0, 0.16);
        transition: background .2s linear;
    }

    .news-router {
        display: flex;
        flex: 1 1 0;
        flex-direction: column;
        justify-content: space-between;
        text-decoration: none;
    }

    .news-description {
        padding: 50px 10px 10px;
        max-width: 190px;
        margin: 0 auto;
    }

    .news-img-block {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        width: 100%;
        max-width: 100%;
        height: 220px;
    }

    .news-img {
        display: block;
        width: 100%;
        max-width: 100%;
        height: inherit;
    }

    .news-date {
        color: #2b2b2b;
        font-size: 50px;
        font-weight: 900;
        line-height: 78px;
        transition: color .2s linear;
    }

    .news-text {
        font-weight: 600;
        color: #2b2b2b;
        font-size: 16px;
        font-style: italic;
        line-height: 20px;
        transition: color .2s linear;
    }

    .news-line {
        width: 50px;
        color: #000;
        background: #000;
        transition: color .2s linear,
        background .2s linear;
    }

    .news:hover {
        background: #000;
    }

    .news:hover .news-date {
        color: #ffffff;
    }

    .news:hover .news-text {
        color: #ffffff;
    }

    .news:hover .news-line {
        color: #ffffff;
        background: #ffffff;
    }
</style>
