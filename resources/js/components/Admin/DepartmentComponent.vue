<template>
    <div>
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showDepartments = !showDepartments">
                    <span v-if="showDepartments">Приховати</span>
                    <span v-else>Додати відділ</span>
                </button>
            </div>
        </div>
        <form enctype="multipart/form-data" v-if="showDepartments">
            <div class="row">
                <div class="col-5">
                    <div>
                        <label for="name_department" class="brtop">Назва відділу</label>
                        <input type="text" name="name_department" v-model="name_department" class="form-control" id="name_department"
                            v-validate="{ required: true }"
                                data-vv-as="Назва відділу">
                        <span class="errors text-danger" v-if="errors.has('name_department')">
                                {{ errors.first('name_department') }}
                        </span>
					</div>
                    <div>
                        <label for="departments_info" class="brtop">Інформація про відділ</label>
                        <textarea name="departments_info" v-model="departments_info" class="form-control" id="departments_info" rows="5"
                            v-validate="{ required: true }"
                                data-vv-as="Інформація про відділ"></textarea>
                        <span class="errors text-danger" v-if="errors.has('departments_info')">
                                {{ errors.first('departments_info') }}
                        </span>
                    </div>
                     <button type="button" class="btn btn-outline-secondary mt-3 w-50" @click="postDepartments">Зберегти</button>
                </div>
				
            </div>
        </form>
        <br>
        <table class="table table-bordered accordion">
            <thead>
            <tr>
                <th width="7%">№</th>
                <th width="40%">Назва відділу</th>
                <th width="40%">Інформація про відділ</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody v-for="(item, index) in departments" :key="index">
            <tr>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ index + 1 }}</td>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ item.name_department }}</td>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ item.departments_info }}</td>
                <td id="edit-save-td">
                    <i v-if="editBtn!== item.departments_id" class="fa fa-2x fa-pencil-square btn btn-default p-0" @click="edit(item.departments_id, $event)"></i>
                    <i v-else class="fa fa-2x fa-check-circle btn btn-default p-0" @click="save(item.departments_id, $event)"></i>
                </td>
                <td><i class="fa fa-2x fa-times-circle btn btn-default p-0" @click="deleteDepartments(item.departments_id, index)"></i></td>
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
                showDepartments: false,
				departments: [],
				name_department: '',
				departments_info: '',
				form: new FormData,
				table_form: new FormData
			};
		},
		created () {
            this.getAllDepartments();
		},
		methods: {
			edit(id, event){
				this.editBtn = id;
				event.preventDefault();
				var name_department_input = document.createElement('input');
				var departments_info_input = document.createElement('input');

				var name_department_td = event.target.parentNode.parentNode.querySelectorAll('td')[1];
				var departments_info_td = event.target.parentNode.parentNode.querySelectorAll('td')[2];

				name_department_input.setAttribute('value', name_department_td.innerHTML);
                name_department_input.setAttribute('type', 'text');
                name_department_input.setAttribute('id', 'department_data');
				name_department_td.innerHTML = '';
				name_department_td.append(name_department_input);

				departments_info_input.setAttribute('value', departments_info_td.innerHTML);
                departments_info_input.setAttribute('type', 'text');
                departments_info_input.setAttribute('id', 'department_data');
				departments_info_td.innerHTML = '';
                departments_info_td.append(departments_info_input);
			},

			save(id, event) {
				this.editBtn = 0;
				event.preventDefault();
				var name_department_td = event.target.parentNode.parentNode.querySelectorAll('td')[1].querySelector('input').value;
				var departments_info_td = event.target.parentNode.parentNode.querySelectorAll('td')[2].querySelector('input').value;

				var parse_name_department = name_department_td;
				var parse_departments_info = departments_info_td;

				this.table_form.append('name_department', parse_name_department);
                this.table_form.append('departments_info', parse_departments_info);
                console.log(parse_name_department, parse_departments_info);
				axios.post('/update-department/' + id, this.table_form)
					.then((response) => {
						this.departments = [];
						this.getAllDepartments();
						swal("Інформація оновлена", {
							icon: "success",
							timer: 1000,
							button: false
						});
					})
					.catch((error) => {
                        this.departments = [];
						this.getAllDepartments();
						swal({
							icon: "error",
							title: 'Помилка',
							text: 'Поля: "Назва відділу, Інформація про відділ" повинні бути заповнені'
						});
					});
			},
			getAllDepartments() {
				axios.get('/get-all-department')
					.then((response) => {
                        this.departments = response.data.departments
					})
			},
			postDepartments() {
				this.$validator.validateAll().then((result) => {
					if (!result) {
						return;
					} else {
						this.form.append('name_department', this.name_department);
						this.form.append('departments_info', this.departments_info);
						axios.post('/post-department', this.form)
							.then((response) => {
								this.departments = [];
                                this.getAllDepartments();
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
			deleteDepartments(id, index) {
				swal({
					title: "Бажаєте видалити?",
					text: "Після видалення ви не зможете відновити даний запис",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
					.then((willDelete) => {
						if (willDelete) {
							axios.post('/delete-department/' + id)
								.then((response) => {
									if (response.status == 200) {
										this.departments.splice(index, 1);
									}
									swal("Відділ був успішно видалений", {
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
	}
</script>