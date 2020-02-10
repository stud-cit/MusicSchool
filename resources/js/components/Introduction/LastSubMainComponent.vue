<template>
  <div class="card__block">
    <b-container>
      <b-row>
        <b-col cols="12">
          <div class="card__block__title">ознайомлення з документами</div>
        </b-col>
      </b-row>
      <b-row>
        <div class="card__block__inner">
          <b-col class="cards" xl="2"
            lg="3"
            md="4"
            sm="6"
            cols="8"
            v-for="(doc, index) in document"
            v-bind:key="index"
          >
            <div class="card">
              <div class="card__img">
                <a :href="doc.file" :download="doc.text"><img v-bind:src="images.img" /></a>
              </div>
              <div class="card__body">{{ doc.text }}</div>
            </div>
          </b-col>
        </div>
      </b-row>
      <b-row>
        <btn-download-component :file="document"/>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import BtnDownloadComponent from "./BtnDownloadComponent.vue";

export default {
  name: "LastSubMainComponent",
  props: ['document'],
  data() {
    return {
      images:
        {
          img: "/img/introduction/file_for_cart.png",
        }
    };
  },
  components: {
    BtnDownloadComponent
  }
};
</script>

<style scoped>
.card__block__inner {
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
}

.card__block__title {
  text-transform: uppercase;
  font-size: 32px;
  line-height: 40px;
  font-weight: bold;
  text-align: center;
  margin-bottom: 40px;
}

.cards {
  margin-bottom: 30px;
}

.card {
  display: flex;
  flex-flow: column;
  align-items: center;
  height: 100%;
  background: linear-gradient(180deg, #e91b47 0%, #6a0017 100%);
  border-radius: 50% 50% 0 0;
  border: 0;
}

.card__img {
  box-shadow: 0px 0px 12px -5px rgba(0, 0, 0, 0.75);
  background-color: #fff;
  width: 100%;
  height: auto;
  text-align: center;
  border: 0;
  border-radius: 50%;
}

.card__img img {
  width: 35%;
  margin: 45px 0;
}

.card__body {
  width: 100%;
  text-align: center;
  color: #fff;
  font-size: 12px;
  padding: 5px 20px 20px 20px;
  font-family: "Montserrat Light", sans-serif;
}

@media screen and (max-width: 415px) {
  .card__block__title {
    font-size: 24px;
  }
}
</style>