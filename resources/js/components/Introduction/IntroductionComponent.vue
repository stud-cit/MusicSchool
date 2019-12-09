<template>
  <div>
    <page-title title="про вступ" uptitle="інформація"></page-title>
    <header-component :block1="$props.intro.block1" :block2="$props.intro.block2" :block3="$props.intro.block3"></header-component>
    <main-component :intro="intro" />
  </div>
</template>

<script>
  import HeaderComponent from "./HeaderComponent.vue";
  import MainComponent from "./MainComponent.vue";
  export default {
    props: ['intro'],
    name: "IntroductionComponent",
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
