<template>
    <div>
        <page-title title="актуальні" uptitle="новини"></page-title>
        <section class="history-section mt-50">
            <b-container class="news-list">

                <div class="news" v-for="i in items">
                    <div class="news-description">
                        <h3 class="news-date">{{i.date}}</h3>
                        <p class="news-text">{{i.title}}</p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
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
                items: [
                    { id: 1, date: '01.01.19', title: 'kek lol kek lol kek lol kek lol', img: ''},
                    { id: 2, date: '01.01.01', title: 'heute ist goot', img: '' },
                    { id: 3, date: '01.01.18', title: 'abra kadabra', img: '' },
                    { id: 4, date: '01.01.15', title: 'peremoga', img: '' },
                    { id: 5, date: '01.01.16', title: 'ne mogu bez', img: '' },
                    { id: 6, date: '01.01.18', title: 'start rofl', img: '' },
                    { id: 7, date: '01.01.18', title: 'omg', img: '' },
                    { id: 8, date: '01.01.19', title: 'kek lol arbidol', img: '' },
                    { id: 9, date: '01.01.18', title: `peremogen'ka`, img: '' },
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
        width: 30%;
        margin: 15px 15px;
        display: flex;
        flex-direction: column;
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
