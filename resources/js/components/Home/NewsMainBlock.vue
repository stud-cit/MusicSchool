<template>
    <div>
        <div id="block_space_2">

            <div class="add_block"></div>

            <b-container>
                <b-row>
                    <b-col cols="4" fluid>
                        <div>
                            <p class="text_style_big"><small>Актуальні</small><br>новини</p>
                        </div>
                    </b-col>
                </b-row>

                <b-row class="news_block">
                    <b-col xl="8" lg="7" md="12" sm ="12" order-lg="2" class="figure">
                        <img v-if="$props.news.images.length" :src="$props.news.images[0].file" alt="">
                        <img v-else src="/img/empty.png" alt="">
                    </b-col>
                    <b-col xl="4" lg="5" md="12" sm ="12" order-lg="1" class="news_block_all">
                        <div class="news_block_inf"  id = "text-style">
                            <div>
                                <i class="text_style_mid">{{ $props.news.title }}</i>
                            </div>
                            <div>
                                <p class="text_common">{{ $props.news.text.substring(0,200) }}</p>
                            </div>
                            <div>
                                <router-link class="news-router" :to="{ name: 'news-item', params: {id: $props.news.id}}">
                                    <ButtonInformation/>
                                </router-link>
                            </div>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
        </div>
    </div>
</template>

<script>
import ButtonInformation from "./ButtonInformation.vue";

export default {
  name: "NewsMainBlock",
  props: ['news'],
  components: {
    ButtonInformation
  },
  data() {
    return {
      btn: "Новость"
    };
  }
};
</script>

<style scoped>

    .figure {
        width: 100%;
    }

    .figure img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .add_block {
        background-image: url("/img/bl1.png");
        background-size: cover;
        width: 50%;
        min-height: 500px;
        position: absolute;
        margin-top: 150px;
    }

    .news_block{
        margin-top: 20px;
    }

    .news_block_inf {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 95%;
        margin: 30px 5px 5px 5px;
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
    @media (max-width: 1200px) {
        .add_block {
            height: 80%;
            min-height: 650px;
        }
    }
    @media (max-width: 995px) {
        .figure {
            height: 500px;
        }

        .add_block {
            width: 100%;
            height: 150%;
            height: 800px;
            margin-top: 300px;
        }

    }

    @media (max-width: 768px){
        .add_block {
            height: 800px;
            margin-top: 300px;
        }
    }
    @media (max-width: 650px) {
        .figure {
            height: 300px;
        }

        .add_block {
            height: 500px;
            margin-top: 300px;
        }
        #block_space_2 {
            margin-bottom: 100px;
        }

    }

    @media (max-width: 425px) {

        .figure {
            height: 300px;
        }

        .text_style_big {
            font-size: 50px;
            line-height: 45px;
        }

        .text_style_big small {
            font-size: 32px;
            margin-left: 4px;
        }

        .text_common{
            font-size: 14px;
        }

    }

    @media (max-width: 350px) {
        .add_block {
            height: 550px;
            margin-top: 300px;
        }
    }

</style>
