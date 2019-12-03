<template>
  <div class="departments">
    <b-container>
      <b-row>
        <div class="card__block">
          <div class="card__big" @click="showModal">
            <div class="card__big__img">
              <img src="/img/departments/piano.png" alt="piano" />
            </div>
            <div class="card__big__body">
              <div class="card__big__title">Викладачі</div>
              <div
                class="card__big__text"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing</div>
            </div>
          </div>
          <div class="card__small" @click="showModal">
            <div class="card__small__title"></div>
            <div class="card__small__img">
              <img src="/img/departments/skripka.png" alt="skripka" />
            </div>
            <div class="card__small__text"></div>
          </div>
        </div>
        <div class="card__block">
          <div class="card__big" @click="showModal">
            <div class="card__big__img">
              <img src="/img/departments/piano.png" alt="piano" />
            </div>
            <div class="card__big__body">
              <div class="card__big__title">Викладачі</div>
              <div
                class="card__big__text"
              >Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing</div>
            </div>
          </div>
          <div class="card__small" @click="showModal">
            <div class="card__small__title"></div>
            <div class="card__small__img">
              <img src="/img/departments/skripka.png" alt="skripka" />
            </div>
            <div class="card__small__text"></div>
          </div>
        </div>
      </b-row>
      <b-row>
        <b-modal ref="my-modal" hide-footer title="Using Component Methods">
          <div class="d-block text-center">
            <h3>Hello From My Modal!</h3>
          </div>
          <b-button class="mt-3" variant="outline-danger" block @click="hideModal">Close Me</b-button>
          <b-button class="mt-2" variant="outline-warning" block @click="toggleModal">Toggle Me</b-button>
        </b-modal>
      </b-row>
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
    },
    toggleModal() {
      // We pass the ID of the button that we want to return focus to
      // when the modal has hidden
      this.$refs["my-modal"].toggle("#toggle-btn");
    }
  }
};
</script>

<style scope>
.departments {
  margin-top: 50px;
}

.card__block {
  margin-top: 35px;
  width: 100%;
  display: flex;
  flex-flow: row wrap;
  justify-content: space-between;
  margin: 0;
}
.card__block:nth-child(2n) {
  margin-top: 35px;
  flex-flow: row-reverse;
}
.card__big {
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  width: 60%;
  background-color: #a32048;
}

.card__big__img {
  padding: 40px;
  width: 30%;
}

.card__big__body {
  padding: 40px;
  width: 70%;
}

.card__small {
  display: flex;
  flex-flow: column;
  align-items: center;
  width: 37%;
  background: #ff7daa;
}
</style>