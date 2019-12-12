<template>
     <div>
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showInstruments = !showInstruments">
                    <span v-if="showInstruments">Приховати</span>
                    <span v-else>Додати інструмент</span>
                </button>
            </div>
        </div>
        <form enctype="multipart/form-data" v-if="showInstruments">
            <div class="row">
                <div class="col-5">
                    <div>
                        <label for="name_instruments" class="brtop">Назва інструменту</label>
                        <input type="text" name="name_instruments" v-model="name_instruments" class="form-control" id="name_instruments"
                            v-validate="{ required: true }"
                                data-vv-as="Назва інструменту">
                        <span class="errors text-danger" v-if="errors.has('name_instruments')">
                                {{ errors.first('name_instruments') }}
                        </span>
					</div>
                    <div>
                        <label for="instruments_info" class="brtop">Інформація про інструмент</label>
                        <textarea name="instruments_info" v-model="instruments_info" class="form-control" id="instruments_info" rows="5"
                            v-validate="{ required: true }"
                                data-vv-as="Інформація про інструмент"></textarea>
                        <span class="errors text-danger" v-if="errors.has('instruments_info')">
                                {{ errors.first('instruments_info') }}
                        </span>
                    </div>

                </div>
                <div class="col-5 ml-5">
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
                    <div>
						<label for="photo" class="brtop">Фото інструменту</label>
						<input type="file" name="photo" accept="image/*" ref="file" class="form-control-file" id="photo" required
							v-validate="'image'"
								data-vv-as="Фото інструменту">
						<span class="errors text-danger" v-if="errors.has('photo')">
								Файл повинен бути зображенням
						</span>
					</div>

                </div>
                 <button type="button" class="btn btn-outline-secondary mt-4 ml-4 w-25" @click="postInstruments">Зберегти</button>
				
            </div>
        </form>
        <br>
        <table class="table table-bordered accordion">
            <thead>
            <tr>
                <th width="7%">№</th>
                <th width="15%">Назва інструменту</th>
                <th width="20%">Назва відділу</th>
                <th width="25%">Фото інструменту</th>
                <th width="20%">Інформація про інструмент</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody v-for="(item, index) in instruments" :key="index">
            <tr>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ index + 1 }}</td>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ item.name_instruments }}</td>
				<td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ item.department.name_department }}</td>
				<td>
					<img v-if="item.photo" id="item-image" :src="item.photo" class="preview_img figure-img img-fluid">
					<img v-else id="item-image" :src="'../img/user.png'" class="preview_img figure-img img-fluid">
				</td>
                <td data-toggle="collapse" :data-target="'#collapse'+(index+1)">{{ item.instruments_info }}</td>
                <td id="edit-save-td">
                    <i v-if="editBtn!== item.instruments_id" class="fa fa-2x fa-pencil-square btn btn-default p-0" @click="edit(item.instruments_id, $event)"></i>
                    <i v-else class="fa fa-2x fa-check-circle btn btn-default p-0" @click="save(item.instruments_id, $event)"></i>
                </td>
                <td><i class="fa fa-2x fa-times-circle btn btn-default p-0" @click="deleteInstruments(item.instruments_id, index)"></i></td>
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
                showInstruments: false,
                instruments: [],
				department: [],
				name_instruments: '',
				instruments_info: '',
				form: new FormData,
				table_form: new FormData
			};
        },
        created () {
            this.getInstruments();
            this.getDepartments();
		},
		methods: {
			
			edit(id, event){
				this.editBtn = id;
				event.preventDefault();
				var name_instruments_input = document.createElement('input');
				var instruments_info_input = document.createElement('input');

				var name_instruments_td = event.target.parentNode.parentNode.querySelectorAll('td')[1];
				var instruments_info_td = event.target.parentNode.parentNode.querySelectorAll('td')[4];

				name_instruments_input.setAttribute('value', name_instruments_td.innerHTML);
				name_instruments_input.setAttribute('type', 'text');
				name_instruments_td.innerHTML = '';
				name_instruments_td.append(name_department_input);

				instruments_info_input.setAttribute('value', instruments_info_td.innerHTML);
				instruments_info_input.setAttribute('type', 'text');
				instruments_info_td.innerHTML = '';
				instruments_info_td.append(instruments_info_input);
			},

			save(id, event) {
				this.editBtn = 0;
				event.preventDefault();
				var name_instruments_td = event.target.parentNode.parentNode.querySelectorAll('td')[1].querySelector('input').value;
				var instruments_info_td = event.target.parentNode.parentNode.querySelectorAll('td')[4].querySelector('input').value;

				var parse_name_instruments = name_instruments_td;
				var parse_instruments_info = instruments_info_td;

				this.table_form.append('name_instruments', parse_name_instruments);
				this.table_form.append('instruments_info', parse_instruments_info);

				axios.post('/update-instrument/' + id, this.table_form)
					.then((response) => {
						this.departments = [];
						this.getInstruments();
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
			getDepartments () {
				axios.get('/api/department/')
					.then((response) => {
					   this.department = response.data
					})
			},
			getInstruments(){
				axios.get('/instruments/')
					.then((response) => {
					   	this.instruments = response.data	
					})
			},
			
			postInstruments() {
				this.$validator.validateAll().then((result) => {
					if (!result) {
						return;
					} else {
						this.form.append('departments_id', this.department.departments_id);
						this.form.append('name_instruments', this.name_instruments);
						this.form.append('instruments_info', this.instruments_info);
						this.form.append('photo', this.$refs.file.files[0]);
						axios.post('/post-instrument', this.form)
							.then((response) => {
								this.instruments = [];
                                this.getInstruments();
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
			deleteInstruments(id, index) {
				swal({
					title: "Бажаєте видалити?",
					text: "Після видалення ви не зможете відновити даний запис",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
					.then((willDelete) => {
						if (willDelete) {
							axios.post('/delete-instrument/' + id)
								.then((response) => {
									if (response.status == 200) {
										this.instruments.splice(index, 1);
									}
									swal("Інструмент був успішно видалений", {
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
