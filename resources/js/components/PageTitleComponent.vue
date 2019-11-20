<template>
    <div class="title-block">
        <div class="notes">
            <b-container>
                <b-row>
                    <b-col xl="8">
                        <h1 class="title">
                            <span class="uptitle">{{uptitle}}</span><br>
                            {{title}}
                        </h1>
                    </b-col>
                    <b-col xl="4">
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