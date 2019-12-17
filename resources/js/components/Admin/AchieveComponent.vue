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
                            <input type="file" class="custom-file-input col-6" id="achieveImage" name="achieveImage" ref="achieveImage" @change="previewFiles($event)" accept="image/*" v-validate="'image'">
                            <span class="custom-file-control">Файл не обрано</span>
                        </label>
                        <img v-if="!errors.has('achieveImage')" class="mt-3 w-50" :src="image">
                        <span class="text-danger"
                                v-if="errors.has('achieveImage')">Файл повинен бути зображенням
                        </span>
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
    </div>
</template>
<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {
    name: "achieve",
    components: {
        DatePicker
    },
	data() {
		return {
			showForm: false,
			title: '',
			text: '',
            date: '',
            image: '',
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
		};
	},
	created() {
        document.title = "Досягнення";
		this.getAchieveList();
	},
	methods: {
        previewFiles(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.image = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
                input.parentNode.querySelector('span').innerHTML = input.files[0].name;
            }
        },

		postAchieve() {
			this.$validator.validateAll().then((result) => {
				if (!result) {
					return;
				} else {
					var form = new FormData;
					form.append('title', this.title);
					form.append('text', this.text);
                    form.append('date', this.date);
                    form.append('photo', this.$refs.achieveImage.files[0]);
					axios.post('/api/achieve', form)
						.then((res) => {
							swal("Інформація успішно додана", {
								icon: "success",
								timer: 1000,
								button: false
                            });
							this.achieve.push(res.data);
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
                    axios.delete('/api/achieve/'+id)
                        .then((response) => {
                            this.achieve.splice(index, 1);
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
        }
	}
};
</script>

<style scoped></style>
