<template>
  <div>
    <page-title title="відділів" uptitle="різноманітність" :description="description"></page-title>
    <MainComponent />
  </div>
</template>

<script>
import MainComponent from "./MainComponent";

export default {
  name: "DepartmentsComponent",
  data() {
    return {
      description: ''
    }
  },
  components: {
    MainComponent
  },
  created() {
    this.getInfoPage();
  },
  methods: {
    getInfoPage() {
      axios.get('/api/page-info/departments')
        .then((response) => {
          this.description = response.data.text;
        })
    },
  }
};
</script>

<style scoped>
</style>
