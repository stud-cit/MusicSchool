<template>
    <div class="ml-5">
        <div class="col-12 pb-3 pl-0 comeBack">
            <router-link :to="{ name: 'achieve' }"><b><i class="fa fa-angle-left" aria-hidden="true"></i> Повернутися до списку</b></router-link>
        </div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row">
                    <label for="achieveName" class="col-sm-2 col-form-label">Назва досягнення</label>
                    <div class="col-sm-6">
                        <input type="text" name="achieveName" class="form-control" v-model="achieve.title" id="achieveName"
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
                        <textarea name="achieveInfo" class="form-control" cols="15" rows="6" v-model="achieve.text" id="achieveInfo"
                                  v-validate="{ required: true}"
                                  data-vv-as="Опис досягнення">
                        </textarea>
                        <span class="errors text-danger" v-if="errors.has('achieveInfo')">
                            {{ errors.first('achieveInfo') }}
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="achieveImage" class="col-sm-2 col-form-label">Зображення</label>
                    <div class="col-sm-6">
                        <label class="custom-file w-100">
                            <input type="file" name="achieveImage" v-validate="{ 'ext':['jpg', 'jpeg', 'png', 'bmp'] }" class="custom-file-input col-6"
                                   id="achieveImage" ref="achieveImage" @change="fieldChange" accept=".jpg, .jpeg, .png, .bmp" multiple>
                            <span class="custom-file-control">{{ `Кількість обраних файлів: ${file.length}` }}</span>
                        </label>
                        <div v-for="(item, index) in file" :key="index">
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name}} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
                        </div>
                        <span class="text-danger" v-if="errors.has('achieveImage') || imgError">
                            Файл не обрано або невірний формат зображення
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <silentbox-group class="col-3 foto" v-for="(item, index) in achieve.images" :key="item.images_id">
                        <div class="border fotoGallery">
                            <i class="fa fa-times-circle btn btn-default p-0" @click="delAchieveImage(item.images_id, index)"></i>
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
                                v-model="achieve.date"
                                name="editAchieveDate"
                                value-type="YYYY-MM-DD"
                                :lang="datepicker.lang"
                                :editable="false"
                                v-validate="{ required: true }"
                                data-vv-as="Дата оприлюднення"
                            ></date-picker><br>
                            <span class="text-danger errors" v-if="errors.has('editAchieveDate')">
                                    {{ errors.first('editAchieveDate') }}
                            </span>
                            <input style="display:none" type="text" name="date" v-model="achieve.date" required v-validate="{ regex: /^\d{4}[.\/-]\d{2}[.\/-]\d{2}$/ }">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="save">Зберегти</button>
            </div>
        </form>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

	export default {
		name: "edit-achieve",
		components: {
			DatePicker
		},
		data() {
			return {
                file: [],
				achieve: [],
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
			}
		},
		created() {
			document.title = "Досягнення";
			this.getAchieveList();
		},
		methods: {
			validImg() {
				this.imgError = this.file.length == 0 ? true : false
			},
			fieldChange(){
				let changeFile = this.$refs.achieveImage.files;
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
			previewFiles(event) {
				var input = event.target;
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = (e) => {
						this.achieve.photo = e.target.result;
					}
					reader.readAsDataURL(input.files[0]);
					input.parentNode.querySelector('span').innerHTML = input.files[0].name;
				}
			},
			getAchieveList() {
				axios.get('/api/achieve/' + this.$route.params.id)
					.then((response) => {
						this.achieve = response.data;
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
						form.append('title', this.achieve.title);
						form.append('text', this.achieve.text);
						form.append('date', this.achieve.date);
                        axios.post('/api/achieve/' + this.$route.params.id, form)
                            .then((response) => {
                                this.file = [];
                                this.achieve.images = this.achieve.images.concat(response.data);
                                    swal("Інформацію успішно збережено", {
                                        icon: "success",
                                        timer: 1000,
                                        button: false
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
			delAchieveImage(id, index) {
				if(id) {
					axios.delete('/api/achieve-images/' + id)
						.then(() => {
							this.file.splice(index, 1);
							swal("Зображення успішно видалено", {
								icon: "success",
							});
							this.file = [];
							this.getAchieveList();
						});
				}
			}
		}
	}
</script>

<style scoped>

</style>
