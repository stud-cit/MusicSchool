<template>
     <div>
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showTeacher = !showTeacher">
                    <span v-if="showTeacher">Приховати</span>
                    <span v-else>Додати викладача</span>
                </button>
            </div>
        </div>
        <form enctype="multipart/form-data" v-if="showTeacher">
            <div class="row">
                <div class="col-5">
                    <div>
                        <label for="teacher_surname" class="brtop">Прізвище</label>
                        <input type="text" name="teacher_surname" v-model="teacher_surname" class="form-control" id="teacher_surname"
                            v-validate="{ required: true, regex: /^([a-zа-яіїє'-]+){2,}$/i }"
                                data-vv-as="Прізвище">
                        <span class="errors text-danger" v-if="errors.has('teacher_surname')">
                                {{ errors.first('teacher_surname') }}
                        </span>
					</div>
                    <div>
                        <label for="teacher_name" class="brtop">Ім'я</label>
                        <input type="text" name="teacher_name" v-model="teacher_name" class="form-control" id="teacher_name"
                            v-validate="{ required: true, regex: /^([a-zа-яіїє'-]+){2,}$/i }"
                                data-vv-as="Ім'я">
                        <span class="errors text-danger" v-if="errors.has('teacher_name')">
                                {{ errors.first('teacher_name') }}
                        </span>
					</div>
                    <div>
                        <label class="brtop">Відділ</label>
                        <select class="form-control" style="width: 80%" v-model="department.departments_id" id="departments_id" name="departments_id" 
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
                
                <div class="col-5 ml-5">
                     <div>
						<label for="photo" class="brtop">Фото викладача</label>
						<input type="file" name="photo" accept="image/*" ref="file" class="form-control-file" id="photo" required
							v-validate="'image'"
								data-vv-as="Фото викладача">
						<span class="errors text-danger" v-if="errors.has('photo')">
								Файл повинен бути зображенням
						</span>
					</div>
                    <div>
                        <label for="teacher_info" class="brtop">Інформація про викладача</label>
                        <textarea name="teacher_info" v-model="teacher_info" class="form-control" id="teacher_info" rows="5"
                            v-validate="{ required: true }"
                                data-vv-as="Інформація про викладача"></textarea>
                        <span class="errors text-danger" v-if="errors.has('teacher_info')">
                                {{ errors.first('teacher_info') }}
                        </span>
                    </div>
                   

                </div>
                 <button type="button" class="btn btn-outline-secondary mt-4 ml-4 w-25" @click="postTeachers">Зберегти</button>
				
            </div>
        </form>
        <br>
        <table class="table table-bordered accordion">
            <thead>
            <tr>
                <th width="4%">№</th>
                <th width="22%">Прізвище, ім'я викладача</th>
                <th width="20%">Назва відділу</th>
                <th width="25%">Фото викладача</th>
                <th width="20%">Інформація про викладача</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody v-for="(item, index) in teachers" :key="index">
            <tr>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ index + 1 }}</td>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ `${item.teacher_surname} ${item.teacher_name}` }}</td>
				<td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ item.department.name_department }}</td>
				<td>
					<img v-if="item.photo" id="item-image" :src="item.photo" class="preview_img figure-img img-fluid">
					<img v-else id="item-image" :src="'../img/user.png'" class="preview_img figure-img img-fluid">
				</td>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ item.teacher_info }}</td>
                <td id="edit-save-td">
                    <i v-if="editBtn!== item.instruments_id" class="fa fa-2x fa-pencil-square btn btn-default p-0" @click="edit(item.teachers_id, $event)"></i>
                    <i v-else class="fa fa-2x fa-check-circle btn btn-default p-0" @click="save(item.teachers_id, $event)"></i>
                </td>
                <td><i class="fa fa-2x fa-times-circle btn btn-default p-0" @click="deleteTeachers(item.teachers_id, index)"></i></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    	data() {
			return {
                editBtn: 0,
                showTeacher: false,
                teachers: [],
				department: [],
                teacher_surname: '',
                teacher_name: '',
				teacher_info: '',
				form: new FormData,
				table_form: new FormData
			};
        },
        created () {
            this.getTeachers();
            this.getDepartments();
		},
		methods: {
			
			// edit(id, event){
			// 	this.editBtn = id;
			// 	event.preventDefault();
			// 	var name_instruments_input = document.createElement('input');
			// 	var instruments_info_input = document.createElement('input');

			// 	var name_instruments_td = event.target.parentNode.parentNode.querySelectorAll('td')[1];
			// 	var instruments_info_td = event.target.parentNode.parentNode.querySelectorAll('td')[4];

			// 	name_instruments_input.setAttribute('value', name_instruments_td.innerHTML);
			// 	name_instruments_input.setAttribute('type', 'text');
			// 	name_instruments_td.innerHTML = '';
			// 	name_instruments_td.append(name_department_input);

			// 	instruments_info_input.setAttribute('value', instruments_info_td.innerHTML);
			// 	instruments_info_input.setAttribute('type', 'text');
			// 	instruments_info_td.innerHTML = '';
			// 	instruments_info_td.append(instruments_info_input);
			// },

			// save(id, event) {
			// 	this.editBtn = 0;
			// 	event.preventDefault();
			// 	var name_instruments_td = event.target.parentNode.parentNode.querySelectorAll('td')[1].querySelector('input').value;
			// 	var instruments_info_td = event.target.parentNode.parentNode.querySelectorAll('td')[4].querySelector('input').value;

			// 	var parse_name_instruments = name_instruments_td;
			// 	var parse_instruments_info = instruments_info_td;

			// 	this.table_form.append('name_instruments', parse_name_instruments);
			// 	this.table_form.append('instruments_info', parse_instruments_info);

			// 	axios.post('/update-instrument/' + id, this.table_form)
			// 		.then((response) => {
			// 			this.departments = [];
			// 			this.getInstruments();
			// 			swal("Інформація оновлена", {
			// 				icon: "success",
			// 				timer: 1000,
			// 				button: false
			// 			});
			// 		})
			// 		.catch((error) => {
			// 			swal({
			// 				icon: "error",
			// 				title: 'Помилка',
			// 				text: 'Поля: "Назва відділу, Інформація про відділ" повинні бути заповнені'
			// 			});
			// 		});
			// },
			getDepartments () {
				axios.get('/api/department/')
					.then((response) => {
					   this.department = response.data
					})
			},
			getTeachers(){
				axios.get('/teachers/')
					.then((response) => {
					   	this.teachers = response.data	
					})
			},
			
			postTeachers() {
				this.$validator.validateAll().then((result) => {
					if (!result) {
						return;
					} else {
						this.form.append('departments_id', this.department.departments_id);
                        this.form.append('teacher_surname', this.teacher_surname);
                        this.form.append('teacher_name', this.teacher_name);
						this.form.append('teacher_info', this.teacher_info);
						this.form.append('photo', this.$refs.file.files[0]);
						axios.post('/post-teacher', this.form)
							.then((response) => {
								this.teachers = [];
                                this.getTeachers();
                                swal("Інформація оновлена", {
                                    icon: "success",
                                    timer: 1000,
                                    button: false
						        });
							})
							.catch((error) => {
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
							axios.post('/delete-teacher/' + id)
								.then((response) => {
									if (response.status == 200) {
										this.teachers.splice(index, 1);
									}
									swal("Запис успішно видалено", {
										icon: "success",
									});
								})
								.catch((error) => {
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

