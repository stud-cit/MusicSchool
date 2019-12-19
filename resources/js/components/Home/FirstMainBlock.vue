<template>
    <div id="block_space_1">
        <div id="text-style">
            <div class="inf-photo"></div>
            <div class="inf"></div>

            <b-container>
                <b-row>
                    <b-col lg="6" md="6" sm ="6" cols="12">
                        <div class="main_text">
                            <p class="text_style_mid">Вас запрошує до себе</p>
                            <p class="text_style_big"><small>Сумська</small><br> музича <br> школа №2</p>
                            <p>{{ $props.info }}</p>
                        </div>
                    </b-col>
                    <b-col lg="6" md="auto" sm ="12">

                    </b-col>
                </b-row>
            </b-container>

        </div>


    </div>

</template>

<script>
    export default {
        name: "FirstMainBlock",
        props: ['info']
    }
</script>

<style scoped>
    .inf-photo {
        background-image: url("/img/photo_school.png");
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 800px;
        position: absolute;
        right: 0;
    }

    .inf {
        background-image: url("/img/part.png");
        background-size: cover;
        background-position: center;
        width: 60%;
        height: 800px;
        position: absolute;
    }

    .main_text {
        display: flex;
        flex-direction: column;
        height: 800px;
        justify-content: center;

    }


    .text_style_mid {
        font-size: 25px;
    }

    .text_style_big {
        font-size: 60px;
        font-weight: 800;
        text-transform: uppercase;
        line-height: 60px;
        margin-bottom: 35px;
    }

    .text_style_big small {
        font-size: 35px;
        font-weight: 800;
        line-height: 20px;
    }

    @media (max-width: 1440px) {
        .inf {
            width: 75%;
            height: 800px;
        }
    }

    @media (max-width: 1024px) {
        .inf {
            width: 60%;
        }
    }

    @media (max-width: 575px) {
        .inf-photo {
            background-image: url("/img/photo_school_1.png");
            width: 100%;
            height: 800px;
        }

        .inf {
            background-image: url("/img/part_1.png");
            background-position: bottom;
            width: 100%;
            height: 700px;
            margin-top: 300px;
        }

        .main_text{
            margin-top: 300px;
        }
    }


</style>
