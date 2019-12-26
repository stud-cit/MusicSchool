<template>
  <div>
    <page-title title="про вступ" uptitle="інформація" :description="description"></page-title>
    <header-component :bg="intro.bg" :blockOne="intro.block1" :blockTwo="intro.block2" :blockThree="intro.block3"></header-component>
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
        document: {},
        description: ''
      }
    },
    components: {
      HeaderComponent,
      MainComponent
    },
    created() {
      this.getIntro();
      this.getDocuments();
      this.getInfoPage();
    },
    methods: {
      getIntro() {
        axios.get('/api/intro')
          .then((response) => {
            this.intro = response.data;
          })
      },
      getInfoPage() {
        axios.get('/api/page-info/introduction')
          .then((response) => {
            this.description = response.data.text;
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
