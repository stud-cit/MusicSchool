<template>
  <div class="departments">
    <b-container>
      <b-row>
        <div v-for="(block,index) in department" v-bind:key="index" class="card__block">
          <div class="card__big" @click="showModal">
            <div class="card__big__img">
              <img v-bind:src="cardsBlock.imgBig" alt="piano" />
            </div>
            <div class="card__big__body">
              <div class="card__big__title">{{block.name_department}}</div>
              <div class="card__big__text">{{block.departments_info}}</div>
            </div>
          </div>
          <div class="card__small" @click="showModal">
            <div class="card__small__title">{{block.name_department}}</div>
            <div class="card__small__img">
              <img v-bind:src="cardsBlock.imgSmall" alt="skripka" />
            </div>
            <div class="card__small__text">{{block.departments_info}}</div>
          </div>
        </div>
      </b-row>
      <b-modal
        class="modal"
        modal-class="modal__box"
        dialog-class="modal__dialog"
        content-class="modal__content"
        body-class="modal__body"
        ref="my-modal"
        hide-footer
        hide-header
        centered
      >
        <div class="modal__item">
          <div class="teachers">
            <div class="teachers__title">Викладачі</div>
            <div class="teachers__img">
              <router-link :to="{ name: 'teachers', params: {id: 3} }">
                <img src="/img/departments/professor.png" alt="professor" />
              </router-link>
            </div>
            <div class="teachers__text">typesetting industry Lorem Ipsum is simply dummy text</div>
          </div>
        </div>
        <div class="modal__item">
          <div class="instruments">
            <div class="instruments__title">Інструменти</div>
            <div class="instruments__img">
              <router-link :to="{ name: 'instruments', params: {id: 3} }">
                <img src="/img/departments/Guitar Player.png" alt="guitar_player" />
              </router-link>
            </div>
            <div class="instruments__text">typesetting industry Lorem Ipsum is simply dummy text</div>
          </div>
        </div>
      </b-modal>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "MainComponent",
  data() {
    return {
      department: [],
      instruments: [],
      teachers: [],

      cardsBlock: {
        imgBig: "/img/departments/piano.png",
        imgSmall: "/img/departments/skripka.png",
      },
    };
  },
  created() {
    this.getDepartment();
    this.getInstrumentId();
    this.getTeachersId();
  },
  methods: {
    showModal() {
      this.$refs["my-modal"].show();
    },
    hideModal() {
      this.$refs["my-modal"].hide();
    },
    getDepartment() {
      axios.get('/api/department')
              .then((response) => {
                console.log(response.data)
                this.department = response.data
              })
    },
    getInstrumentId() {
      axios.get('/api/instruments')
              .then((response) => {
                this.instruments = response.data
              })
    },
    getTeachersId() {
      axios.get('/api/get-teacher')
              .then((response) => {
                this.teachers = response.data
              })
    }
  }
};
</script>

<style scope>
.departments {
  margin-top: 50px;
}
.card__block {
  width: 100%;
  display: flex;
  flex-flow: row wrap;
  justify-content: space-between;
  margin-bottom: 35px;
}
.card__block:nth-child(2n) {
  display: flex;
  flex-flow: row-reverse wrap;
}
.card__big {
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  align-items: center;
  width: 60%;
  height: 100%;
  background-color: #a32048;
}

.card__big__img {
  padding: 40px 0 40px 0;
  width: 50%;
  text-align: right;
}

.card__big__img img {
  width: 80%;
}

.card__big__body {
  padding: 40px 95px 40px 40px;
  width: 50%;
}

.card__big__text {
  color: #ffffff;
  line-height: 27px;
  font-family: "Montserrat Regular";
}

.card__big__title {
  text-transform: uppercase;
  color: #ffffff;
  margin-bottom: 40px;
  font-size: 26px;
  font-family: "Montserrat Bold";
}

.card__small {
  display: flex;
  flex-flow: column;
  align-items: center;
  margin: 0;
  width: 37%;
  background: #ff7daa;
}

