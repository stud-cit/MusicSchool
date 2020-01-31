<template>
    <div class="ml-5">
        <div class="col-12 pb-3 pl-0 comeBack">
            <router-link :to="{ name: 'teacher' }"><b><i class="fa fa-angle-left" aria-hidden="true"></i> Повернутися до списку</b></router-link>
        </div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row">
                    <label for="teacher_surname" class="col-sm-2 col-form-label">Прізвище</label>
                    <div class="col-sm-6">
                        <input type="text" name="teacher_surname" v-model="teacher.teacher_surname" class="form-control" id="teacher_surname"
                            v-validate="{ required: true, regex: /^([a-zа-яіїє'-]+){2,}$/i }"
                                data-vv-as="Прізвище">
                        <span class="errors text-danger" v-if="errors.has('teacher_surname')">
                                {{ errors.first('teacher_surname') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacher_name" class="col-sm-2 col-form-label">Ім'я</label>
                    <div class="col-sm-6">
                        <input type="text" name="teacher_name" v-model="teacher.teacher_name" class="form-control" id="teacher_name"
                            v-validate="{ required: true, regex: /^([a-zа-яіїє'-]+){2,}$/i }"
                                data-vv-as="Ім'я">
                        <span class="errors text-danger" v-if="errors.has('teacher_name')">
                                {{ errors.first('teacher_name') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacher_patronymic" class="col-sm-2 col-form-label">По батькові</label>
                    <div class="col-sm-6">
                        <input type="text" name="teacher_patronymic" v-model="teacher.teacher_patronymic" class="form-control" id="teacher_patronymic"
                            v-validate="{ required: true, regex: /^([a-zа-яіїє'-]+){2,}$/i }"
                                data-vv-as="По батькові">
                        <span class="errors text-danger" v-if="errors.has('teacher_patronymic')">
                                {{ errors.first('teacher_patronymic') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="department" class="col-sm-2 col-form-label">Відділ</label>
                    <div class="col-sm-6">
                        <select class="form-control" v-model="teacher.departments_id" id="department" name="department"
                                v-validate="{ required: true }">
                            <option v-for="option in department" :key="option.departments_id" :value="option.departments_id">
                                {{ option.name_department }}
                            </option>
                        </select>
						<span class="errors text-danger" v-if="errors.has('departments_id')">
                                Оберіть один з відділів
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacherImage" class="col-sm-2 col-form-label">Фото викладача</label>
                    <div class="col-sm-6">
						<label class="custom-file w-100">
							<input type="file" class="custom-file-input col-6" id="teacherImage" name="teacherImage" ref="teacherImage" @change="previewFiles($event)" accept="image/*" v-validate="'image'">
							<span class="custom-file-control">Файл не обрано</span>
						</label>
						<img v-if="!errors.has('teacherImage')" class="mt-3 w-50" :src="teacher.photo">
                        <span class="text-danger"
                            v-if="errors.has('teacherImage')">Файл повинен бути зображенням
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary my-2 ml-4 w-25" @click="save">Зберегти</button>
            </div>
        </form>
    </div>
</template>

<script>
	export default {
		name: "EditTeachers",
		data() {
			return {
				teacher: [],
				department: []
			};
		},
		created () {
            document.title = "Вчителі";
			this.getTeachersId();
			this.getDepartments();
		},
		methods: {
            previewFiles(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.teacher.photo = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                    input.parentNode.querySelector('span').innerHTML = input.files[0].name;
                }
            },
			getDepartments() {
				axios.get('/api/department')
					.then((response) => {
						this.department = response.data;
					})
			},
			getTeachersId() {
				axios.get('/api/teacher/'+this.$route.params.id)
					.then((response) => {
                        this.teacher = response.data;
					})
			},
			save() {
                var form = new FormData;
				form.append('teacher_surname', this.teacher.teacher_surname);
                form.append('teacher_name', this.teacher.teacher_name);
                form.append('teacher_patronymic', this.teacher.teacher_patronymic);
                form.append('teacher_info', this.teacher.teacher_info);
                form.append('departments_id', this.teacher.departments_id);
				form.append('photo', this.$refs.teacherImage.files[0]);
				axios.post('/api/teacher/'+this.$route.params.id, form)
					.then((response) => {
						swal("Інформація оновлена", {
							icon: "success",
							timer: 1000,
							button: false
						});
					})
					.catch((error) => {
						swal({
							icon: "error",
							title: 'Помилка',
							text: 'Поля: "Назва відділу, Інформація про відділ" повинні бути заповнені'
						});
					});
			},
		}
	}
</script>

<style scoped>

</style>
