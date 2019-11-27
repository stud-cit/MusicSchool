<template>
    <div id="home">
        <FirstMainBlock/>
        <NewsMainBlock/>
        <VideoMainBlock/>
        <MapComponent/>
    </div>

</template>



<script>
    import FirstMainBlock from './FirstMainBlock.vue'
    import NewsMainBlock from './NewsMainBlock.vue'
    import VideoMainBlock from './VideoMainBlock.vue'
    import MapComponent from '../Other/MapComponent.vue'
    

    export default {
        name: 'home',
        components: {
            FirstMainBlock,
            NewsMainBlock,
            VideoMainBlock,
            MapComponent
          
        },
        data() {
            return {}
        }
    }

</script>

<style>

    #app {
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        line-height: 30px;
    }
    #text-style {
        color: #ffffff;
    }

    #block_space_1 {
        margin-bottom: 100px;
    }

    #block_space_2 {
        margin-bottom: 200px;
    }

</style>
