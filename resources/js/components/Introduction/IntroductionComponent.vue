<template>
  <div>
    <page-title title="про вступ" uptitle="інформіція"></page-title>
    <header-component></header-component>
    <main-component />
  </div>
</template>

<script>
import HeaderComponent from "./HeaderComponent.vue";
import MainComponent from "./MainComponent.vue";

export default {
  name: "IntroductionComponent",
  components: {
    HeaderComponent,
    MainComponent
  }
};
</script>

<style scoped></style>
