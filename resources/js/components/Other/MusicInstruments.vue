<template>
    <div>
        <page-title title="інструментів" uptitle="Різноманітність"></page-title>
        <section class="instruments-section mt-50">
            <div class="content-block">
                <div class="content-layout"></div>
                <b-container>
                    <ul class="instrument-list">
                        <li class="list-item" v-for="item of paginateArray">
                            <div class="description">
                                <h3 class="item-title"><b>{{item.name_instruments}}</b> </h3>
                                <p class="text">{{item.instruments_info}} </p>
                            </div>
                            <img :src="item.photo" alt="" class="w-100 item-img">
                        </li>
                    </ul>


                </b-container>
            </div>
            <paginate :items="instrument" perPage="3" @paginateArray="paginateArray = $event" :perPage="3"></paginate>
        </section>

    </div>

</template>

<script>
    import paginate from '../PaginationComponent';
    export default {
        data() {
            return {
                instrument: [],
                paginateArray: []
            }
        },
	    created() {
		    this.getInstrumentId();
	    },
        computed: {


        },
	    methods: {
		    getInstrumentId() {
			    axios.get('/api/instruments/'+this.$route.params.id)
				    .then((response) => {
					    this.instrument = response.data
					    console.log(this.instrument)
				    })
		    },
	    },
        components: {
            paginate
        }

    }
</script>

<style lang="sass" scoped>
    .instruments-section
        .content-block
            position: relative
            .content-layout

                position: absolute
                width: 50%
                left: 0
                top: 200px
                height: calc(100% - 400px)
                background-image: linear-gradient(180deg, #e91b47 0%, #6a0017 100%)
                z-index: -1
            .instrument-list
                z-index: 5
                list-style: none
                display: flex
                flex-direction: column
                justify-content: center
                .list-item
                    padding-left: 280px
                    position: relative
                    display: block
                    margin-bottom: 40px
                    .description
                        position: absolute
                        right: 40%
                        top: 50%
                        transform: translateY(-50%)
                        box-shadow: 5px 5px 25px rgba(0, 0, 0, 0.16)
                        background-color: #ffffff
                        padding: 35px 50px
                    &:last-of-type
                        margin-bottom: 0

</style>


