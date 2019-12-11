<template>
    <div>
        <section class="map-section">
            <iframe class="map"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1257.746539782796!2d34.79343155826581!3d50.914595194885536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4129022862ea422f%3A0x1620189a40515f9f!2z0LLRg9C70LjRhtGPINCX0LDRgdGD0LzRgdGM0LrQsCwgMTDQsCwg0KHRg9C80LgsINCh0YPQvNGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCA0MDAwMA!5e0!3m2!1suk!2sua!4v1573816488313!5m2!1suk!2sua"   frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            <div class="contacts-absolute">
                <b-container >
                    <b-row class="contacts-info">
                        <b-col cols="12" md="9" lg="7" xl="6" class="contacts-block">
                            <h2 class="contacts-title">КОНТАКТИ</h2>
                            <ul class="contacts-list">
                                <li class="list-item">
                                    <img src="img/contacts-1.png" alt="">
                                    <div class="text">
                                        <p class="title">Телефон:</p>
                                        <p class="content">+38 (050) 844 10 26</p>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <img src="img/contacts-2.png" alt="">
                                    <div class="text">
                                        <p class="title">E-Mail:</p>
                                        <p class="content">example@email.com</p>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <img src="img/contacts-3.png" alt="">
                                    <div class="text">
                                        <p class="title">Адрес:</p>
                                        <p class="content">г.Сумы ул. Засумская,
                                            10-А, офис 5</p>
                                    </div>
                                </li>
                            </ul>
                        </b-col>
                    </b-row>
                </b-container>
            </div>
        </section>
    </div>
</template>

<script>
    

    export default {
        name: 'MapComponent',
        data() {
            return {

            };
        },

        created () {

        },
        computed: {

        },
        methods: {

        },


    }
</script>

<style lang="sass" scoped>
    .map-section
        position: relative
        overflow: hidden
        margin-bottom: -20px
    .map
        height: 780px
        margin-left: -30%
        width: 130%

    .contacts-absolute
        position: absolute
        width: 100%
        height: 100%
        right: 0
        top: 0
        padding-top: 160px
        .contacts-info
            justify-content: flex-end
            .contacts-block
                box-shadow: 0 3px 19px rgba(0, 0, 0, 0.15)
                border-radius: 4px
                background-color: #ffffff
                padding: 50px 187px 50px 50px
                .contacts-title
                    color: #2b2b2b
                    font-family: Montserrat
                    font-size: 40px
                    font-weight: 700
                    margin-bottom: 60px
                    padding-left: 40px
                    border-left: 11px solid #6a0017
                .contacts-list
                    padding-left: 0
                    .list-item
                        margin-bottom: 35px
                        display: flex
                        align-items: flex-start

                    .text
                        margin-left: 36px
                        line-height: 1.2
                        p
                            margin-bottom: 0
                        .title
                            color: #2b2b2b
                            font-family: Montserrat
                            font-size: 14px
                            font-weight: 400
                            margin: 0
                        .content
                            margin-top: 10px
                            color: #2b2b2b
                            font-family: Montserrat
                            font-size: 20px
                            font-weight: 600
    @media (max-width: 575px)
        .map
            height: 580px

        .contacts-absolute
            padding-top: 90px
            .contacts-info
                justify-content: flex-end
                .contacts-block

                    margin: 0 15px
                    padding: 30px
                    max-width: calc(100% - 30px)
                    .contacts-title
                        font-size: 26px
                        padding-left: 15px

                    .contacts-list
                        padding-left: 0

                        .text
                            margin-left: 20px
                            p
                                margin-bottom: 0
                            .title
                                font-size: 11px

                            .content
                                font-size: 14px

</style>
