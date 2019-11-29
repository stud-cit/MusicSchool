<template>
    <div>
        <page-title title="актуальні" uptitle="новини"></page-title>
        <section class="history-section mt-50">
            <b-container class="news-list">

                <div class="news" v-for="i in news">
                    <div class="news-description">
                        <h3 class="news-date">{{i.date}}</h3>
                        <p class="news-text">{{i.title}}</p>
                        <hr class="news-line">
                    </div>
                    <div class="news-img">
                        <img :src="i.img" alt="" class="news-img">
                    </div>
                </div>
            </b-container>


        </section>
    </div>
</template>

<script>
    export default {
        name: "NewsComponent",
        data() {
            return {
                news: [
                    { id: 1, date: '01.01.19', title: 'kek lol kek lol kek lol kek lol', img: "/img/man_scream.png"},
                    { id: 2, date: '01.01.01', title: 'heute ist goot', img: "/img/man_scream.png" },
                    { id: 3, date: '01.01.18', title: 'abra kadabra', img: "/img/man_scream.png" },
                    { id: 4, date: '01.01.15', title: 'peremoga', img: "/img/man_scream.png" },
                    { id: 5, date: '01.01.16', title: 'ne mogu bez', img: "/img/man_scream.png" },
                    { id: 6, date: '01.01.18', title: 'start rofl', img: "/img/man_scream.png" },
                    { id: 7, date: '01.01.18', title: 'omg', img: "/img/man_scream.png" },
                    { id: 8, date: '01.01.19', title: 'kek lol arbidol', img: "/img/man_scream.png" },
                    { id: 9, date: '01.01.18', title: `peremogen'ka`, img: "/img/man_scream.png" },
                ]
            }
        },
        computed: {

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

    .news-description {
        padding: 50px 10px 10px;
        max-width: 190px;
        margin: 0 auto;
    }

    .news-img {
        width: 100%;
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
