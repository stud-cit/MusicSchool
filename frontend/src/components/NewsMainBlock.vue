<template>
    <div>
        <div class="all_block">

            <div class="add_block"></div>
            <b-container>
                <b-row>
                    <b-col cols="4">
                        <div>
                            <p class="text_style_big"><small>Актуальні</small><br>новини</p>
                        </div>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="4" class="news_block_all">
                        <div class="news_block"  id = "text-style">
                            <div>
                                <p class="text_style_mid">Проведення музичного конкурсу</p>
                            </div>
                            <div>
                                <p>Конкурс на заміщення вакантної посади керівника музичної частини, який проходив у Львівському національному академічному театрі опери та балету
                                    імені Соломії Крушельницької завершено.Рішенням конкурсної комісії від 6 листопада 2019 року переможцем конкурсу на заміщення вакантної посади
                                    керівника музичної частини визнано –  Чередніченка Іванна Владимировна. Іван Володимирович
                                    диригент лауреат...</p>
                            </div>
                            <div>
                                <b-button squared variant="outline-dark">Більше інф</b-button>
                            </div>
                        </div>
                    </b-col>
                    <b-col cols="8" class="news_block">
                        <img src="../img/foto_news_1.png" alt="">
                    </b-col>
                </b-row>

            </b-container>

        </div>
    </div>
</template>

<script>
    export default {
        name: "NewsMainBlock",

    };
</script>

<style scoped>

    .all_block {
        margin-bottom: 200px;
    }

    .add_block {
        background-image: url("../img/bl1.png");
        background-size: cover;
        width: 50%;
        height: 665px;
        position: absolute;
        margin-top: 150px;
    }

    .news_block {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 600px;
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
        font-weight: 500;
    }
</style>
