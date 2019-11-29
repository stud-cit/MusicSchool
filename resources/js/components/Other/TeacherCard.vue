<template>
    <div class="teacher_card">
        <div class="teacher_img">
            <img src="img/teacher.jpg">
        </div>
        <div class="teacher_info">
            <h2>Валерія Порохова</h2>
            <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing orem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TeacherCard"
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
    object-fit: cover;
    width: 100%;
    height: 100%;
}
.teacher_card .teacher_info{
    padding: 40px 45px;
}
.teacher_card .teacher_info h2{
    font-weight: bold;
    font-size: 32px;
    color: #2B2B2B;
    text-transform: uppercase;
    margin-bottom: 15px;
}
.teacher_card .teacher_info span{
    font-size: 16px;
    color: #000000BF;
}
</style>
