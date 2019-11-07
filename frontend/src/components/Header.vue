<template>
    <div>
        <header>
            <b-container class="bv-example-row">
                <b-row>
                    <b-col cols="3">
                        <img src="../img/logo.png" alt="" class="logo">
                    </b-col>
                    <b-col cols="9">
                        <ul class="menu">
                            <li><a class="logo" href="#"></a></li>
                            <b-nav-item-dropdown id="dropdown-1" text="Про школу">
                                <b-dropdown-item>First Action</b-dropdown-item>
                                <b-dropdown-item>Second Action</b-dropdown-item>
                                <b-dropdown-item>Third Action</b-dropdown-item>
                            </b-nav-item-dropdown>

                            <b-nav-item-dropdown id="dropdown-2" text="Відділи">
                                <b-dropdown-item>First Action</b-dropdown-item>
                                <b-dropdown-item>Second Action</b-dropdown-item>
                            </b-nav-item-dropdown>
                            <li><a href="#">Досягнення</a></li>
                            <li><a href="#">Вступ</a></li>
                            <li><a href="#">Галерея</a></li>
                            <li><a href="#">Контакти</a></li>
                        </ul>
                    </b-col>
                </b-row>
            </b-container>
        </header>
    </div>
</template>

<script>

    export default {
        name: 'Header',
        data () {

        }
    }

</script>


<style scoped>

    .logo {
        margin-top: 10px;
    }

    header {
        box-shadow: 0px 10px 10px #00000033;
    }

    header .menu {
        padding-top: 20px;
        padding-bottom: 5px;
        float: right;
    }

    header .menu a {
        font-size: 18px;
        color: black;
        text-decoration: none;
    }

    header .menu li {
        margin-bottom: 0;
        display: inline-block;
        margin-left: 25px;
        font-size: 18px;
    }


</style>

