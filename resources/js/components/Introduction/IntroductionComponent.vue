<template>
  <div>
    <page-title :title="page.title" :uptitle="page.uptitle" :description="page.description"></page-title>
    <header-component :bg="intro.bg" :blockOne="intro.block1" :blockTwo="intro.block2" :blockThree="intro.block3"></header-component>
    <main-component :intro="intro" :document="document" />
  </div>
</template>

<script>
  import HeaderComponent from "./HeaderComponent.vue";
  import MainComponent from "./MainComponent.vue";
  import getData from '../mixins/getData';
  export default {
    name: "IntroductionComponent",
    mixins: [getData],
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
      this.getInfoPage('introduction');
      document.title = "Вступ";
    },
    methods: {
      getIntro() {
        axios.get('/api/intro')
          .then((response) => {
            this.intro = response.data;
          })
      },
      getDocuments() {
        axios.get('/api/document')
          .then((response) => {
            this.document = response.data;
          })
      }
    }
  };
</script>

<style scoped></style>
