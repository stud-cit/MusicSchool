<template>
  <div>
    <first-sub-main-component :info="$props.intro.info" :photo="$props.intro.photo"></first-sub-main-component>
    <last-sub-main-component ></last-sub-main-component>
  </div>
</template>

<script>
import FirstSubMainComponent from "./FirstSubMainComponent.vue";
import LastSubMainComponent from "./LastSubMainComponent.vue";

export default {
  props: ['intro'],
  name: "MainComponent",
  components: {
    FirstSubMainComponent,
    LastSubMainComponent
  }
};
</script>

<style scoped></style>
