<template>
    <div class="btn_align">
        <b-button squared variant="outline-dark">{{btn}}</b-button>
    </div>
</template>

<script>
    export default {
        name: "ButtonInformation",
        data(){
            return{
                btn: "Детальніше"
            }
        }
    }
</script>

<style scoped>
    .btn_align{
        text-align: center;
    }

    .btn-outline-dark {
        color: white;
        border-color: white;
        width: 255px;
        height: 65px;
        font-size: 22px;
        text-transform: uppercase;
    }

    .btn-outline-dark:hover {
        color: white;
        background-color: black;
        border-color: black;
    }
</style>
