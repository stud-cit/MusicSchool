<template>
    <div class="ml-5">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <button type="button" class="btn btn-primary float-left" @click="showForm = !showForm">Додати історію</button>
            </div>
        </div>
        <br>
        <form enctype="multipart/form-data" v-if="showForm">
            <div class="row">
                <div class="form-group row">
                    <label for="storyName" class="col-sm-2 col-form-label">Назва історії</label>
                    <div class="col-sm-6">
                        <input type="text" name="storyName" class="form-control" v-model="title" id="storyName"
                               v-validate="{ required: true }"
                               data-vv-as="Назва історії">
                        <span class="errors text-danger" v-if="errors.has('storyName')">
                            {{ errors.first('storyName') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="storyInfo" class="col-sm-2 col-form-label">Опис історії</label>
                    <div class="col-sm-6">
                        <textarea name="storyInfo" class="form-control" cols="15" rows="6" v-model="text" id="storyInfo"
                                  v-validate="{ required: true}"
                                  data-vv-as="Опис історії">
                        </textarea>
                        <span class="errors text-danger" v-if="errors.has('storyInfo')">
                            {{ errors.first('storyInfo') }}
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="storyImage" class="col-sm-2 col-form-label">Зображення для історії</label>
                    <div class="col-sm-6">
                        <label class="custom-file w-100">
                            <input type="file" name="storyImage" v-validate="'image'" class="custom-file-input col-6"
                                   id="storyImage" ref="storyImage" @change="fieldChange" accept="image/*" multiple required>
                            <span class="custom-file-control">{{ `Кількість обраних файлів: ${file.length}` }}</span>
                        </label>
                        <div v-for="(item, index) in file" :key="index">
                            <div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{item.name }} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="delFile(index)"></i></div>
                            <span class="text-danger"
                                  v-if="errors.has('storyImage')">Файл повинен бути зображенням
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="storyDate" class="col-sm-2 col-form-label">Рік</label>
                    <div class="col-sm-4">
                        <date-picker v-model="date" id="storyDate" name="storyDate" :editable="false" type="year" 
                            v-validate="{ required: true }"
                               data-vv-as="Рік"></date-picker><br>

                        <span class="text-danger errors" v-if="errors.has('storyDate')">
                                {{ errors.first('storyDate') }}
                        </span>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-secondary mt-2 ml-4 w-25" @click="postStory">Зберегти</button>
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
				<tr v-for="(item, index) in story" :key="item.id">
					<th scope="row">{{ index + 1 }}</th>
					<td>{{ item.title }}</td>
					<td>{{ item.date }}</td>
					<td><a style="color:#000" :href="'/admin/story/'+item.id"><i class="fa fa-2x fa-pencil-square btn btn-default p-0"></i></a></td>
					<td><i class="fa fa-2x fa-times-circle btn btn-default p-0" @click="deleteStory(item.id, index)"></i></td>
				</tr>
			</tbody>
		</table>
    </div>
</template>
<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {
    name: "story",
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
            story: []
		};
	},
	created() {
        document.title = "Історії";
		this.getStoryList();
	},
	methods: {
		fieldChange(){
			let changeFile = this.$refs.storyImage.files;
			for(let i = 0; i < changeFile.length; i++) {
				if(changeFile[i].type == 'image/jpeg' || changeFile[i].type == 'image/png') {
					changeFile[i].valid = true;
				} else {
					changeFile[i].valid = false;
				}
				this.file.push(changeFile[i]);
			}
		},

		postStory() {
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
					form.append('date', this.date.getFullYear());
					axios.post('/api/story', form)
						.then((res) => {
                            this.file = [];
                            swal("Інформація успішно додана", {
                                icon: "success",
                            });
							this.story.push(res.data);
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
		getStoryList() {
			axios.get('/api/story')
				.then((response) => {
					this.story = response.data;
				})
        },
		deleteStory(id, index) {
            swal({
                title: "Бажаєте видалити?",
                text: "Після видалення ви не зможете відновити даний запис",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete('/api/story/'+id)
                        .then((response) => {
                            this.story.splice(index, 1);
                            swal("Історія була успішно видалена", {
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
