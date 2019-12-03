<template>
  <div class="departments">
    <b-container>
      <b-row>
        <div class="card__block">
          <b-col xl="8" lg="8" md="8" sm="12" class="card__big" @click="showModal">
            <div class="card__big__img">
              <img src="/img/departments/piano.png" alt="piano" />
            </div>
            <div class="card__big__body">
              <div class="card__big__title">Викладачі</div>
              <div
                class="card__big__text"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing</div>
            </div>
          </b-col>
          <b-col xl="4" lg="4" md="4" sm="12" class="card__small" @click="showModal">
            <div class="card__small__title">Викладачі</div>
            <div class="card__small__img">
              <img src="/img/departments/skripka.png" alt="skripka" />
            </div>
            <div
              class="card__small__text"
            >Lorem Ipsum is simply dummy text of the printing and typesetting</div>
          </b-col>
        </div>
      </b-row>

      <b-row>
        <div class="card__block">
          <b-col xl="8" lg="8" md="8" sm="12" class="card__big" @click="showModal">
            <div class="card__big__img">
              <img src="/img/departments/piano.png" alt="piano" />
            </div>
            <div class="card__big__body">
              <div class="card__big__title">Викладачі</div>
              <div
                class="card__big__text"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing</div>
            </div>
          </b-col>
          <b-col xl="4" lg="4" md="4" sm="12" class="card__small" @click="showModal">
            <div class="card__small__title">Викладачі</div>
            <div class="card__small__img">
              <img src="/img/departments/skripka.png" alt="skripka" />
            </div>
            <div
              class="card__small__text"
            >Lorem Ipsum is simply dummy text of the printing and typesetting</div>
          </b-col>
        </div>
      </b-row>
      <b-row>
        <div class="card__block">
          <b-col xl="8" lg="8" md="8" sm="12" class="card__big" @click="showModal">
            <div class="card__big__img">
              <img src="/img/departments/piano.png" alt="piano" />
            </div>
            <div class="card__big__body">
              <div class="card__big__title">Викладачі</div>
              <div
                class="card__big__text"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing</div>
            </div>
          </b-col>
          <b-col xl="4" lg="4" md="4" sm="12" class="card__small" @click="showModal">
            <div class="card__small__title">Викладачі</div>
            <div class="card__small__img">
              <img src="/img/departments/skripka.png" alt="skripka" />
            </div>
            <div
              class="card__small__text"
            >Lorem Ipsum is simply dummy text of the printing and typesetting</div>
          </b-col>
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
        <b-container>
          <b-row>
            <div class="modal__item">
              <div class="teachers">
                <div class="teachers__title">Викладачі</div>
                <div class="teachers__img">
                  <img src="/img/departments/professor.png" alt="professor" />
                </div>
                <div class="teachers__text">Lorem Ipsum is simply dummy text of the printing and</div>
              </div>
            </div>
            <div class="modal__item">
              <div class="instruments">
                <div class="instruments__title">Інструменти</div>
                <div class="instruments__img">
                  <img src="/img/departments/Guitar Player.png" alt="guitar_player" />
                </div>
                <div class="instruments__text">typesetting industry Lorem Ipsum is simply dummy text</div>
              </div>
            </div>
          </b-row>
        </b-container>
      </b-modal>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "MainComponent",
  methods: {
    showModal() {
      this.$refs["my-modal"].show();
    },
    hideModal() {
      this.$refs["my-modal"].hide();
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
  flex-flow: row-reverse;
}
.card__big {
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  align-items: center;
  width: 60%;
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
}

.modal__dialog {
  width: 80% !important;
}

.modal__body,
.modal__content {
  padding: 0 !important;
  border: 0 !important;
  display: flex;
  flex-flow: row wrap;
}
.modal__item {
  width: 50%;
}
.teachers {
  color: #2b2b2b;
  padding: 40px;
  background-color: #ffffff;
}

.teachers__title {
  text-transform: uppercase;
  text-align: center;
  font-size: 26px;
  font-family: "Montserrat Bold", serif;
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
  padding: 40px;
  background: linear-gradient(180deg, #e91b47 0%, #6a0017 100%);
}
.instruments__title {
  text-transform: uppercase;
  text-align: center;
  font-size: 26px;
  font-family: "Montserrat Bold", serif;
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
}

@media screen and (max-width: 768px) {
  .modal__body,
  .modal__content {
    flex-flow: column;
  }
  .modal__dialog {
    min-width: 300px !important;
  }
  .modal__item {
    width: 100%;
  }
}

@media screen and (min-width: 992px) {
  .modal__dialog {
    min-width: 700px !important;
  }
}

@media screen and (min-width: 1200px) {
  .modal__dialog {
    min-width: 900px !important;
  }
}
</style>