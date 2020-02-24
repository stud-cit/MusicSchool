<template>
    <div>
        <page-title :title="page.title" :uptitle="page.uptitle" :shirt_text="page.shirt_text" :description="page.description"></page-title>
        <MapComponent/>
    </div>
</template>

<script>

    import MapComponent from './MapComponent.vue';
    import getData from '../mixins/getData';

    export default {
        mixins: [getData],
        data() {
            return {};
        },
         components: {
            MapComponent
        },
        created() {
            this.getInfoPage('contacts');
            document.title = "Контакти";
        }
    }
</script>

<style lang="sass" scoped>

</style>
