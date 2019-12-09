<template>
  <div>
    <page-title title="про вступ" uptitle="інформація"></page-title>
    <header-component></header-component>
    <main-component :intro="intro" />
  </div>
</template>

<script>
  import HeaderComponent from "./HeaderComponent.vue";
  import MainComponent from "./MainComponent.vue";
  export default {
    name: "IntroductionComponent",
    data() {
      return {
        intro: []
      }
    },
    components: {
      HeaderComponent,
      MainComponent
    },
    created() {
      this.getIntro();
    },
    methods: {
      getIntro() {
        axios.get('/api/intro')
                .then((response) => {
                  this.intro = response.data;
                })
      },
    }
  };
</script>

<style scoped></style>
