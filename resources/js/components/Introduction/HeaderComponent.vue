<template>
  <div class="header">
    <div class="header__inner">
      <img src="/img/introduction/intro-header.png" alt="repetition" />
    </div>
    <div class="header_gradient">
      <b-container>
        <b-row class="card__block">
          <b-col xl="4" lg="4" md="6" sm="10" cols="10">
            <div class="card">
              <div class="card__img">
                <img src="/img/introduction/contract.png" alt="contract" />
              </div>
              <div
                class="card__text"
              >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas optio atque deserunt, provident expedita quam.</div>
            </div>
          </b-col>
          <b-col xl="4" lg="4" md="6" sm="10" cols="10">
            <div class="card">
              <div class="card__img">
                <img src="/img/introduction/file.png" alt="file" />
              </div>
              <div
                class="card__text"
              >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas optio atque deserunt, provident expedita quam.</div>
            </div>
          </b-col>
          <b-col xl="4" lg="4" md="6" sm="10" cols="10">
            <div class="card">
              <div class="card__img">
                <img src="/img/introduction/education.png" alt="education" />
              </div>
              <div
                class="card__text"
              >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas optio atque deserunt, provident expedita quam.</div>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </div>
  </div>
</template>

<script>
export default {
  name: "HeaderComponent"
};
</script>

<style scoped>
.header__inner {
  width: 100%;
  margin: 0;
  padding: 0;
}

.header__inner img {
  width: 100%;
  height: auto;
}

.header_gradient {
  width: 100%;
  background: linear-gradient(180deg, #e91b47 0%, #6a0017 100%);
  background-size: cover;
}

.card__block {
  padding-bottom: 50px;
  margin-top: -100px;
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
}

.card {
  top: 0;
  text-align: center;
  margin-bottom: 20px;
}

.card__img {
  height: 50%;
  width: 100%;
  padding-top: 30px;
}

.card__img img {
  height: 100px;
}

.card__text {
  height: 50%;
  width: 100%;
  padding: 25px 30px 30px 15px;
  font-family: "Montserrat Regular", sans-serif;
  font-size: 18px;
}

@media screen and (max-width: 800px) {
  .card__img img {
    height: 150px;
  }
}
@media screen and (max-width: 475px) {
  .card__block {
    margin-top: -40px;
  }
  .card__img img {
    height: 90px;
  }
  .card__text {
    height: 50%;
    width: 100%;
    padding: 20px 25px 25px 10px;
    font-family: "Montserrat Regular", sans-serif;
    font-size: 18px;
  }
}
</style>
