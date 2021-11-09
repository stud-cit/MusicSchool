<template>
    <div class="ml-5">
        <div class="col-12 pb-3 pl-0 comeBack">
            <router-link :to="{ name: 'department' }"><b><i class="fa fa-angle-left" aria-hidden="true"></i> Повернутися до списку</b></router-link>
        </div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row">
                    <label for="departmentName" class="col-sm-2 col-form-label">Назва відділу</label>
                    <div class="col-sm-6">
                        <input type="text" name="departmentName" class="form-control" v-model="department.name_department" id="departmentName"
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
                        <textarea name="departmentInfo" class="form-control" cols="15" rows="6" v-model="department.departments_info" id="departmentInfo"
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
                            <input type="file" class="custom-file-input col-6" id="departmentImage" name="departmentImage" ref="departmentImage" @change="previewFiles($event)" accept=".png, .jpeg, .jpg, .bmp" v-validate="{ 'ext':['png','jpg','jpeg','bmp'] }" required>
                            <span class="custom-file-control">Файл не обрано</span>
                        </label>
                        <img class="mt-3 w-50" :src="department.img">
                        <span class="errors text-danger" v-if="errors.has('departmentImage') && department.img == ''">
							Файл не обрано або невірний формат зображення
						</span>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="save">Зберегти</button>
            </div>
        </form>
        <div v-if="preloader" class="preloader">
            <Spinner :status="preloader" :size="54"></Spinner>
        </div>
    </div>
</template>

<script>
	import Spinner from 'vue-spinner-component/src/Spinner.vue';
	export default {
		name: "edit-department",
		data() {
			return {
				preloader: false,
				department: []
			}
		},
		components: {
            Spinner
		},	
		created() {
			document.title = "Відділ";
			this.getData();
		},
		methods: {
			previewFiles(event) {
				var input = event.target;
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = (e) => {
						this.department.img = e.target.result;
					}
					reader.readAsDataURL(input.files[0]);
					input.parentNode.querySelector('span').innerHTML = input.files[0].name;
				}
			},
			getData() {
				axios.get('/api/department/' + this.$route.params.id)
					.then((response) => {
						this.department = response.data;
					})
			},
			save() {
				this.$validator.validateAll().then((result) => {
					if (!result && this.department.img == '') {
						return;
					} else {
						this.preloader = !this.preloader;
						var form = new FormData;
						form.append('name_department', this.department.name_department);
						form.append('departments_info', this.department.departments_info);
						form.append('img', this.$refs.departmentImage.files[0]);
						axios.post('/api/department/' + this.$route.params.id, form)
							.then((response) => {
								this.preloader = !this.preloader;
								swal("Інформацію успішно збережено", {
									icon: "success",
								});
							})
							.catch((error) => {
								this.preloader = !this.preloader;
								swal({
									icon: "error",
									title: 'Помилка',
								});
							});
					}
				});
			}
		}
	}
</script>

<style scoped>

</style>