<template>
    <div class="ml-5">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showInstruments = !showInstruments">Додати інформацію про відділ</button>
            </div>
        </div>
        <form enctype="multipart/form-data" v-if="showInstruments">
            <div class="row">
                <div class="form-group row">
                    <label for="name_instruments" class="col-sm-2 col-form-label">Заголовок</label>
                    <div class="col-sm-6">
                        <input type="text" name="name_instruments" v-model="name_instruments" class="form-control" id="name_instruments"
                            v-validate="{ required: true }"
                                data-vv-as="Заголовок">
                        <span class="errors text-danger" v-if="errors.has('name_instruments')">
                                {{ errors.first('name_instruments') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="instruments_info" class="col-sm-2 col-form-label">Додаткова інформація (має бути не більше 900 символів)</label>
                    <div class="col-sm-6">
                        <textarea name="instruments_info" v-model="instruments_info" class="form-control" id="instruments_info" rows="5" maxlength="900"
                            v-validate="{ required: true }"
                                data-vv-as="Інформація"></textarea>
                        <span class="errors text-danger" v-if="errors.has('instruments_info')">
                                {{ errors.first('instruments_info') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="departments_id" class="col-sm-2 col-form-label">Відділ</label>
                    <div class="col-sm-6">
                        <select class="form-control" v-model="department.departments_id" id="departments_id" name="departments_id"
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
                    <label for="instrumentImage" class="col-sm-2 col-form-label">Фото</label>
                    <div class="col-sm-6">
						<label class="custom-file w-100">
							<input type="file" class="custom-file-input col-6" id="instrumentImage" name="instrumentImage"
							ref="instrumentImage" @change="previewFiles($event)" accept=".jpg, .jpeg, .png, .bmp" v-validate="{ 'ext':['jpg', 'jpeg', 'png', 'bmp'] }" required>
							<span class="custom-file-control">Файл не обрано</span>
						</label>
						<img v-if="!errors.has('instrumentImage')" class="mt-3 w-50" :src="image">
						<span class="errors text-danger" v-if="errors.has('instrumentImage')">
							Файл повинен бути зображенням
						</span>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postInstruments">Зберегти</button>
            </div>
        </form>
        <hr>
        <table class="table table-bordered">
			<thead>
				<tr>
					<th width="10px" scope="col">№</th>
					<th width="150px" scope="col">Фото</th>
					<th scope="col">Заголовок</th>
					<th scope="col">Відділ</th>
					<th scope="col">Додаткова інформація</th>
					<th width="10px" scope="col"></th>
					<th width="10px" scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in instruments" :key="item.instruments_id">
					<th scope="row">{{ index + 1 }}</th>
					<td>
						<img v-if="item.photo" id="item-image" :src="item.photo" class="preview_img figure-img img-fluid">
						<img v-else id="item-image" :src="'../img/empty.png'" class="preview_img figure-img img-fluid">
					</td>
					<td>{{ item.name_instruments }}</td>
					<td>{{ item.department.name_department }}</td>
					<td>{{ item.instruments_info }}</td>
					<td><router-link style="color:#000" :to="{ name: 'edit-instruments', params: {id: item.instruments_id} }"><i class="fa fa-2x fa-pencil-square btn btn-default p-0"></i></router-link></td>
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
                showInstruments: false,
                instruments: [],
				department: [],
				image: '',
				name_instruments: '',
				instruments_info: '',
				form: new FormData
			};
        },
        created () {
			document.title = "Інформація про відділ";
            this.getInstruments();
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
			getInstruments(){
				axios.get('/api/instruments')
					.then((response) => {
					   	this.instruments = response.data
					})
			},

			postInstruments() {
				this.$validator.validateAll().then((result) => {
					if (!result) {
						return;
					} else {
						const selects = document.querySelectorAll('select');
						const valOptions = [];
						for (let index = 0; index < selects.length; index++) {
							valOptions.push(" "+selects[index].value);
						}
						this.form.append('name_instruments', this.name_instruments);
						this.form.append('instruments_info', this.instruments_info);
						this.form.append('departments_id', valOptions);
						this.form.append('photo', this.$refs.instrumentImage.files[0]);
						axios.post('/api/instrument', this.form)
							.then((response) => {
								this.instruments.push(response.data);
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
							axios.delete('/api/instrument/' + id)
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
