<template>
    <div>
        <page-title title="Найкращі" uptitle="викладачі"></page-title>
        <div class="teachers">
            <b-container>
                <b-row>
                    <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(item, index) in paginateArray" :key="item.teachers_id">
                        <TeacherCard :teacher="paginateArray[index]"/>
                    </b-col>
                </b-row>
                <paginate :items="teacher" @paginateArray="paginateArray = $event" :perPage="4"></paginate>
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
            	teacher: [],
                paginateArray: [],
            }
        },
        created() {
        	this.getTeachersId();
        },
        computed: {

        },
        methods: {
        	getTeachersId() {
		        axios.get('/api/teacher/department/'+this.$route.params.id)
			        .then((response) => {
                        this.teacher = response.data;
                        console.log(response.data)
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
        height: 80%;
        background: transparent linear-gradient(180deg, #E91B47 0%, #6A0017 100%);
        margin-top: -100px;
    }
</style>
