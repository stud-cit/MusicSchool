<template>
  <div>
    <page-title :title="page.title" :uptitle="page.uptitle" :description="page.description"></page-title>
    <MainComponent :description="page.description" />
  </div>
</template>

<script>
import MainComponent from "./MainComponent";
import getData from '../mixins/getData';

export default {
  name: "DepartmentsComponent",
  mixins: [getData],
  data() {
    return {}
  },
  components: {
    MainComponent
  },
  created() {
    this.getInfoPage('departments');
    document.title = "Відділи";
  }
};
</script>

<style scoped>
</style>
