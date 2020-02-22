<template>
    <div>
        <div v-if="preloader" class="preloader">
            <Spinner :status="preloader" :size="54" color="#aa0d2f"></Spinner>
        </div>
        <b-container>
            <b-col cols="12">
                <b-navbar toggleable="lg">
                    <b-navbar-brand href="/">
                        <img :src="logo" width="65px" class="logo">
                    </b-navbar-brand>
                    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                    <b-collapse id="nav-collapse" is-nav>

                        <b-navbar-nav class="ml-auto">
                            <b-navbar-nav>
                                <b-nav-item href="/history">Про школу</b-nav-item>
                                <b-nav-item href="/departments">Відділи</b-nav-item>
                                <b-nav-item href="/achievements">Досягнення</b-nav-item>
                                <b-nav-item href="/introduction">Вступ</b-nav-item>
                                <b-nav-item href="/gallery">Галерея</b-nav-item>
                                <b-nav-item href="/contacts">Контакти</b-nav-item>
                                <b-nav-item href="http://fest.jazz.sumy.ua">Джаз Вітраж</b-nav-item>
                            </b-navbar-nav>
                            <b-nav-item-dropdown toggle-class="text-dark"  right id="dropdown_style">
                                <template slot="button-content">
                                    <img v-if="!translate" src="site-files/lang/lang__uk.png">
                                    <img v-else src="site-files/lang/lang__en.png" >
                                </template>

                                <b-dropdown-item id="loool"><img src="/site-files/lang/lang__uk.png" alt="uk" data-google-lang="uk" class=" language__img"></b-dropdown-item>
                                <b-dropdown-item><img src="/site-files/lang/lang__en.png" alt="en" data-google-lang="en" class=" language__img"></b-dropdown-item>
                            </b-nav-item-dropdown>
                        </b-navbar-nav>

                    </b-collapse>
                </b-navbar>
            </b-col>
        </b-container>
    </div>
</template>

<script>
    import Spinner from 'vue-spinner-component/src/Spinner.vue';
    export default {
        name: 'Header',
        data() {
            return {
                logo: '',
                translate: true,
                preloader: true,
            }
        },
		components: {
            Spinner
		},
        created() {
            if(document.cookie.indexOf('googtrans=/uk/en') == -1) {
                this.translate = false;
            } else {
                this.translate = true;
            }
            this.getInfo();
        },
        methods: {
            getInfo() {
                axios.get('/api/info')
                    .then((response) => {
                        this.logo = response.data.logo
                    })
            }
        },
        updated() {
            this.preloader = false;
        }
    }
</script>

<style>

    .navbar-light .navbar-nav .nav-link {
        color: black;
    }

    .navbar-light .navbar-nav .nav-link:hover {
        color: black ;
    }

    .navbar-light .navbar-nav .nav-link:active {
        color: #ad0025 ;
    }

    .dropdown-item.active, .dropdown-item:active {
        background-color: #ad0025 !important;
    }
    .dropdown-item{
        min-width: auto;
        text-align: center;
    }
    .preloader {
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background: #fff;
    }
</style>

