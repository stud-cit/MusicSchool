<template>
    <div class="ml-5">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showForm = !showForm">Додати досягнення</button>
            </div>
        </div>
        <form enctype="multipart/form-data" v-if="showForm">
            <div class="row">
                <div class="form-group row">
                    <label for="achieveName" class="col-sm-2 col-form-label">Назва досягнення</label>
                    <div class="col-sm-6">
                        <input type="text" name="achieveName" class="form-control" v-model="title" id="achieveName"
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
                        <textarea name="achieveInfo" class="form-control" cols="15" rows="6" v-model="text" id="achieveInfo"
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
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name }} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
                        </div>
                        <span class="text-danger" v-if="errors.has('achieveImage') || imgError">
                            Файл не обрано або невірний формат зображення
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="achieveDate" class="col-sm-2 col-form-label">Дата оприлюднення</label>
                    <div class="col-sm-6">
                        <div class="input-container">
                            <date-picker
                                v-model="date"
                                name="achieveDate"
                                value-type="YYYY-MM-DD"
                                :lang="datepicker.lang"
                                :editable="false"
                                v-validate="{ required: true }"
                                data-vv-as="Дата оприлюднення"
                            ></date-picker><br>
                            <span class="text-danger errors" v-if="errors.has('achieveDate')">
                                    {{ errors.first('achieveDate') }}
                            </span>
                            <input style="display:none" type="text" name="date" v-model="date" v-validate="{ regex: /^\d{4}[.\/-]\d{2}[.\/-]\d{2}$/ }">
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postAchieve">Зберегти</button>
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
				<tr v-for="(item, index) in achieve" :key="item.id">
					<th scope="row">{{ index + 1 }}</th>
					<td>{{ item.title }}</td>
					<td>{{ item.date }}</td>
					<td><a style="color:#000" :href="'/admin/achieve/'+item.id"><i class="fa fa-2x fa-pencil-square btn btn-default p-0"></i></a></td>
					<td><i class="fa fa-2x fa-times-circle btn btn-default p-0" @click="deleteAchieve(index, item.id)"></i></td>
				</tr>
			</tbody>
		</table>
        <div v-if="preloader" class="preloader">
            <Spinner :status="preloader" :size="54"></Spinner>
        </div>
    </div>
</template>
<script>
import Spinner from 'vue-spinner-component/src/Spinner.vue';
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {
    name: "achieve",
    components: {
        Spinner,
        DatePicker
    },
	data() {
		return {
			showForm: false,
			title: '',
			text: '',
            date: '',
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
            preloader: false,
            imgError: false
		};
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
                } else {
                    changeFile[i].valid = false;
                }
                this.file.push(changeFile[i]);
            }
            this.validImg();
        },

        postAchieve() {
            this.validImg();
            this.$validator.validateAll().then((result) => {
                if (!result || this.file.length == 0) {
                    return;
                } else {
                    this.preloader = !this.preloader;
                    var form = new FormData;
                    for(let i = 0; i < this.file.length; i++){
                        if(this.file[i].valid) {
                            form.append('file[]', this.file[i]);
                        }
                    }
                    form.append('title', this.title);
                    form.append('text', this.text);
                    form.append('date', this.date);
                    axios.post('/api/achieve', form)
                        .then((res) => {
                            this.preloader = !this.preloader;
                            swal("Інформація спішно додана", {
                                icon: "success",
                                timer: 1000,
                                button: false
                            });
                            this.achieve.push(res.data);
                            this.file = [];
                        })
                        .catch((error) => {
                            this.preloader = !this.preloader;
                            swal({
                                icon: "error",
                                title: 'Помилка',
                            });
                        });
                }
            });
        },

		getAchieveList() {
			axios.get('/api/achieve')
				.then((response) => {
					this.achieve = response.data;
				})
        },
        deleteAchieve(index, id) {
            swal({
                title: "Бажаєте видалити?",
                text: "Після видалення ви не зможете відновити даний запис",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    this.preloader = !this.preloader;
                    axios.delete('/api/achieve/'+id)
                        .then((response) => {
                            this.preloader = !this.preloader;
                            this.achieve.splice(index, 1);
                            swal("Зпис був успішно видалений", {
                                icon: "success",
                            });
                        })
                        .catch((error) => {
                            this.preloader = !this.preloader;
                            swal({
                                icon: "error",
                                title: 'Помилка',
                                text: 'Не вдалося'
                            });
                        });
                }
            })
        }
	}
};
</script>

<style scoped></style>
