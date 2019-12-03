<template>
  <div class="departments">
    <b-container>
      <b-row>
        <div class="card__block">
          <div class="card__big">
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
          <div class="card__small">
            <div class="card__small__title"></div>
            <div class="card__small__img">
              <img src="/img/departments/skripka.png" alt="skripka" />
            </div>
            <div class="card__small__text"></div>
          </div>
        </div>
      </b-row>
    </b-container>
  </div>
</template>

<script>
export default {};
</script>

<style scope>
.departments {
  margin-top: 50px;
}

.card__block {
  width: 100%;
  justify-content: space-between;
  margin: 0;
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
  width: 35%;
  background: #ff7daa;
}
</style>