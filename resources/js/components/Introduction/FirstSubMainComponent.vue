<template>
  <div>
    <b-container>
      <div class="article__block">
        <b-row>
          <div class="article">
            <div class="article__title">
              <div class="article__title__small">Запрошуємо у світ мистецтва!</div>
            </div>
          </div>
        </b-row>
        <b-row>
          <b-col xl="12" lg="12" md="12" sm="12" cols="12" class="article__img">
            <div class="article__img">
              <silentbox-single :src="photo">
                <img :src="photo" class="w-100 item-img"/>
              </silentbox-single>
            </div>
          </b-col>
        </b-row>
        <b-row>
          <b-col xl="12" lg="12" md="12" sm="12" cols="12">
            <div class="article">
              <div class="article__body" id="articleBody">{{ info }}</div>
            </div>
          </b-col>
        </b-row>
      </div>
    </b-container>
  </div>
</template>
<script>
export default {
  name: "FirstSubMainComponent",
  props: ["info", "photo"],
};
</script>

<style >
#silentbox-overlay__embed img, #silentbox-overlay__embed iframe {
  background-color: transparent;
  width: auto;
  height: auto;
}
.article__block {
  padding: 60px 0 0 0;
}
.article__title {
  padding: 0;
  line-height: 80px;
  text-transform: uppercase;
  font-family: "Montserrat Bold", sans-serif;
  margin-bottom: 20px;
  font-size: 80px;
  font-weight: bold;
}
.article__title__small {
  font-size: 32px;
  line-height: 40px;
}
.article__body {
  font-family: "Montserrat Regular", sans-serif;
  font-size: 18px;
  margin: 40px 0;
  text-align: justify;
  white-space: pre-wrap;
  text-indent: 1.2em;
}

.article__img.col-xl-12 {
  padding: 0;
}

.article__img img {
  width: 100%;
  max-height: 500px;
  object-fit: scale-down;
  background-color: #3d3a3a;
}
@media screen and (max-width: 475px) {
  .article__block {
    padding-top: 50px;
  }
}
</style>
