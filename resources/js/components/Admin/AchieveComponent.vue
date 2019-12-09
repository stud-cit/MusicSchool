<template>
    <div class="ml-5">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showFormFoto = !showFormFoto">Додати досягнення</button>
            </div>
        </div>
        <br>
        <form enctype="multipart/form-data" v-if="showFormFoto">
            <div class="row">
                <div class="form-group row">
                    <label for="achieveName" class="col-sm-2 col-form-label">Назва досягнення</label>
                    <div class="col-sm-5">
                        <input type="text" name="achieveName" class="form-control" v-model="nas_name" id="achieveName"
                               v-validate="{ required: true }"
                               data-vv-as="Назва досягнення">
                        <span class="errors text-danger" v-if="errors.has('achieveName')">
                            {{ errors.first('achieveName') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="achieveInfo" class="col-sm-2 col-form-label">Опис досягнення</label>
                    <div class="col-sm-6">
                        <textarea name="achieveInfo" class="form-control" cols="15" rows="6" v-model="nas_info" id="achieveInfo"
                                  v-validate="{ required: true}"
                                  data-vv-as="Опис досягнення">
                        </textarea>
                        <span class="errors text-danger" v-if="errors.has('achieveInfo')">
                            {{ errors.first('achieveInfo') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="achieveImage" class="col-sm-2 col-form-label">Зображення для досягнення</label>
                    <div class="col-sm-5">
                        <label class="custom-file w-100">
                            <input type="file" name="achieveImage" v-validate="'image'" class="custom-file-input col-6"
                                   id="achieveImage" ref="achieveImage" @change="fieldChange" accept="image/*" multiple>
                            <span class="custom-file-control">{{ `Кількість обраних файлів: ${file.length}` }}</span>
                        </label>
                        <div v-for="(item, index) in file" :key="index">
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name }}</div>
                            <span class="text-danger"
                                  v-if="errors.has('achieveImage')">Файл повинен бути зображенням
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="achieveDate" class="col-sm-2 col-form-label">Дата оприлюднення</label>
                    <div class="col-sm-4">
                        <input type="text" name="achieveDate" class="form-control col-6" v-model="date" id="achieveDate"
                               v-validate="{ required: true}"
                               data-vv-as="Дата оприлюднення">
                        <span class="errors text-danger" v-if="errors.has('achieveDate')">
                            {{ errors.first('achieveDate') }}
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postAchieve">Зберегти</button>
            </div>
        </form>
        <hr>
        <table class="table table-bordered accordion" id="accordion">
            <thead>
            <tr>
            </tr>
            </thead>
            <tbody class="card" v-for="(item, index) in object_achieve.achieve" :key="item.nas_id">
            <tr>
                <th>
                    {{ item.nas_name }}
                    <div class="m-option float-right">
                        <router-link :to="{ name: 'edit-achieve', params: {id: item.nas_id} }">
                            <button type="button" class="btn btn-primary float-right ml-2">Редагувати</button>
                        </router-link>
                        <button type="button" class="btn btn-primary float-right" @click="deleteAchieve(index, item.nas_id)">Видалити</button>
                    </div>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: "achieve",
	data() {
		return {
			showFormFoto: false,
			nas_name: '',
			nas_info: '',
			date: '',
			file: [],
			object_achieve: {
				achieve: [],
				type: 'achieve'
			}
		};
	},
	created() {
		this.getAchieveList();
	},
	methods: {
		fieldChange(){
			let changeFile = this.$refs.achieveImage.files;
			for(let i = 0; i < changeFile.length; i++) {
				if(changeFile[i].type == 'image/jpeg' || changeFile[i].type == 'image/png') {
					changeFile[i].valid = true;
				} else {
					changeFile[i].valid = false;
				}
				this.file.push(changeFile[i]);
			}
		},

		postAchieve() {
			this.$validator.validateAll().then((result) => {
				if (!result) {
					return;
				} else {
					var form = new FormData;
					this.load = true;
					for(let i = 0; i < this.file.length; i++){
						if(this.file[i].valid) {
							form.append('file[]', this.file[i]);
						}
					}
					form.append('nas_name', this.nas_name);
					form.append('nas_info', this.nas_info);
					form.append('date', this.date);
					axios.post('/post-achieve', form)
						.then((res) => {
							this.file = [];
							swal("Інформація спішно додана", {
								icon: "success",
								timer: 1000,
								button: false
							});
							this.object_achieve.achieve.push(res.data);
						})
						.catch((error) => {
							swal({
								icon: "error",
								title: 'Помилка',
							});
						});
				}
			});
		},
		getAchieveList() {
			axios.get('/get-achieve')
				.then((response) => {
					this.object_achieve.achieve.push(...response.data)
				})
		},
		deleteAchieve(index, id) {
			if(id) {
				axios.post('/delete-achieve/'+id);
			}
		},
	}
};
</script>

<style scoped></style>
