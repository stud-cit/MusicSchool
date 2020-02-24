<template>
    <div>
        <div class="row">
            <div class="col-12 mt-1 mb-2">
				<button type="button" class="btn btn-primary float-left" @click="showForm = !showForm">Додати відділ</button>
            </div>
        </div>
        <form enctype="multipart/form-data" v-if="showForm">
            <div class="row">
                <div class="form-group row">
                    <label for="departmentName" class="col-sm-2 col-form-label">Назва відділу</label>
                    <div class="col-sm-6">
                        <input type="text" name="departmentName" class="form-control" v-model="name_department" id="departmentName"
                               v-validate="{ required: true }"
                               data-vv-as="Назва відділу">
                        <span class="errors text-danger" v-if="errors.has('departmentName')">
                            {{ errors.first('departmentName') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="departmentInfo" class="col-sm-2 col-form-label">Інформація про відділ (має бути не більше 875 символів)</label>
                    <div class="col-sm-6">
                        <textarea name="departmentInfo" class="form-control" cols="15" rows="6" v-model="departments_info" id="departmentInfo"
                                  v-validate="{ required: true}" maxlength="875"
                                  data-vv-as="Інформація про відділ">
                        </textarea>
                        <span class="errors text-danger" v-if="errors.has('departmentInfo')">
                            {{ errors.first('departmentInfo') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="departmentImage" class="col-sm-2 col-form-label">Зображення</label>
                    <div class="col-sm-6">
                        <label class="custom-file w-100">
                            <input type="file" class="custom-file-input col-6" id="departmentImage" name="departmentImage" ref="departmentImage" 
                                @change="previewFiles($event)" accept=".png" v-validate="{ 'ext':['png'] }" required>
                            <span class="custom-file-control">Файл не обрано</span>
                        </label>
                        <img v-if="!errors.has('departmentImage')" class="mt-3 w-50" :src="image">
                       <span class="errors text-danger" v-if="errors.has('departmentImage')">
							Файл не обрано або невірний формат зображення
						</span>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postDepartments">Зберегти</button>
            </div>
        </form>
        <br>
        <table class="table table-bordered">
			<thead>
				<tr>
					<th width="2%" scope="col">№</th>
					<th width="20%" scope="col">Фото</th>
					<th width="20%" scope="col">Назва</th>
					<th width="50%" scope="col">Опис</th>
					<th width="4%" scope="col"></th>
					<th width="4%" scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in departments" :key="item.departments_id">
					<th scope="row">{{ index + 1 }}</th>
					<td>
						<img v-if="item.img" id="item-image" :src="item.img" class="preview_img figure-img img-fluid">
						<img v-else id="item-image" :src="'../img/empty.png'" class="preview_img figure-img img-fluid">
					</td>
					<td>{{ item.name_department }}</td>
					<td>{{ item.departments_info }}</td>
					<td><router-link style="color:#000" :to="{ name: 'edit-department', params: {id: item.departments_id} }"><i class="fa fa-2x fa-pencil-square btn btn-default p-0"></i></router-link></td>
					<td><i class="fa fa-2x fa-times-circle btn btn-default p-0" @click="deleteDepartments(item.departments_id, index)"></i></td>
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
                showForm: false,
				departments: [],
				name_department: '',
				departments_info: '',
				image: '',
				preloader: false
			};
		},
		components: {
			Spinner
		},
		created () {
			document.title = "Відділи";
            this.getAllDepartments();
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


			getAllDepartments() {
				axios.get('/api/department')
					.then((response) => {
                        this.departments = response.data
					})
			},
			postDepartments() {
				this.$validator.validateAll().then((result) => {
					if (!result) {
						return;
					} else {
						this.preloader = !this.preloader;
						var form = new FormData;
						form.append('name_department', this.name_department);
						form.append('departments_info', this.departments_info);
						form.append('img', this.$refs.departmentImage.files[0]);
						axios.post('/api/department', form)
							.then((response) => {
								this.preloader = !this.preloader;
								this.departments.push(response.data);
                                swal("Інформація оновлена", {
                                    icon: "success",
                                    timer: 1000,
                                    button: false
						        });
							})
							.catch((error) => {
								this.preloader = !this.preloader;
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
						this.preloader = !this.preloader;
						axios.delete('/api/department/'+id)
							.then((response) => {
								this.preloader = !this.preloader;
								this.departments.splice(index, 1);
								swal("Зпис був успішно видалений", {
									icon: "success",
								});
							})
							.catch((error) => {
								this.preloader = !this.preloader;
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
<style scope></style>