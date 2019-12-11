<template>
  <div class="btn_align">
    <b-col cols="12">
      <b-button squared variant="outline-dark">{{btn}}</b-button>
      <div class="just__text">Більше яскравих моментів</div>
    </b-col>
  </div>
</template>

<script>
export default {
  name: "BtnDownloadComponent",
  data() {
    return {
      btn: "завантажити"
    };
  }
};
</script>

<style scoped>
.btn_align {
  text-align: center;
  margin: 50px auto 25px auto;
}

.btn-outline-dark {
  color: #af0126;
  border: 3px solid #af0126;
  width: 255px;
  height: 65px;
  font-size: 22px;
  text-transform: uppercase;
}

.btn-outline-dark:hover {
  color: white;
  background-color: black;
  border-color: black;
}

.just__text {
  color: #af0126;
  margin: 25px 0 10px 0;
}
</style>