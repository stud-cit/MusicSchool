<template>
  <div>
    <first-sub-main-component></first-sub-main-component>
    <last-sub-main-component></last-sub-main-component>
  </div>
</template>

<script>
import FirstSubMainComponent from "./FirstSubMainComponent.vue";
import LastSubMainComponent from "./LastSubMainComponent.vue";

export default {
  name: "MainComponent",
  components: {
    FirstSubMainComponent,
    LastSubMainComponent
  }
};
</script>

<style scoped></style>
