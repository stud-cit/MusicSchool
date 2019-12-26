<template>
    <div class="ml-5">
        <div class="col-12 pb-3 pl-0 comeBack">
            <router-link :to="{ name: 'news' }"><b><i class="fa fa-angle-left" aria-hidden="true"></i> Повернутися до списку</b></router-link>
        </div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row mt-1">
                    <label for="newsName" class="col-sm-2 col-form-label">Назва новини</label>
                    <div class="col-sm-6">
                        <input type="text" name="newsName" class="form-control" v-model="news.title" id="newsName"
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
                        <textarea name="newsInfo" class="form-control" cols="15" rows="6" v-model="news.text" id="newsInfo"
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
                    <div class="col-sm-6">
                        <label class="custom-file w-100">
                            <input type="file" name="newsImage" v-validate="'image'" class="custom-file-input col-6"
                                   id="newsImage" ref="newsImage" @change="fieldChange" accept="image/*" multiple>
                            <span class="custom-file-control">{{ `Кількість обраних файлів: ${file.length}` }}</span>
                        </label>
                        <div v-for="(item, index) in file" :key="index">
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name}} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
                        </div>
                        <span class="text-danger" v-if="errors.has('newsImage') || imgError">
                            Файл не обрано або невірний формат зображення
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <silentbox-group class="col-3 foto" v-for="(item, index) in news.images" :key="item.images_id">
                        <div class="border fotoGallery">
                            <i class="fa fa-times-circle btn btn-default p-0" @click="delNewsImage(item.images_id, index)"></i>
                            <silentbox-item :src="item.file" class="foto">
                                <img :src="item.file">
                            </silentbox-item>
                            <a :href="item.file" download><i class="fa fa-download"></i></a>
                        </div>
                    </silentbox-group>
                </div>

                    <div class="form-group row">
                        <label for="achieveDate" class="col-sm-2 col-form-label">Дата оприлюднення</label>
                        <div class="input-row">
                            <div class="input-container">
                                <date-picker 
                                    v-model="news.date"
                                    name="editNewsDate"
                                    value-type="YYYY-MM-DD"
                                    :lang="datepicker.lang"
                                    :editable="false"
                                    v-validate="{ required: true }"
                                    data-vv-as="Дата оприлюднення"
                                ></date-picker><br>
                                <span class="text-danger errors" v-if="errors.has('editNewsDate')">
                                    {{ errors.first('editNewsDate') }}
                                </span>
                                <input style="display:none" type="text" name="date" v-model="news.date" required v-validate="{ regex: /^\d{4}[.\/-]\d{2}[.\/-]\d{2}$/ }">
                            </div>
                        </div>
                    </div>

                <button type="button" id="overWritePhoto" class="btn btn-outline-secondary my-2 ml-4 w-25" @click="save">Зберегти</button>
            </div>
        </form>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

	export default {
        name: "edit-news",
        components: {
            DatePicker
        },
		data() {
			return {
				file: [],
                news: [],
                datepicker: {
                    lang: {
                        formatLocale: {
                            months: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
                            monthsShort: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
                            weekdays: ["Неділя", "Понеділок", "Вівторок", "Середа", "Четвер", "П'ятниця", "Субота"],
                            weekdaysShort: ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'НД'],
                            weekdaysMin: ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'НД']
                        }
                    }
                },
				imgError: false
			};
		},
		created() {
            document.title = "Новини";
			this.getNewsList();
		},

		methods: {
			validImg() {
				this.imgError = this.file.length == 0 ? true : false
			},
			fieldChange(){
				let changeFile = this.$refs.newsImage.files;
				for(let i = 0; i < changeFile.length; i++) {
					if(changeFile[i].type == 'image/jpeg' || changeFile[i].type == 'image/png') {
						changeFile[i].valid = true;
					}
					else {
						changeFile[i].valid = false;
					}
					this.file.push(changeFile[i]);
				}
				this.validImg();
			},

			getNewsList() {
				axios.get('/api/news/'+this.$route.params.id)
					.then((response) => {
                        this.news = response.data;
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
							/*
							if (this.file.length < 4){
								this.file[i].valid = true;
                            }
							else {
								swal({
									icon: "error",
									title: 'Кількість фото не може бути більше трьох',
								});
                            }
                            */
							if (this.file[i].valid) {
								form.append('file[]', this.file[i]);
							}
						}
						form.append('title', this.news.title);
						form.append('text', this.news.text);
						form.append('date', this.news.date);
							axios.post('/api/news/' + this.$route.params.id, form)
								.then((response) => {
									this.news.images = this.news.images.concat(response.data);
									if(this.file.length < 4) {
										swal("Інформацію успішно збережено", {
											icon: "success",
											timer: 1000,
											button: false
										});
										this.file = [];
									}
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
			delNewsImage(id, index) {
				if(id) {
					axios.delete('/api/news-images/' + id)
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

</style>