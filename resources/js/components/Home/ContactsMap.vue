<template>
    <div>
        <div class="map">
            <b-container>
                <b-row align-h="end">
                    <b-col cols="10" sm="6" md="6" lg="6" xl="6">
                        <div class="inf_card">
                            <b-card
                                title="Card Title"
                                id="card"
                                img-alt="Image"
                                img-top
                                tag="article"
                                style="max-width: 40rem;"
                                class="mb-2"
                            >
                                <b-card-text>
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </b-card-text>


                            </b-card>
                        </div>
                    </b-col>
                </b-row>
            </b-container>



        </div>
    </div>
</template>

<script>

    export default {
        name: 'ContactsMap',
        components: {
        },
        data() {
            return {}
        }
    }
</script>

<style scoped>
    .map{
        background-image: url("/img/map.png");
        height: auto;

    }

    .inf_card{
        margin: 150px 0;
    }

    #card{



        height: 477px;
    }
</style>
