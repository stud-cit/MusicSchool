<template>
    <div id="home">
        <FirstMainBlock :info="info.info_school"/>
        <StoryMainBlock :story="story"/>
        <VideoMainBlock :video="info.video"/>
        <MapComponent/>
    </div>

</template>



<script>
    import FirstMainBlock from './FirstMainBlock.vue'
    import StoryMainBlock from './StoryMainBlock.vue'
    import VideoMainBlock from './VideoMainBlock.vue'
    import MapComponent from '../Other/MapComponent.vue'
    
    
    export default {
        name: 'home',
        components: {
            FirstMainBlock,
            StoryMainBlock,
            VideoMainBlock,
            MapComponent
          
        },
        data() {
            return {
                story: {
                    title: '',
                    text: '',
                    images: []
                },
                info: {
                    info_school: '',
                    video: ''
                }
            }
        },
        created() {
            this.getData();
            document.title = "Сумська музична школа №2";
        },
        methods: {
            getData() {
                axios.get('/api/main-info')
                    .then((response) => {
                        this.story = response.data.story;
                        this.info = response.data.info;
                    })
            },
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
        margin-bottom: 100px;
    }

</style>
