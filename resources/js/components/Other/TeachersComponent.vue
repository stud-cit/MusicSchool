<template>
    <div>
        <page-title title="Найкращі" uptitle="викладачі"></page-title>
        <div class="teachers">
            <b-container>
                <b-row>
                    <b-col cols="12" sm="12" md="6" lg="6" xl="6">
                        <TeacherCard/>
                    </b-col>
                    <b-col cols="12" sm="12" md="6" lg="6" xl="6">
                        <TeacherCard/>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="12" sm="12" md="6" lg="6" xl="6">
                        <TeacherCard/>
                    </b-col>
                    <b-col cols="12" sm="12" md="6" lg="6" xl="6">
                        <TeacherCard/>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="12" sm="12" md="6" lg="6" xl="6">
                        <TeacherCard/>
                    </b-col>
                    <b-col cols="12" sm="12" md="" lg="6" xl="6">
                        <TeacherCard/>
                    </b-col>
                </b-row>
                <paginate :items="items" @paginateArray="paginateArray = $event" :perPage="3"></paginate>
            </b-container>
        </div>
               
    </div>  
</template>

<script>
    import TeacherCard from '../Other/TeacherCard.vue';
    import paginate from '../PaginationComponent';

    export default {
        name: "TeachersComponent",
        data() {
            return {

                items: [
                    { id: 1 },
                    { id: 2 },
                    { id: 3 },
                    { id: 4 },
                    { id: 5 },
                    { id: 6 },
                    { id: 7 },
                    { id: 8 },
                    { id: 9 },
                ],
                paginateArray: [],
            }
        },
        created() {
        	getTeachers();
        },
        computed: {

        },
        methods: {
        	getTeachers() {
		        axios.get('/api/get-teacher')
			        .then((response) => {
				        this.teacher = response.data;
			        })
            }
        },
        components: {
            paginate,
            TeacherCard,
        }

    }
</script>


<style scoped>
    .teachers{
        position: relative;
        display: flex;
        align-items: center;
        margin-top: 100px;
    }
    .teachers::before{
        content: '';
        position: absolute;
        width: 60%;
        height: 85%;
        background: transparent linear-gradient(180deg, #E91B47 0%, #6A0017 100%);
    }
</style>
