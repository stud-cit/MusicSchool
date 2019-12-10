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
                                <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name }} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
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

                    <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postNews">Зберегти</button>
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
                    <button type="button" class="btn btn-primary float-right" @click="deleteNews(index, item.nas_id)">Видалити</button>
                    </div>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
	export default {
		name: "news",
		data() {
			return {
				showFormFoto: false,
                nas_name: '',
				nas_info: '',
                date: '',
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

			postNews() {
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
						axios.post('/api/news', form)
							.then((res) => {
								this.file = [];
								swal("Інформація спішно додана", {
									icon: "success",
									timer: 1000,
									button: false
								});
								this.object_news.news.push(res.data);
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
			getNewsList() {
				axios.get('/api/news')
					.then((response) => {
						this.object_news.news = response.data;
					})
			},
			deleteNews(index, id) {
                swal({
                    title: "Бажаєте видалити?",
                    text: "Після видалення ви не зможете відновити даний запис",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.delete('/api/news/'+id)
                            .then((response) => {
                                this.object_news.news.splice(index, 1);
                                swal("Новина була успішно видалена", {
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