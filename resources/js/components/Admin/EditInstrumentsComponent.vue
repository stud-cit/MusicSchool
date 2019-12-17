<template>
    <div class="ml-5">
        <div class="col-12 pb-3 pl-0 comeBack">
            <router-link :to="{ name: 'instrument' }"><b><i class="fa fa-angle-left" aria-hidden="true"></i> Повернутися до списку</b></router-link>
        </div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="form-group row">
                    <label for="name_instruments" class="col-sm-2 col-form-label">Інструмент</label>
                    <div class="col-sm-6">
                        <input type="text" name="name_instruments" v-model="instrument.name_instruments" class="form-control" id="name_instruments"
                            v-validate="{ required: true }"
                                data-vv-as="Інструмент">
                        <span class="errors text-danger" v-if="errors.has('name_instruments')">
                                {{ errors.first('name_instruments') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="instruments_info" class="col-sm-2 col-form-label">Інформація про інструмент</label>
                    <div class="col-sm-6">
                        <textarea name="instruments_info" v-model="instrument.instruments_info" class="form-control" id="instruments_info" rows="5"
                            v-validate="{ required: true }"
                                data-vv-as="Інформація про інструмент"></textarea>
                        <span class="errors text-danger" v-if="errors.has('instruments_info')">
                                {{ errors.first('instruments_info') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="department" class="col-sm-2 col-form-label">Відділ</label>
                    <div class="col-sm-6">
                        <select class="form-control" v-model="instrument.departments_id" id="department" name="department"
                                v-validate="{ required: true }">
                            <option v-for="option in department" :key="option.departments_id" :value="option.departments_id">
                                {{ option.name_department }}
                            </option>
                        </select>
						<span class="errors text-danger" v-if="errors.has('departments_id')">
                                Оберіть один з відділів
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="instrumentImage" class="col-sm-2 col-form-label">Фото інструменту</label>
                    <div class="col-sm-6">
						<label class="custom-file w-100">
							<input type="file" class="custom-file-input col-6" id="instrumentImage" name="instrumentImage" ref="instrumentImage" @change="previewFiles($event)" accept="image/*" v-validate="'image'">
							<span class="custom-file-control">Файл не обрано</span>
						</label>
						<img v-if="!errors.has('instrumentImage')" class="mt-3 w-50" :src="instrument.photo">
                        <span class="text-danger"
                            v-if="errors.has('instrumentImage')">Файл повинен бути зображенням
                        </span>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-secondary my-2 ml-4 w-25" @click="save">Зберегти</button>
            </div>
        </form>
    </div>
</template>

<script>
	export default {
		name: "EditInstruments",
		data() {
			return {
				instrument: [],
				department: []
			};
		},
		created () {
            document.title = "Інструменти";
			this.getInstrumentsId();
            this.getDepartments();
		},
		methods: {
            previewFiles(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.instrument.photo = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                    input.parentNode.querySelector('span').innerHTML = input.files[0].name;
                }
            },
			getDepartments() {
				axios.get('/api/department')
					.then((response) => {
						this.department = response.data;
					})
			},
			getInstrumentsId() {
				axios.get('/api/instrument/'+this.$route.params.id)
					.then((response) => {
                        this.instrument = response.data;
					})
			},
			save() {
				var form = new FormData;
				form.append('name_instruments', this.instrument.name_instruments);
				form.append('instruments_info', this.instrument.instruments_info);
				form.append('departments_id', this.instrument.departments_id);
				form.append('photo', this.$refs.instrumentImage.files[0]);
				axios.post('/api/instrument/'+this.$route.params.id, form)
					.then((response) => {
						swal("Інформація оновлена", {
							icon: "success",
							timer: 1000,
							button: false
						});
					})
					.catch((error) => {
						swal({
							icon: "error",
							title: 'Помилка',
							text: 'Поля: "Назва відділу, Інформація про відділ" повинні бути заповнені'
						});
					});
			},
		}
	}
</script>

<style scoped>

</style>