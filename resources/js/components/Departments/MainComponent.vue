<template>
  <div class="departments">
    <b-container>
      <b-row>
        <div v-for="(block, index) in department" v-bind:key="index" class="card__block">
          <div v-if="index % 2 == 0" class="card__block">
            <div class="card__big" @click="showModal(block[0].departments_id)">
              <div class="card__big__img">
                <img v-bind:src="block[0].img" alt="piano" />
              </div>
              <div class="card__big__body">
                <div class="card__big__title">{{block[0].name_department}}</div>
                <div class="card__big__title">{{block[0].name_department}}</div>
                <div class="card__big__text">{{block[0].departments_info}}</div>
              </div>
            </div>
            <div v-if="block[1]" class="card__small" @click="showModal(block[1].departments_id)">
              <div class="card__small__title">{{block[1].name_department}}</div>
              <div class="card__small__img">
                <img v-bind:src="block[1].img" alt="skripka" />
              </div>
              <div class="card__small__text">{{block[1].departments_info}}</div>
            </div>
          </div>

          <div v-else class="card__block">
            <div class="card__small" @click="showModal(block[0].departments_id)">
              <div class="card__small__title">{{block[0].name_department}}</div>
              <div class="card__small__img">
                <img v-bind:src="block[0].img" alt="skripka" />
              </div>
              <div class="card__small__text">{{block[0].departments_info}}</div>
            </div>
            <div v-if="block[1]" class="card__big" @click="showModal(block[1].departments_id)">
              <div class="card__big__img">
                <img v-bind:src="block[1].img" alt="piano" />
              </div>
              <div class="card__big__body">
                <div class="card__big__title">{{block[1].name_department}}</div>
                <div class="card__big__text">{{block[1].departments_info}}</div>
              </div>
            </div>
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
            <div class="teachers__title">Колектив</div>
            <div class="teachers__img">
              <router-link :to="{ name: 'teachers', params: {id: this.departmentId} }">
                <img src="/img/departments/professor.png" alt="professor" />
              </router-link>
            </div>
          </div>
        </div>
        <div class="modal__item">
          <div class="instruments">
            <div class="instruments__title">Інформація</div>
            <div class="instruments__img">
              <router-link :to="{ name: 'instruments', params: {id: this.departmentId} }">
                <img src="/img/departments/information.svg" alt="information" />
              </router-link>
            </div>
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
      departmentId: null,

      cardsBlock: {
        imgBig: "/img/test2.jpg",
        imgSmall: "/img/teacher.jpg"
      }
    };
  },

  created() {
    this.getDepartment();
  },
  methods: {
    showModal(id) {
      this.departmentId = id;
      this.$refs["my-modal"].show();
    },
    hideModal() {
      this.departmentId = null;
      this.$refs["my-modal"].hide();
    },
    getDepartment() {
      axios.get("/api/department").then(response => {
        this.department = [].concat.apply(
          [],
          response.data.map(function(elem, i) {
            return i % 2 ? [] : [response.data.slice(i, i + 2)];
          })
        );
      });
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
  margin-bottom: 25px;
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
  /* width: 50%; */
  text-align: right;
}

.card__big__img img {
  /* width: 60%; */
  max-width: 150px;
  max-height: 150px;
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
  font-size: 24px;
  font-family: "Montserrat Bold";
}

.card__small {
  display: flex;
  flex-flow: column;
  align-items: center;
  justify-content: center;
  margin: 0;
  width: 37%;
  background: #ff7daa;
}

.card__small__title {
  text-transform: uppercase;
  text-align: center;
  color: #ffffff;
  margin-top: 35px;
  font-size: 24px;
  font-family: "Montserrat Bold";
}
.card__small__img {
  margin: 10px 0 10px 0;
  width: 100%;
  text-align: center;
}

.card__small__img img {
  max-width: 150px;
  max-height: 150px;
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
  text-align: center;
}

.teachers__img {
  margin: 40px 0;
  text-align: center;
}
.teachers__img img {
  width: 60%;
}
.teachers__text {
  text-align: center;
  font-family: "Montserrat Regular", serif;
}

.instruments {
  text-align: center;
  color: #ffffff;
  height: 100%;
  background: linear-gradient(180deg, #e91b47 0%, #6a0017 100%);
}
.instruments__img {
  margin: 40px 0;
  text-align: center;
}
.instruments__img img {
  width: 60%;
}
.instruments__text {
  text-align: center;
  font-family: "Montserrat Regular", serif;
}
.modal__body {
  border: 0 !important;
  padding: 0 !important;
}

@media screen and (max-width: 768px) {
  .card__block {
    flex-flow: column;
    align-items: center;
  }
  .card__big,
  .card__small {
    width: 80%;
    text-align: center;
  }

  .card__block .card__big {
    margin-bottom: 35px;
  }

  .card__block:nth-child(2n) .card__small {
    margin-bottom: 35px;
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
    margin: 0 auto 20px auto;
    font-size: 20px;
    width: 80%;
  }
  .card__small {
    justify-content: center;
  }

  .card__small__title {
    width: 80%;
    font-size: 20px;
    margin-top: 40px;
  }
  .teachers__img img,
  .instruments__img img {
    height: 50%;
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

@media screen and (min-width: 769px) {
  .modal__body,
  .modal__content {
    display: flex;
    flex-flow: row wrap;
  }
  .modal__item {
    width: 50%;
  }
  .modal__dialog {
    max-width: 60% !important;
  }
  .card__small__title {
    width: 80%;
  }

  .teachers__title,
  .instruments__title {
    text-transform: uppercase;
    text-align: center;
    font-size: 20px;
    font-family: "Montserrat Bold", serif;
  }
}

@media screen and (min-width: 1024px) {
  .teachers__title,
  .instruments__title {
    font-size: 26px;
  }
}
</style>