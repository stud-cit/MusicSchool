<template>
  <div>
    <first-sub-main-component @CustomEventInputChanged="getIntro"></first-sub-main-component>
    <last-sub-main-component @CustomEventInputChanged="getIntro"></last-sub-main-component>
  </div>
</template>

<script>
import FirstSubMainComponent from "./FirstSubMainComponent.vue";
import LastSubMainComponent from "./LastSubMainComponent.vue";

export default {
  name: "MainComponent",
  data() {
    return {
      intro: {
        block1: '',
        block2: '',
        block3: '',
        info: '',
        bg: '',
        photo: ''
      },
    };
  },
  created () {
    this.getIntro();
  },
  methods: {
    getIntro(){
      axios.get('/get-intro')
              .then((response) => {
                response.data.intro.map(item => {
                  Object.assign(this.intro, item);
                });
              })
    }
  },
  components: {
    FirstSubMainComponent,
    LastSubMainComponent
  }
};
</script>


<style scoped></style>
