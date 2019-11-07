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
                    <div class="btn">

                    </div>
                </b-col>
            </b-row>
        </b-container>

    </div>
</template>

<script>
    export default {
        name: "VideoMainBlock"
    }
</script>

<style scoped>
    .btn{
        background-image: url("../img/image8.png");
        width: 540px;
        height: 210px;
    }
</style>