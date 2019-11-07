<template>
    <div id="app">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200i,300,400,600,600i,800,800i,900&display=swap" rel="stylesheet">
        <!--    <div id="nav">-->
        <!--      <router-link to="/">Home</router-link> |-->
        <!--      <router-link to="/about">About</router-link>-->
        <!--    </div>-->
        <!--    <router-view/>-->
        <Header/>
        <FirstMainBlock/>
        <NewsMainBlock/>
        <VideoMainBlock/>
        <NewsMainSlider/>
    </div>

</template>

<script>

    import Header from './components/Header.vue'
    import FirstMainBlock from './components/FirstMainBlock.vue'
    import NewsMainBlock from './components/NewsMainBlock.vue'
    import VideoMainBlock from './components/VideoMainBlock.vue'

    export default {
        name: 'app',
        components: {
            Header,
            FirstMainBlock,
            NewsMainBlock,
            VideoMainBlock

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
</style>
