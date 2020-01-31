<template>
    <div>
        <page-title :title="page.title" :uptitle="page.uptitle" :description="page.description"></page-title>
        <section class="instruments-section mt-50">
            <div class="content-block">
                <div class="content-layout"></div>
                <b-container>
                    <ul class="instrument-list">
                        <li class="list-item" v-for="item of paginateArray" :key="item.teachers_id">
                            <div class="description">
                                <h3 class="item-title">{{item.name_instruments}} </h3>
                                <p class="text">{{item.instruments_info}} </p>
                            </div>
                            <img :src="item.photo" alt="" class="w-100 item-img">
                        </li>
                    </ul>


                </b-container>
            </div>
            <paginate :items="instrument" @paginateArray="paginateArray = $event" :perPage="3"></paginate>
        </section>

    </div>

</template>

<script>
    import paginate from '../PaginationComponent';
    import getData from '../mixins/getData';
    export default {
        mixins: [getData],
        data() {
            return {
                instrument: [],
                paginateArray: []
            }
        },
	    created() {
            this.getInstrumentId();
            this.getInfoPage('instruments');
	    },
	    methods: {
		    getInstrumentId() {
			    axios.get('/api/instrument/department/'+this.$route.params.id)
				    .then((response) => {
					    this.instrument = response.data;
				    })
            }
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
                width: 66%
                left: 0
                top: 200px
                height: calc(100% - 400px)
                background-image: linear-gradient(180deg, #e91b47 0%, #6a0017 100%)
                z-index: -1
            .instrument-list
                z-index: 5
                padding-left: 0
                list-style: none
                display: flex
                flex-direction: column
                justify-content: center
                .list-item
                    padding-left: 20%
                    position: relative
                    display: block
                    margin-bottom: 40px
                    .description
                        position: absolute
                        left: 0%
                        top: 50%
                        transform:  translateY(-50%)
                        box-shadow: 5px 5px 25px rgba(0, 0, 0, 0.16)
                        background-color: #ffffff
                        padding: 35px 50px
                        max-width: 580px
                        min-width: 180px
                        .item-title
                            color: #2b2b2b
                            font-family: Montserrat
                            font-size: 32px
                            font-weight: 700
                            margin-bottom: 40px
                            text-transform: uppercase
                        p
                            color: rgba(0, 0, 0, 0.75)
                            font-family: Montserrat
                            font-size: 16px
                            font-weight: 400
                            line-height: 1.5
                    &:last-of-type
                        margin-bottom: 0
    @media (max-width: 1199px)
        .instruments-section
            .content-block
                .content-layout
                    top: 50px
                    height: calc(100% - 100px)
                .instrument-list
                    display: flex
                    flex-direction: column
                    justify-content: center
                    .list-item
                        padding-left: 0
                        position: relative
                        display: flex
                        flex-direction: column
                        margin-bottom: 30px
                        .description
                            position: static
                            right: 0
                            top: 0
                            transform: translateY(0)
                            max-width: 100%
                            .item-title
                                margin-bottom: 30px


    @media (max-width: 575px)
        .instruments-section
            .content-block
                .instrument-list
                    .list-item
                        .description
                            padding: 20px 25px
                            .item-title
                                text-align: center
                                margin-bottom: 25px
</style>


