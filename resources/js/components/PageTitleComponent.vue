<template>
    <div class="title-block">
        <div class="notes">
            <b-container>
                <b-row>
                    <b-col cols="12" xl="8" >
                        <h1 class="title">
                            <span class="uptitle">{{uptitle}}</span><br>
                            {{title}}
                        </h1>
                    </b-col>
                    <b-col class="d-none d-xl-block" xl="4">
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text simply dummy text dum</div>
                    </b-col>
                </b-row>


            </b-container>
        </div>
    </div>
</template>
<script>
    export default {
        props:{
          uptitle: String,
          title: String
        },
        data() {
            return {

            }
        },
        computed: {


        },

    }
</script>
<style lang="sass" scoped>
    .title-block
        background: linear-gradient(180deg, #e91b47 0%, #6a0017 100%)
        .notes
            background: url("/img/title-bg-notes.png") no-repeat left 68%
            padding: 36px 0 32px 0
        .container
            .row
                display: flex
                align-items: flex-end
                justify-content: space-between
        .title
            color: #ffffff
            font-family: Montserrat
            font-size: 70px
            font-weight: 700
            line-height: 1.2
            text-transform: uppercase
            margin-bottom: 0
            .uptitle
                font-size: 54px
                font-weight: 600
        .text
            color: #ffffff
            font-family: Montserrat
            font-size: 16px
            font-weight: 400
    @media (max-width: 1199px)
        .title-block
            .title
                font-size: 62px
                .uptitle
                    font-size: 46px
    @media (max-width: 575px)
        .title-block
            .title
                font-size: 34px
                .uptitle
                    font-size: 26px

</style>