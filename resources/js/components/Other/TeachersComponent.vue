<template>
    <div>
        <page-title title="Найкращі" uptitle="викладачі"></page-title>
        <div class="teachers">
            <b-container>
                <b-row>
                    <b-col cols="6">
                        <TeacherCard/>
                    </b-col>
                    <b-col cols="6">
                        <TeacherCard/>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="6">
                        <TeacherCard/>
                    </b-col>
                    <b-col cols="6">
                        <TeacherCard/>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col cols="6">
                        <TeacherCard/>
                    </b-col>
                    <b-col cols="6">
                        <TeacherCard/>
                    </b-col>
                </b-row>
            </b-container>
        </div>
               
    </div>  
</template>

<script>
    import TeacherCard from '../Other/TeacherCard.vue'

    export default {
        name: "TeachersComponent",
        components: {
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
