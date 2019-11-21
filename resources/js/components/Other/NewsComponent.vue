<template>
    <div>
        <page-title title="актуальні" uptitle="новини"></page-title>
        <section class="history-section mt-50">
            <b-container class="news-list">

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>

                <div class="news">
                    <div class="news-description">
                        <h3 class="news-date">01.10.19</h3>
                        <p class="news-text">Lorem Ipsum is simply dummy text </p>
                        <hr class="news-line">
                    </div>
                    <div class="img">
                        <img src="/img/man_scream.png" alt="" class="news-img">
                    </div>
                </div>



            </b-container>

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
        </section>
    </div>
</template>

<script>
    export default {
        name: "NewsComponent",
        data() {
            return {
                perPage: 3,
                currentPage: 1,
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
