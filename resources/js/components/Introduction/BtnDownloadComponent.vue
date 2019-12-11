<template>
  <div class="btn_align">
    <b-col cols="12">
      <b-button squared variant="outline-dark" @click="downloadDoc">{{btn}}</b-button>
      <div class="just__text">Більше яскравих моментів</div>
    </b-col>
  </div>
</template>

<script>
export default {
  props: ['file'],
  name: "BtnDownloadComponent",
  data() {
    return {
      btn: "завантажити"
    };
  },
  methods: {
    forceFileDownload(response) {
      const url = window.URL.createObjectURL(new Blob([response.data]))
      const link = document.createElement('a')
      link.href = url
      link.setAttribute('download', this.file)
      document.body.appendChild(link)
      link.click()
    },
    downloadDoc() {
      console.log(this.file)
      axios({
        method: 'get',
        url: '/documents/'+this.file,
        responseType: 'arraybuffer'
      })
              .then(response => {
                this.forceFileDownload(response)
              })
              .catch((error) => {
                swal({
                  icon: "error",
                  title: 'Помилка',
                  text: 'Не вдалося завантажити документ'
                });
              });
    },
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