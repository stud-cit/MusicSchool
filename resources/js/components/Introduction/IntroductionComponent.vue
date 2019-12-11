<template>
  <div>
    <page-title title="про вступ" uptitle="інформація"></page-title>
    <header-component :blockOne="intro.block1" :blockTwo="intro.block2" :blockThree="intro.block3"></header-component>
    <main-component :intro="intro" :document="document" />
  </div>
</template>

<script>
  import HeaderComponent from "./HeaderComponent.vue";
  import MainComponent from "./MainComponent.vue";
  export default {
    name: "IntroductionComponent",
    data() {
      return {
        intro: {},
        document: {}
      }
    },
    components: {
      HeaderComponent,
      MainComponent
    },
    created() {
      this.getIntro();
      this.getDocuments();
    },
    methods: {
      getIntro() {
        axios.get('/api/intro')
          .then((response) => {
            this.intro = response.data;
          })
      },
      getDocuments() {
        axios.get('/api/get-document')
          .then((response) => {
            this.document = response.data;
          })
      }
    }
  };
</script>

<style scoped></style>
