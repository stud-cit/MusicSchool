<template>
    <div class="ml-5">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showFormFoto = !showFormFoto">Додати історію</button>
            </div>
        </div>
        <br>
        <form enctype="multipart/form-data" v-if="showFormFoto">
            <div class="row">
                <div class="form-group row">
                    <label for="storyName" class="col-sm-2 col-form-label">Назва історії</label>
                    <div class="col-sm-5">
                        <input type="text" name="storyName" class="form-control" v-model="nas_name" id="storyName"
                               v-validate="{ required: true }"
                               data-vv-as="Назва історії">
                        <span class="errors text-danger" v-if="errors.has('storyName')">
                            {{ errors.first('storyName') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="storyInfo" class="col-sm-2 col-form-label">Опис історії</label>
                    <div class="col-sm-6">
                        <textarea name="storyInfo" class="form-control" cols="15" rows="6" v-model="nas_info" id="storyInfo"
                                  v-validate="{ required: true}"
                                  data-vv-as="Опис історії">
                        </textarea>
                        <span class="errors text-danger" v-if="errors.has('storyInfo')">
                            {{ errors.first('storyInfo') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="storyImage" class="col-sm-2 col-form-label">Зображення для історії</label>
                    <div class="col-sm-5">
                        <label class="custom-file w-100">
                            <input type="file" name="storyImage" v-validate="'image'" class="custom-file-input col-6"
                                   id="storyImage" ref="storyImage" @change="fieldChange" accept="image/*" multiple>
                            <span class="custom-file-control">{{ `Кількість обраних файлів: ${file.length}` }}</span>
                        </label>
                        <div v-for="(item, index) in file" :key="index">
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name }} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
                            <span class="text-danger"
                                  v-if="errors.has('storyImage')">Файл повинен бути зображенням
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="storyDate" class="col-sm-2 col-form-label">Дата оприлюднення</label>
                    <div class="col-sm-4">
                        <input type="text" name="storyDate" class="form-control col-6" v-model="date" id="storyDate"
                               v-validate="{ required: true}"
                               data-vv-as="Дата оприлюднення">
                        <span class="errors text-danger" v-if="errors.has('storyDate')">
                            {{ errors.first('storyDate') }}
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postStory">Зберегти</button>
            </div>
        </form>
        <hr>
        <table class="table table-bordered accordion" id="accordion">
            <thead>
            <tr>
            </tr>
            </thead>
            <tbody class="card" v-for="(item, index) in object_story.story" :key="item.nas_id">
            <tr>
                <th>
                    {{ item.nas_name }}
                    <div class="m-option float-right">
                        <router-link :to="{ name: 'edit-story', params: {id: item.nas_id} }">
                            <button type="button" class="btn btn-primary float-right ml-2">Редагувати</button>
                        </router-link>
                        <button type="button" class="btn btn-primary float-right" @click="deleteStory(item.nas_id, index)">Видалити</button>
                    </div>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: "story",
	data() {
		return {
			showFormFoto: false,
			nas_name: '',
			nas_info: '',
			date: '',
			file: [],
			object_story: {
				story: [],
				type: 'story'
			}
		};
	},
	created() {
		this.getStoryList();
	},
	methods: {
		fieldChange(){
			let changeFile = this.$refs.storyImage.files;
			for(let i = 0; i < changeFile.length; i++) {
				if(changeFile[i].type == 'image/jpeg' || changeFile[i].type == 'image/png') {
					changeFile[i].valid = true;
				} else {
					changeFile[i].valid = false;
				}
				this.file.push(changeFile[i]);
			}
		},

		postStory() {
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
					axios.post('/api/story', form)
						.then((res) => {
                            this.file = [];
							swal("Інформація спішно додана", {
								icon: "success",
								timer: 1000,
								button: false
							});
							this.object_story.story.push(res.data);
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
		getStoryList() {
			axios.get('/api/story')
				.then((response) => {
					this.object_story.story = response.data;
				})
        },
		deleteStory(id, index) {
            swal({
                title: "Бажаєте видалити?",
                text: "Після видалення ви не зможете відновити даний запис",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete('/api/story/'+id)
                        .then((response) => {
                            this.object_story.story.splice(index, 1);
                            swal("Історія була успішно видалена", {
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
        },
        delFile(index) {
            this.file.splice(index, 1);
        }
	}
};
</script>

<style scoped></style>
