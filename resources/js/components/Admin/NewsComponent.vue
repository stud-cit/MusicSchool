<template>
    <div class="ml-5">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showFormFoto = !showFormFoto">Додати новину</button>
            </div>
        </div>
        <br>
        <form enctype="multipart/form-data" v-if="showFormFoto">
            <div class="row">
                    <div class="form-group row">
                        <label for="newsName" class="col-sm-2 col-form-label">Назва новини</label>
                        <div class="col-sm-5">
                        <input type="text" name="newsName" class="form-control" v-model="nas_name" id="newsName"
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
                        <textarea name="newsInfo" class="form-control" cols="15" rows="6" v-model="nas_info" id="newsInfo"
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
                                <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name }}</div>
                                <span class="text-danger"
                                    v-if="errors.has('newsImage')">Файл повинен бути зображенням
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newsDate" class="col-sm-2 col-form-label">Дата оприлюднення</label>
                            <div class="col-sm-4">
                                <input type="text" name="newsDate" class="form-control col-6" v-model="date" id="newsDate"
                                        v-validate="{ required: true}"
                                        data-vv-as="Дата оприлюднення">
                                <span class="errors text-danger" v-if="errors.has('newsImage')">
                                        {{ errors.first('newsDate') }}
                                </span>
                            </div>
                    </div>

                    <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="">Зберегти</button>
            </div>
        </form>
        <hr>
        <table class="table table-bordered accordion" id="accordion">
            <thead>
                <tr>
                </tr>
            </thead>
            <tbody class="card" v-for="(item, index) in object_news.news" :key="item.nas_id">
            <tr>
                <th>
                    {{ item.nas_name }}
                    <div class="m-option float-right">
                    <router-link :to="{ name: 'edit-news', params: {id: item.nas_id} }">
                        <button type="button" class="btn btn-primary float-right ml-2">Редагувати</button>
                    </router-link>
                    <button type="button" class="btn btn-primary float-right" @click="deleteAdminOrgCommittee(item.user_id, index)">Видалити</button>
                    </div>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</template>
                        <!--
                        <div class="col-5 mt-4">
                            <button type="button" class="btn btn-outline-secondary float-left mr-2" @click="del(index, news.nas_id, 'news')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <button v-if="news !== editing && news.disabled != false" type="button" class="btn btn-outline-secondary float-left" @click='editNews(news, "news", index)'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            <button v-else type="button" class="btn btn-outline-secondary float-left" @click='saveNews("news", index)'><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                        </div>
                        -->
<script>
	export default {
		name: "news",
		data() {
			return {
				showFormFoto: false,
                nas_name: '',
				nas_info: '',
                date: '',
				photo: [],
				file: [],
				object_news: {
					news: [],
					type: 'news'
				},
				form: new FormData
			};
		},
		created() {
			this.getNewsList();
			this.getNewsImage();
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
				console.log(this.file)
			},

			postNews(el, index) {
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
						axios.post('/post-news-image', form)
							.then((res) => {
								this.file = [];
							})
						axios.post('/post-news', {
							nas_id: this.object_news.news[index].nas_id,
							nas_name: this.object_news.news[index].nas_name,
							nas_info: this.object_news.news[index].nas_info,
							date: this.object_news.news[index].date,
							//file: this.object_news.news[index].file,
						}).then((res) => {
							//this.object_news.news[index].nas_id = res.data.nas_id;
							//this.object_news.news[index].images_id = res.data.images_id;
							swal("Інформація додана", {
								icon: "success",
								timer: 1000,
								button: false
							});
						}).catch((error) => {
							swal({
								icon: "error",
								title: 'Помилка',
							});
						});
					}
				});
			},
			getNewsList() {
				axios.get('/get-news')
					.then((response) => {
						this.object_news.news.push(...response.data)
					})
			},
			getNewsImage() {
				axios.get('/get-news-image')
					.then((response) => {
						this.photo = response.data;
					})
			},
			del(index, id, arr) {
				if(id) {
					axios.post('/delete-news/'+id);
				}
				this.object_news[arr].splice(index, 1);
			},
		}
	};
</script>

<style scoped></style>