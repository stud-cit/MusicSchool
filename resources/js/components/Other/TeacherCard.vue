<template>
    <div class="teacher_card">
        <div class="teacher_img">
            <img :src="teacher.photo">
        </div>
        <div class="teacher_info">
            <h2>{{ teacher.teacher_name }} {{ teacher.teacher_patronymic }} {{ teacher.teacher_surname }}</h2>
            <span>{{ teacher.teacher_info }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TeacherCard",
	    props: ['teacher'],
    }
</script>

<style scoped>
.teacher_card{
    background: #fff;
    box-shadow: 5px 5px 25px #00000029;
    margin-bottom: 30px;
}
.teacher_card .teacher_img{
    height: 540px;
}
.teacher_card .teacher_img img{
    object-fit: contain;
    width: 100%;
    height: 100%;
}
.teacher_card .teacher_info{
    padding: 40px 45px;
}
.teacher_card .teacher_info h2{
    font-weight: bold;
    font-size: 28px;
    color: #3d3a3a;
    text-transform: uppercase;
    margin-bottom: 15px;
}
.teacher_card .teacher_info span{
    font-size: 16px;
    color: #000000BF;
    white-space: pre-wrap;
}
</style>
