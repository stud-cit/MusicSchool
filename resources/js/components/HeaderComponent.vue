<template>
    <div>
        <b-container>
            <b-col cols="12">
                <b-navbar toggleable="lg">
                    <b-navbar-brand href="/home">
                        <img src="/img/logo.png" alt="" class="logo">
                    </b-navbar-brand>

                    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                    <b-collapse id="nav-collapse" is-nav>

                        <b-navbar-nav class="ml-auto">
                            <b-nav-item-dropdown toggle-class="text-dark" text="Про школу" right>
                                <b-dropdown-item href="/history">Історія</b-dropdown-item>
                                <b-dropdown-item href="/news">Новини</b-dropdown-item>
                            </b-nav-item-dropdown>

                            <b-nav-item-dropdown toggle-class="text-dark" text="Відділи" right id="dropdown_style">
                                <b-dropdown-item href="/teachers">Викладачі</b-dropdown-item>
                                <b-dropdown-item href="/instruments">Інструменти</b-dropdown-item>
                            </b-nav-item-dropdown>

                            <b-navbar-nav>
                                <b-nav-item href="/achievements" id ="qqq">Досягнення</b-nav-item>
                                <b-nav-item href="/introduction">Вступ</b-nav-item>
                                <b-nav-item href="/gallery">Галерея</b-nav-item>
                                <b-nav-item href="/contacts">Контакти</b-nav-item>
                            </b-navbar-nav>

                        </b-navbar-nav>
                    </b-collapse>
                </b-navbar>
            </b-col>
        </b-container>
    </div>
</template>

<script>

    export default {
        name: 'Header',
        data() {
            return {}
        }
    }

</script>

<style scoped>

    .navbar-light .navbar-nav .nav-link {
        color: black;
    }
    #qqq {
        background: red;
    }

</style>

