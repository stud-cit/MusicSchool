<template>
    <div class="ml-5">
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row">
                    <label for="storyName" class="col-sm-2 col-form-label">Назва історії</label>
                    <div class="col-sm-5">
                        <input type="text" name="storyName" class="form-control" v-model="object_story.story.nas_name" id="storyName"
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
                        <textarea name="storyInfo" class="form-control" cols="15" rows="6" v-model="object_story.story.nas_info" id="storyInfo"
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
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name}} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
                            <span class="text-danger"
                                  v-if="errors.has('storyImage')">Файл повинен бути зображенням
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <silentbox-group class="col-3" v-for="(item, index) in object_story.story.images" :key="item.images_id">
                        <div class="border newsImage">
                            <div class="circle"><i class="fa fa-times-circle btn btn-default p-0" @click="delStoryImage(item.images_id, index)"></i></div>
                            <div class="news-img" :style="{ backgroundImage: 'url(' + '/story/'+$route.params.id+'/'+item.file + ')'  }"></div>
                            <silentbox-single :src="'/story/'+$route.params.id+'/'+item.file">
                                <i class="fa fa-search"></i>
                            </silentbox-single>
                            <a :href="'/story/'+$route.params.id+'/'+item.file" download><i class="fa fa-download"></i></a>
                        </div>
                    </silentbox-group>
                </div>

                <div class="form-group row">
                    <label for="storyDate" class="col-sm-2 col-form-label">Дата оприлюднення</label>
                    <div class="col-sm-4">
                        <input type="text" name="storyDate" class="form-control col-6" v-model="object_story.story.date" id="storyDate"
                               v-validate="{ required: true}"
                               data-vv-as="Дата оприлюднення">
                        <span class="errors text-danger" v-if="errors.has('storyDate')">
                            {{ errors.first('storyDate') }}
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="save">Зберегти</button>
            </div>
        </form>
    </div>
</template>

<script>
	export default {
		name: "edit-story",
		data() {
			return {
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

			getStoryList() {
				axios.get('/get-story/'+this.$route.params.id)
					.then((response) => {
						this.object_story.story = response.data;
					})
			},
			save() {
				var form = new FormData;
				for(let i = 0; i < this.file.length; i++){
					if(this.file[i].valid) {
						form.append('file[]', this.file[i]);
					}
				}
				form.append('nas_name', this.object_story.story.nas_name);
				form.append('nas_info', this.object_story.story.nas_info);
				form.append('date', this.object_story.story.date);
				axios.post('/update-story/'+this.$route.params.id, form)
					.then((response) => {
						this.file = [];
						this.object_story.story.images = this.object_story.story.images.concat(response.data);
					})
			},
			delFile(index) {
				this.file.splice(index, 1);
			},
			delStoryImage(id, index) {
				if(id) {
					axios.post('/delete-story-images/' + id)
						.then(() => {
							this.file.splice(index, 1);
							swal("Зображення успішно видалено", {
								icon: "success",
							});
							this.file = [];
							this.getStoryList();
						});
				}
			}
		}
	}
</script>

<style scoped>
    .uploadFiles {
        border: 1px solid silver;
        width: 100%;
        margin-top: 10px;
        padding: 10px 15px;
        border-radius: 5px;
    }
    .uploadFiles i {
        position: absolute;
        right: 10px;
    }
    .newsImage{
        height: auto
    }
    .newsImage .fa-calendar{
        position: static
    }
    .newsImage .width-100{
        width: calc(100% - 30px);
    }
    .news-img{
        background-size: cover;
        margin-bottom: 10px;
        height: 100px;
    }
</style>