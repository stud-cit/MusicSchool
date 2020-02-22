<template>
     <div class="ml-5">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showTeacher = !showTeacher">Додати</button>
            </div>
        </div>
        <form enctype="multipart/form-data" v-if="showTeacher">
            <div class="row">
                <div class="form-group row">
                    <label for="teacher_surname" class="col-sm-2 col-form-label">Прізвище</label>
                    <div class="col-sm-6">
                        <input type="text" name="teacher_surname" v-model="teacher_surname" class="form-control" id="teacher_surname"
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
                        <input type="text" name="teacher_name" v-model="teacher_name" class="form-control" id="teacher_name"
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
                        <input type="text" name="teacher_patronymic" v-model="teacher_patronymic" class="form-control" id="teacher_patronymic"
                            v-validate="{ required: true, regex: /^([a-zа-яіїє'-]+){2,}$/i }"
                                data-vv-as="По батькові">
                        <span class="errors text-danger" v-if="errors.has('teacher_patronymic')">
                                {{ errors.first('teacher_patronymic') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="departments_id" class="col-sm-2 col-form-label">Відділ</label>
                    <div class="col-sm-6">
                        <select class="form-control" v-model="departments_id" id="departments_id" name="departments_id"
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
                    <label for="teacher_info" class="col-sm-2 col-form-label">Додаткова інформація</label>
                    <div class="col-sm-6">
                        <textarea name="teacher_info" v-model="teacher_info" class="form-control" id="teacher_info" rows="5"
                            v-validate="{ required: true }"
                                data-vv-as="Додаткова інформація"></textarea>
                        <span class="errors text-danger" v-if="errors.has('teacher_info')">
                                {{ errors.first('teacher_info') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="teacherImage" class="col-sm-2 col-form-label">Фото</label>
                    <div class="col-sm-6">
						<label class="custom-file w-100">
							<input type="file" class="custom-file-input col-6" id="teacherImage" name="teacherImage"
							ref="teacherImage" required @change="previewFiles($event)" accept=".jpg, .jpeg, .png, .bmp"
								v-validate="{ 'ext':['jpg', 'jpeg', 'png', 'bmp'] }">
							<span class="custom-file-control">Файл не обрано</span>
						</label>
						<img v-if="!errors.has('teacherImage')" class="mt-3 w-50" :src="image">
						<span class="text-danger"
                            v-if="errors.has('teacherImage')">Файл повинен бути зображенням
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postTeachers">Зберегти</button>
            </div>
        </form>
        <br>
        <table class="table table-bordered">
			<thead>
				<tr>
					<th width="2%" scope="col">№</th>
					<th width="15%" scope="col">Фото</th>
					<th width="15%" scope="col">ПІБ</th>
					<th width="20%" scope="col">Відділ</th>
					<th width="40%" scope="col">Додаткова інформація</th>
					<th width="4%" scope="col"></th>
					<th width="4%" scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in teachers" :key="item.teachers_id">
					<th scope="row">{{ index + 1 }}</th>
					<td>
						<img v-if="item.photo" id="item-image" :src="item.photo" class="preview_img figure-img img-fluid">
						<img v-else id="item-image" :src="'../img/empty.png'" class="preview_img figure-img img-fluid">
					</td>
					<td>{{ `${item.teacher_surname} ${item.teacher_name} ${item.teacher_patronymic}` }}</td>
					<td>{{ item.department.name_department }}</td>
					<td>{{ item.teacher_info }}</td>
					<td><router-link style="color:#000" :to="{ name: 'edit-teacher', params: {id: item.teachers_id} }"><i class="fa fa-2x fa-pencil-square btn btn-default p-0"></i></router-link></td>
					<td><i class="fa fa-2x fa-times-circle btn btn-default p-0" @click="deleteTeachers(item.teachers_id, index)"></i></td>
				</tr>
			</tbody>
		</table>
        <div v-if="preloader" class="preloader">
            <Spinner :status="preloader" :size="54"></Spinner>
        </div>
    </div>
</template>

<script>
import Spinner from 'vue-spinner-component/src/Spinner.vue';
export default {
    	data() {
			return {
                showTeacher: false,
                teachers: [],
				department: [],
				image: '',
                teacher_surname: '',
                teacher_name: '',
                teacher_patronymic: '',
				teacher_info: '',
				departments_id: '',
				preloader: false,
				form: new FormData
			};
		},
        components: {
            Spinner
        },
        created () {
			document.title = "Колектив";
            this.getTeachers();
            this.getDepartments();
		},
		methods: {
			previewFiles(event) {
				var input = event.target;
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = (e) => {
						this.image = e.target.result;
					}
					reader.readAsDataURL(input.files[0]);
					input.parentNode.querySelector('span').innerHTML = input.files[0].name;
				}
			},
			getDepartments () {
				axios.get('/api/department')
					.then((response) => {
					   this.department = response.data
					})
			},
			getTeachers(){
				axios.get('/api/teachers')
					.then((response) => {
						this.teachers = response.data;
					})
			},

			postTeachers() {
				this.$validator.validateAll().then((result) => {
					if (!result) {
						return;
					} else {
						this.preloader = !this.preloader;
						this.form.append('departments_id', this.departments_id);
                        this.form.append('teacher_surname', this.teacher_surname);
                        this.form.append('teacher_name', this.teacher_name);
                        this.form.append('teacher_patronymic', this.teacher_patronymic);
						this.form.append('teacher_info', this.teacher_info);
						this.form.append('photo', this.$refs.teacherImage.files[0]);
						axios.post('/api/teacher', this.form)
							.then((response) => {
								this.teachers = [];
								this.getTeachers();
								this.preloader = false;
                                swal("Інформація оновлена", {
                                    icon: "success",
                                    timer: 1000,
                                    button: false
						        });
							})
							.catch((error) => {
								this.preloader = false;
								swal({
									icon: "error",
									title: 'Помилка'
								});
							});
					}

				})
			},
			deleteTeachers(id, index) {
				swal({
					title: "Бажаєте видалити?",
					text: "Після видалення ви не зможете відновити даний запис",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
					.then((willDelete) => {
						if (willDelete) {
							this.preloader = !this.preloader;
							axios.delete('/api/teacher/' + id)
								.then((response) => {
									if (response.status == 200) {
										this.preloader = false;
										this.teachers.splice(index, 1);
									}
									swal("Запис успішно видалено", {
										icon: "success",
									});
								})
								.catch((error) => {
									this.preloader = false;
									swal({
										icon: "error",
										title: 'Помилка',
										text: 'Не вдалося'
									});
								});
						}
					})
			}
		}

};
</script>

<style scoped></style>

