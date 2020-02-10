<template>
    <div>
        <b-embed
                type="iframe"
                aspect="21by9"
                :src="'https://www.youtube.com/embed/'+$props.video.slice($props.video.length - 11, $props.video.length)"
                allowfullscreen
        ></b-embed>
        <b-container>
            <b-row align-h="center">
                <b-col cols="12" sm="8" md="8" lg="6" xl="6">
                    <div class="btn_space">
                        <div class="btn">
                            <router-link class="news-router" :to="{ name: 'gallery'}">
                                <ButtonInformation/>
                            </router-link>
                            <p id="text-style">Більше яскравих моментів</p>
                        </div>
                    </div>
                </b-col>
            </b-row>
        </b-container>

    </div>
</template>

<script>
    import ButtonInformation from './ButtonInformation.vue'

    export default {
        name: "VideoMainBlock",
        props: ['video'],
        components: {
            ButtonInformation
        },
        data() {
            return {}
        }
    }
</script>

<style scoped>
    .btn_space {
        background: transparent linear-gradient(180deg, #E91B47 0%, #6A0017 100%) 0% 0% no-repeat padding-box;
        width: 100%;
        height: 100%;
        text-align: center;
    }

    .btn {
        margin-top: 50px;
    }

    .btn p{
        margin-top: 20px;
    }

</style>
