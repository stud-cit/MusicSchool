<template>
  <div>
    <page-title title="про вступ" uptitle="інформіція"></page-title>
    <HeaderComponent></HeaderComponent>
    <MainComponent />
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
