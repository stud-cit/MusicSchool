<template>
    <div>
        <page-title :title="page.title" :uptitle="page.uptitle" :description="page.description"></page-title>
        <section class="news-section mt-50">
            <b-container class="news-list">
                <div class="news" v-for="i in paginateArray" :key="i.id">
                    <router-link class="news-router" :to="{ name: 'news-item',
                        params: {id: i.id}}"
                    >
                        <div class="news-description">
                            <h3 class="news-date">{{i.date.slice(2).split('-').reverse().join('.')}}</h3>
                            <p class="news-text">{{i.title}}</p>
                            <hr class="news-line">
                        </div>
                        <div class="news-img-block">
                            <img v-if="i.images.length" :src="i.images[0].file" alt="" class="news-img">
                            <img v-else src='/img/empty.png' alt="" class="news-img">
                        </div>
                    </router-link>
                </div>
            </b-container>
            <paginate :items="data" @paginateArray="paginateArray = $event" :perPage="12"></paginate>
        </section>
    </div>
</template>

<script>
    import paginate from '../PaginationComponent';
    import getData from '../mixins/getData';

    export default {
        name: "NewsComponent",
        mixins: [getData],
        data() {
            return {
                data: [],
                paginateArray: []
            }
        },
        components: {
            paginate
        },
        created() {
            this.getData();
            this.getInfoPage('news');
            document.title = "Новини";
        },
        methods: {
            getData() {
                axios.get('/api/news')
                    .then((response) => {
                        this.data = response.data;
                    })
            }
        }
    }
</script>

<style scoped>
    .news-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .news-list {
        display: flex;
        flex-wrap: wrap;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
    }
    .news {
        position: relative;
        width: 250px;
        margin: 13px 13px;
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
        width: 250px;
        max-width: 100%;
        height: 200px;
    }
    .news-img {
        object-fit: cover;
        display: block;
        width: 100%;
        max-width: 100%;
        height: 100%;
    }
    .news-date {
        margin-left: -10px;
        color: #2b2b2b;
        font-size: 40px;
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
    /*max-width: 768px*/
    @media (max-width: 768px) {
        .news-list {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
    }
</style>
