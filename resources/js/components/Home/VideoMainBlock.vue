<template>
    <div>
        <b-embed
                type="iframe"
                aspect="21by9"
                src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"
                allowfullscreen
        ></b-embed>
        <b-container>
            <b-row align-h="center">
                <b-col cols="5">
                    <div class="btn_space">
                        <div class="btn">
                            <ButtonInformation/>
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
        background-image: url("/img/image8.png");
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
