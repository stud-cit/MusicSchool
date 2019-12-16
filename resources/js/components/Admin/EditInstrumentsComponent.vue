<template>
    <form enctype="multipart/form-data">
    <div class="row">
        <div class="col-5">
            <div>
                <label for="name_instruments" class="brtop">Назва інструменту</label>
                <input type="text" name="name_instruments" v-model="instrument.name_instruments" class="form-control" id="name_instruments"
                       v-validate="{ required: true }"
                       data-vv-as="Назва інструменту">
                <span class="errors text-danger" v-if="errors.has('name_instruments')">
                    {{ errors.first('name_instruments') }}
                </span>
            </div>
            <div>
                <label for="instruments_info" class="brtop">Інформація про інструмент</label>
                <textarea name="instruments_info" v-model="instrument.instruments_info" class="form-control" id="instruments_info" rows="5"
                          v-validate="{ required: true }"
                          data-vv-as="Інформація про інструмент"></textarea>
                <span class="errors text-danger" v-if="errors.has('instruments_info')">
                    {{ errors.first('instruments_info') }}
                </span>
            </div>
            <button type="button" class="btn btn-outline-secondary mt-5 w-75" @click="save">Зберегти</button>
        </div>
        <div class="col-5 ml-5">
            <div>
                <label for="departments_id" class="brtop">Назва відділу</label>
                <select class="form-control" style="width: 80%" v-model="department.departments_id" id="departments_id" name="departments_id"
                        v-validate="{ required: true }">
                    <option v-for="option in department" :key="option.departments_id" v-bind:value="option.departments_id">
                        {{ option.name_department }}
                    </option>
                </select>
            </div>
            <div>
                <label for="photo" class="brtop">Фото інструменту</label>
                <input type="file" name="photo" accept="image/*" ref="file" class="form-control-file" id="photo"
                       v-validate="'image'"
                       data-vv-as="Фото інструменту">
                <span class="errors text-danger" v-if="errors.has('photo')">
                    Файл повинен бути зображенням
                </span>
            </div>

            <div>
                <silentbox-group class="foto mt-4">
                    <div class="border fotoGallery">
                        <silentbox-item :src="'instrument.photo'" class="foto">
                            <img :src="instrument.photo">
                        </silentbox-item>
                        <a :href="instrument.photo" download><i class="fa fa-download"></i></a>
                    </div>
                </silentbox-group>
            </div>
        </div>
    </div>
    </form>
</template>

<script>
	export default {
		name: "EditInstruments",
		data() {
			return {
				instrument: [],
				department: [],
				name_instruments: '',
				instruments_info: '',
				form: new FormData
			};
		},
		created () {
			this.getInstrumentsId();
			this.getDepartmentsId();
		},
		methods: {
			getDepartmentsId() {
				axios.get('/api/department')
					.then((response) => {
						this.department = response.data
						console.log(this.department)
					})
			},
			getInstrumentsId() {
				axios.get('/api/back-instruments/'+this.$route.params.id)
					.then((response) => {
						this.instrument = response.data
						console.log(this.instrument)
					})
			},
			save() {
				const selects = document.querySelectorAll('select');
				const valOptions = [];
				for (let index = 0; index < selects.length; index++) {
					valOptions.push(" "+selects[index].value);
				}
				this.form.append('name_instruments', this.instrument.name_instruments);
				this.form.append('instruments_info', this.instrument.instruments_info);
				this.form.append('departments_id', valOptions);
				this.form.append('photo', this.$refs.file.files[0]);

				axios.post('/api/update-instrument/'+this.$route.params.id, this.form)
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