<template>
    <div>
        <!--
        <b-container>
            <b-row>
                <b-col cols="4">
                    <div>
                        <p class="text_style_big"><small>Актуальні</small><br>новини</p>
                    </div>
                </b-col>
            </b-row>

            <b-row>
                <b-col cols="12" class="news_block_all">

                    <b-card no-body>
                        <b-tabs pills card end>
                            <b-tab title="1">
                                <div>
                                    <b-card no-body class="overflow-hidden" style="max-width: 540px;">
                                        <b-row>
                                            <b-col md="12">
                                                <b-card-img src="https://picsum.photos/400/400/?image=20"
                                                            class="rounded-0"></b-card-img>
                                            </b-col>
                                            <b-col>
                                                <b-card-body title="Horizontal Card">
                                                    <b-card-text>
                                                        This is a wider card with supporting text as a natural lead-in
                                                        to additional content.
                                                        This content is a little bit longer.
                                                    </b-card-text>
                                                </b-card-body>
                                            </b-col>
                                        </b-row>
                                    </b-card>
                                </div>

                            </b-tab>



                                <b-card img-src="https://placekitten.com/300/300"
                                        img-alt="Card image"
                                        img-right title="Проведення музичного конкурсу"
                                        class="text_style_mid"
                                >
                                    <b-card-text>
                                        Some quick example text to build on the card and make up the bulk of the card's
                                        content.
                                    </b-card-text>
                                </b-card>
                            </b-tab>

                        </b-tabs>
                    </b-card>
                </b-col>
            </b-row>
        </b-container>
        -->
    </div>
</template>

<script>
    export default {
        name: 'CarouselPage',
        components: {},

    }
</script>

<style scoped>

    .all_block {
        margin-top: 55px;
    }

    .add_block {
        background-image: url("../img/bl1.png");
        background-size: cover;
        width: 50%;
        height: 665px;
        position: absolute;
        margin-top: 150px;
    }

    .mt-4 {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 600px;
    }

    .news_block {
        margin-top: 30px;
    }

    .example-slide {
        align-items: center;
        background-color: #666;
        color: #999;
        display: flex;
        font-size: 1.5rem;
        justify-content: center;
        min-height: 10rem;
    }

    .btn-outline-dark {
        color: white;
        border-color: white;
        width: 255px;
        height: 65px;
        font-size: 22px;
        text-transform: uppercase;
    }

    .btn-outline-dark:hover {
        color: white;
        background-color: black;
        border-color: black;
    }

    .text_style_big {
        color: black;
        font-size: 70px;
        font-weight: 800;
        text-transform: uppercase;
        line-height: 60px;
        margin-bottom: 35px;
    }

    .text_style_big small {
        font-size: 54px;
        letter-spacing: 6px;
        font-weight: 300;
        line-height: 20px;
    }

    .text_style_mid {
        font-size: 32px;
        line-height: 30px;
    }

</style>