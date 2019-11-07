<template>
    <div>
        <div id="text-style">
            <div class="inf-foto"></div>

            <div class="inf"></div>

            <b-container>
                <b-row>
                    <b-col cols="6">
                        <div class="main_text">
                            <p class="text_style_mid">Вас запрошує до себе</p>
                            <p class="text_style_big"><small>Сумська</small><br> музича <br> школа №2</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer.</p>
                        </div>
                    </b-col>
                </b-row>
            </b-container>

        </div>


    </div>

</template>

<script>
    export default {
        name: "FirstMainBlock"
    }
</script>

<style scoped>
    .inf-foto {
        background-image: url("../img/foto_school.png");
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 800px;
        position: absolute;
        right: 0;
    }

    .inf {
        background-image: url("../img/part.png");
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
        margin-bottom: 50px;
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


</style>
