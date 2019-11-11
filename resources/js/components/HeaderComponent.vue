<template>
    <div>
        <b-container>
            <b-col cols="12">
                <b-navbar toggleable="lg">
                    <b-navbar-brand href="#">
                        <img src="/img/logo.png" alt="" class="logo">
                    </b-navbar-brand>

                    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                    <b-collapse id="nav-collapse" is-nav>

                        <b-navbar-nav class="ml-auto">
                            <b-nav-item-dropdown text="Про школу" right>
                                <b-dropdown-item href="#">EN</b-dropdown-item>
                                <b-dropdown-item href="#">ES</b-dropdown-item>
                            </b-nav-item-dropdown>

                            <b-nav-item-dropdown text="Відділи" right>
                                <b-dropdown-item href="#">EN</b-dropdown-item>
                                <b-dropdown-item href="#">ES</b-dropdown-item>
                            </b-nav-item-dropdown>

                            <b-navbar-nav>
                                <b-nav-item href="#">Досягнення</b-nav-item>
                                <b-nav-item href="#">Вступ</b-nav-item>
                                <b-nav-item href="#">Галерея</b-nav-item>
                                <b-nav-item href="#">Контакти</b-nav-item>
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

</style>

