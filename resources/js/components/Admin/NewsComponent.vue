<template>
    <div class="ml-5">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showForm = !showForm">Додати новину</button>
            </div>
        </div>
        <br>
        <form enctype="multipart/form-data" v-if="showForm">
            <div class="row">
                    <div class="form-group row">
                        <label for="newsName" class="col-sm-2 col-form-label">Назва новини</label>
                        <div class="col-sm-5">
                        <input type="text" name="newsName" class="form-control" v-model="title" id="newsName"
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
                        <textarea name="newsInfo" class="form-control" cols="15" rows="6" v-model="text" id="newsInfo"
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
                        <label for="achieveDate" class="col-sm-2 col-form-label">Дата оприлюднення</label>
                        <div class="input-row">
                            <div class="input-container">
                                <date-picker 
                                    v-model="date" 
                                    value-type="YYYY-MM-DD"
                                    :lang="datepicker.lang"
                                    :editable="false"
                                ></date-picker>
                                <input style="display:none" type="text" name="date" v-model="date" required v-validate="{ regex: /^\d{4}[.\/-]\d{2}[.\/-]\d{2}$/ }">
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postNews">Зберегти</button>
            </div>
        </form>
        <hr>
        <table class="table table-bordered">
			<thead>
				<tr>
					<th width="10px" scope="col">№</th>
					<th scope="col">Заголовок</th>
					<th scope="col">Дата</th>
					<th width="10px" scope="col"></th>
					<th width="10px" scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in news" :key="item.id">
					<th scope="row">{{ index + 1 }}</th>
					<td>{{ item.title }}</td>
					<td>{{ item.date }}</td>
					<td><a style="color:#000" :href="'/admin/news/'+item.id"><i class="fa fa-2x fa-pencil-square btn btn-default p-0"></i></a></td>
					<td><i class="fa fa-2x fa-times-circle btn btn-default p-0" @click="deleteNews(index, item.id)"></i></td>
				</tr>
			</tbody>
		</table>
    </div>
</template>
<script>
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

	export default {
        name: "news",
        components: {
            DatePicker
        },
		data() {
			return {
				showForm: false,
                title: '',
				text: '',
                date: '',
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
			};
		},
		created() {
            document.title = "Новини";
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
						form.append('title', this.title);
						form.append('text', this.text);
						form.append('date', this.date);
						axios.post('/api/news', form)
							.then((res) => {
								this.file = [];
								swal("Інформація спішно додана", {
									icon: "success",
									timer: 1000,
									button: false
								});
								this.news.push(res.data);
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
						this.news = response.data;
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
                                this.news.splice(index, 1);
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