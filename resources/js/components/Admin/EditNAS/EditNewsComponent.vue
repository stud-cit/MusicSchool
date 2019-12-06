<template>
    <div class="ml-5">
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row">
                    <label for="newsName" class="col-sm-2 col-form-label">Назва новини</label>
                    <div class="col-sm-5">
                        <input type="text" name="newsName" class="form-control" v-model="object_news.news.nas_name" id="newsName"
                               v-validate="{ required: true }"
                               data-vv-as="Назва новини">
                        <span class="errors text-danger" v-if="errors.has('newsName')">
                            {{ errors.first('newsName') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="newsInfo" class="col-sm-2 col-form-label">Опис новини</label>
                    <div class="col-sm-6">
                        <textarea name="newsInfo" class="form-control" cols="15" rows="6" v-model="object_news.news.nas_info" id="newsInfo"
                                  v-validate="{ required: true}"
                                  data-vv-as="Опис новини">
                        </textarea>
                        <span class="errors text-danger" v-if="errors.has('newsInfo')">
                            {{ errors.first('newsInfo') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="newsImage" class="col-sm-2 col-form-label">Зображення для новини</label>
                    <div class="col-sm-5">
                        <label class="custom-file w-100">
                            <input type="file" name="newsImage" v-validate="'image'" class="custom-file-input col-6"
                                   id="newsImage" ref="newsImage" @change="fieldChange" accept="image/*" multiple>
                            <span class="custom-file-control">{{ `Кількість обраних файлів: ${file.length}` }}</span>
                        </label>
                        <div v-for="(item, index) in file" :key="index">
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name}} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
                            <span class="text-danger"
                                  v-if="errors.has('newsImage')">Файл повинен бути зображенням
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <silentbox-group class="col-3" v-for="(item, index) in object_news.news.images" :key="item.images_id">
                        <div class="border newsImage">
                            <div class="circle"><i class="fa fa-times-circle btn btn-default p-0" @click="delNewsImage(item.images_id, index)"></i></div>
                            <div class="news-img" :style="{ backgroundImage: 'url(' + '/news/'+$route.params.id+'/'+item.file + ')'  }"></div>
                            <silentbox-single :src="'/news/'+$route.params.id+'/'+item.file">
                                <i class="fa fa-search"></i>
                            </silentbox-single>
                            <a :href="'/news/'+$route.params.id+'/'+item.file" download><i class="fa fa-download"></i></a>
                        </div>
                    </silentbox-group>
                </div>

                <div class="form-group row">
                    <label for="newsDate" class="col-sm-2 col-form-label">Дата оприлюднення</label>
                    <div class="col-sm-4">
                        <input type="text" name="newsDate" class="form-control col-6" v-model="object_news.news.date" id="newsDate"
                               v-validate="{ required: true}"
                               data-vv-as="Дата оприлюднення">
                        <span class="errors text-danger" v-if="errors.has('newsDate')">
                            {{ errors.first('newsDate') }}
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
		name: "edit-news",
		data() {
			return {
				file: [],
				object_news: {
					news: [],
					type: 'news'
				}
			};
		},
		created() {
			this.getNewsList();
		},

		methods: {
			fieldChange(){
				let changeFile = this.$refs.newsImage.files;
				for(let i = 0; i < changeFile.length; i++) {
					if(changeFile[i].type == 'image/jpeg' || changeFile[i].type == 'image/png') {
						changeFile[i].valid = true;
					} else {
						changeFile[i].valid = false;
					}
					this.file.push(changeFile[i]);
				}
			},

			getNewsList() {
				axios.get('/get-news/'+this.$route.params.id)
					.then((response) => {
                        this.object_news.news = response.data;
                    })
            },
			save() {
                var form = new FormData;
                for(let i = 0; i < this.file.length; i++){
                    if(this.file[i].valid) {
                        form.append('file[]', this.file[i]);
                    }
                }
                form.append('nas_name', this.object_news.news.nas_name);
                form.append('nas_info', this.object_news.news.nas_info);
                form.append('date', this.object_news.news.date);
				axios.post('/update-news/'+this.$route.params.id, form)
                .then((response) => {
                    this.file = [];
                    this.object_news.news.images = this.object_news.news.images.concat(response.data);
                })
			},
			delFile(index) {
				this.file.splice(index, 1);
			},
			delNewsImage(id, index) {
				if(id) {
					axios.post('/delete-news-images/' + id)
						.then(() => {
							this.file.splice(index, 1);
							swal("Зображення успішно видалено", {
								icon: "success",
							});
							this.file = [];
							this.getNewsList();
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