<template>
  <div>
    <b-container>
      <div class="article__block">
        <b-row>
          <b-col xl="4" lg="4" md="12" sm="12" cols="12">
            <div class="article">
              <div class="article__title">
                <div class="article__title__small">ми чекаємо на</div>
                <div class="article__title__big">вас!</div>
              </div>
              <div class="article__body">
                {{ info }}
              </div>
            </div>
          </b-col>
          <b-col xl="8" lg="8" md="12" sm="12" cols="12" class="article__img">
            <div class="article__img">
              <img :src="photo" />
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
  props: ['info', 'photo']
};
</script>

<style scoped>
.article__block {
  padding: 60px 0 100px 0;
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
  margin-bottom: 40px;
  text-align: justify;
}

.article__img img {
  width: 100%;
  height: auto;
}

@media screen and (max-width: 475px) {
  .article__block {
    padding-top: 50px;
  }
}
</style>