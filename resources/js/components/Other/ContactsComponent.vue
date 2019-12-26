<template>
    <div>
        <page-title title="Контакти" uptitle="доступні" :description="description"></page-title>
        <MapComponent/>
    </div>
</template>

<script>

    import MapComponent from './MapComponent.vue'

    export default {
        data() {
            return {
                description: ''
            };
        },
         components: {
            MapComponent
        },
        created() {
            this.getInfoPage();
        },
        methods: {
            getInfoPage() {
                axios.get('/api/page-info/contacts')
                .then((response) => {
                    this.description = response.data.text;
                })
            },
        }
    }
</script>

<style lang="sass" scoped>

</style>