.card__small__title {
  text-transform: uppercase;
  color: #ffffff;
  margin: 20px 0 20px 0;
  line-height: 80px;
  font-size: 26px;
  font-family: "Montserrat Bold";
}
.card__small__img {
  width: 100%;
  text-align: center;
}

.card__small__text {
  margin: 25px 0 40px 0;
  color: #ffffff;
  line-height: 27px;
  font-family: "Montserrat Regular";
  width: 70%;
  text-align: center;
}
.teachers {
  color: #2b2b2b;
  height: 100%;
  background-color: #ffffff;
}

.teachers__img {
  margin: 40px 0;
  text-align: center;
}
.teachers__img img {
  width: 80%;
}
.teachers__text {
  text-align: center;
  font-family: "Montserrat Regular", serif;
}

.instruments {
  color: #ffffff;
  height: 100%;
  background: linear-gradient(180deg, #e91b47 0%, #6a0017 100%);
}
.instruments__img {
  margin: 40px 0;
  text-align: center;
}
.instruments__img img {
  width: 80%;
}
.instruments__text {
  text-align: center;
  font-family: "Montserrat Regular", serif;
}

@media screen and (min-width: 320px) {
  .card__block,
  .card__block:nth-child(2n) {
    display: flex;
    flex-flow: column;
    align-items: center;
  }
  .card__big,
  .card__small {
    width: 80%;
    text-align: center;
  }
  .card__big__body {
    width: 90%;
    margin: 0 auto;
    padding: 0 0 15px 0;
  }
  .card__big__img {
    text-align: center;
  }

  .card__big__title {
    font-size: 30px;
    margin-bottom: 20px;
  }
  .card__small {
    margin-top: 35px;
    justify-content: center;
  }
  .modal__body,
  .modal__content {
    flex-flow: column;
  }
  .modal__body {
    border: 0 !important;
    padding: 0 !important;
  }
  .modal__dialog {
    margin: 0 auto !important;
    max-width: 80% !important;
  }
  .modal__item {
    width: 100%;
  }
  .teachers__img img,
  .instruments__img img {
    height: 80%;
  }
  .teachers__title,
  .instruments__title {
    text-transform: uppercase;
    text-align: center;
    font-size: 20px;
    font-family: "Montserrat Bold", serif;
  }
  .teachers,
  .instruments {
    padding: 20px;
  }
}

@media screen and (min-width: 768px) {
  .modal__body,
  .modal__content {
    display: flex;
    flex-flow: row wrap;
  }
  .modal__item {
    width: 50%;
  }
  .teachers,
  .instruments {
    padding: 40px;
  }
  .teachers__title,
  .instruments__title {
    text-transform: uppercase;
    text-align: center;
    font-size: 26px;
    font-family: "Montserrat Bold", serif;
  }
}

@media screen and (min-width: 992px) {
  .card__block {
    width: 100%;
    flex-flow: row wrap;
    justify-content: space-between;
    margin-bottom: 35px;
  }
  .card__block:nth-child(2n) {
    display: flex;
    flex-flow: row-reverse wrap;
  }
  .card__big {
    flex-flow: row wrap;
    justify-content: center;
    align-items: center;
    width: 60%;
    height: 100%;
  }

  .card__big__img {
    text-align: right;
  }

  .card__big__body {
    padding: 40px 95px 40px 40px;
    width: 50%;
  }

  .card__big__title {
    text-transform: uppercase;
    margin-bottom: 40px;
    font-size: 26px;
  }

  .card__big__text {
    text-align: left;
  }

  .card__small {
    flex-flow: column;
    align-items: center;
    margin: 0;
    width: 37%;
  }

  .card__small__title {
    margin: 20px 0 20px 0;
  }
  .card__small__img {
    width: 100%;
  }

  .card__small__text {
    margin: 25px 0 40px 0;
    width: 70%;
  }
}
</style>