<template>
  <div class="header">
    <div class="header__inner">
      <img :src="bg" alt="repetition" />
    </div>
    <div class="header_gradient">

    </div>
  </div>
</template>

<script>
export default {
  name: "HeaderComponent",
  props: ['blockOne', 'blockTwo', 'blockThree', 'bg'],
  data() {
    return {
      images: {
        img1: "/img/introduction/contract.png",
        img2: "/img/introduction/file.png",
        img3: "/img/introduction/education.png",
      }
    };
  },
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
  .header__inner img {
    object-fit: cover;
    object-position: -10 -10;
    height: 250px;
  }
  .card__block {
    margin: -40px auto 0 auto;
  }
  .card__img img {
    height: 90px;
  }
  .card__text {
    text-align: center;
    height: 50%;
    width: 100%;
    padding: 20px 25px 10px 25px;
    font-family: "Montserrat Regular", sans-serif;
    font-size: 18px;
  }
}
</style>
