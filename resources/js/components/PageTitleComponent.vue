<template>
<div>
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
                        <div class="text">{{shirt_text.substring(0,120)}}</div>
                    </b-col>
                </b-row>


            </b-container>
        </div>
    </div>

    <b-container>
      <b-row v-if="description">
        <div class="text_block">{{ description }}</div>
      </b-row>
    </b-container>
</div>
</template>
<script>
    export default {
        props:{
          uptitle: String,
          title: String,
          shirt_text: String,
          description: String,
        },
        data() {
            return {

            }
        },
    }
</script>
<style lang="sass" scoped>
    .text_block
        margin-top: 50px
        text-indent: 1.3em
        white-space: pre-wrap
        padding: 70px 50px
        background-color: #3d3a3a
        color: #ffffff
        font-size: 20px
        width: 100%
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
