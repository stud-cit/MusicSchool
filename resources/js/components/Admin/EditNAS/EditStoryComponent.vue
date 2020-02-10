<template>
    <div class="ml-5">
        <div class="col-12 pb-3 pl-0 comeBack">
            <router-link :to="{ name: 'story' }"><b><i class="fa fa-angle-left" aria-hidden="true"></i> Повернутися до списку</b></router-link>
        </div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row mt-1">
                    <label for="storyName" class="col-sm-2 col-form-label">Назва історії</label>
                    <div class="col-sm-6">
                        <input type="text" name="storyName" class="form-control" v-model="story.title" id="storyName"
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
                        <textarea name="storyInfo" class="form-control" cols="15" rows="6" v-model="story.text" id="storyInfo"
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
                    <div class="col-sm-6">
                        <label class="custom-file w-100">
                            <input type="file" name="storyImage" v-validate="{ 'ext':['jpg', 'jpeg', 'png', 'bmp'] }" class="custom-file-input col-6"
                                   id="storyImage" ref="storyImage" @change="fieldChange" accept=".jpg, .jpeg, .png, .bmp" multiple>
                            <span class="custom-file-control">{{ `Кількість обраних файлів: ${file.length}` }}</span>
                        </label>
                        <div v-for="(item, index) in file" :key="index">
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name}} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
                        </div>
                        <span class="text-danger" v-if="errors.has('storyImage') || imgError">
                            Файл не обрано або невірний формат зображення
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <silentbox-group class="col-3 foto" v-for="(item, index) in story.images" :key="item.images_id">
                        <div class="border fotoGallery">
                            <i class="fa fa-times-circle btn btn-default p-0" @click="delStoryImage(item.images_id, index)"></i>
                            <silentbox-item :src="item.file" class="foto">
                                <img :src="item.file">
                            </silentbox-item>
                            <a :href="item.file" download><i class="fa fa-download"></i></a>
                        </div>
                    </silentbox-group>
                </div>

                <div class="form-group row">
                    <label for="editStoryDate" class="col-sm-2 col-form-label">Рік</label>
                    <div class="col-sm-4">
                        <date-picker v-model="story.date" id="editStoryDate" name="editStoryDate" :editable="false" type="year"
                                     v-validate="{ required: true }"
                                     data-vv-as="Рік"></date-picker><br>

                        <span class="text-danger errors" v-if="errors.has('editStoryDate')">
                                {{ errors.first('editStoryDate') }}
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary my-2 ml-4 w-25" @click="save">Зберегти</button>
            </div>
        </form>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

	export default {
        name: "edit-story",
        components: {
            DatePicker
        },
		data() {
			return {
                file: [],
                story: [],
                imgError: false
			};
		},
		created() {
            document.title = "Історії";
			this.getStoryList();
		},

		methods: {
            validImg() {
                this.imgError = this.file.length == 0 ? true : false
            }, 
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
                this.validImg();
			},

			getStoryList() {
				axios.get('/api/story/'+this.$route.params.id)
					.then((response) => {
                        this.story = response.data;
                        response.data.date = new Date(response.data.date);
					})
			},
			save() {
                this.validImg();
				this.$validator.validateAll().then((result) => {
					if (!result || this.file.length == 0) {
						return;
					} else {
						var form = new FormData;
						for (let i = 0; i < this.file.length; i++) {
							if (this.file[i].valid) {
								form.append('file[]', this.file[i]);
							}
						}
						form.append('title', this.story.title);
						form.append('text', this.story.text);
						form.append('date', this.story.date.getFullYear());
						axios.post('/api/story/' + this.$route.params.id, form)
							.then((response) => {
								this.file = [];
								this.story.images = this.story.images.concat(response.data);
								swal("Інформацію успішно збережено", {
									icon: "success",
								});
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
			delFile(index) {
                this.file.splice(index, 1);
                if (this.file.length == 0) {
                    this.imgError = true
                }
			},
			delStoryImage(id, index) {
                if (this.story.images.length <= 1) {
                    swal({
                        text: "Історія повинна мати хочаб одне зображення",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    return;
                }
                swal({
                    title: "Бажаєте видалити?",
                    text: "Після видалення ви не зможете відновити дане зображення",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.delete('/api/story-images/' + id)
                            .then(() => {
                                this.file.splice(index, 1);
                                swal("Зображення успішно видалено", {
                                    icon: "success",
                                });
                                this.file = [];
                                this.getStoryList();
                            });
                    }
                })
			}
		}
	}
</script>

<style scoped>

</style>