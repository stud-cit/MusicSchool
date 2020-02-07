<template>
    <div>
		<div class="row">
			<div class="col-12 mt-1 mb-2">
				<button type="button" class="btn btn-primary float-left" @click="showFormFoto = !showFormFoto, showFormVideo = false">Додати фото</button>
                <button type="button" class="btn btn-primary float-left mx-2" @click="showFormVideo = !showFormVideo, showFormFoto = false">Додати відео</button>
				<button type="button" v-if="selectFiles.length" class="btn btn-primary float-right" @click="deleteFiles">Видалити</button>
				<span  v-if="selectFiles.length" class="btn float-right">Обрано {{selectFiles.length}} елементів</span>
			</div>
		</div>

			<form enctype="multipart/form-data" v-if="showFormFoto">
				<div class="row">
					<div class="col-5">
						<label for="foto">Фото в оригінальній якості</label>
						<label class="custom-file w-100">
							<input type="file" name="foto" v-validate="{ 'ext':['jpg', 'jpeg', 'png', 'bmp'] }" class="custom-file-input" id="foto" ref="file" @change="fieldChange()" accept=".jpg, .jpeg, .png, .bmp" multiple>
							<span class="custom-file-control">{{ `Кількість обраних файлів: ${uploadPhotos.length}` }}</span>
						</label>
						<div v-for="(item, index) in uploadPhotos" :key="index">
							<div class="uploadFiles" :style="item.valid ? {color: 'black'} : {color: 'red'}">{{ item.name }} <i class="fa fa-times-circle btn btn-default p-1 mr-3" @click="deleteUploadFile(index)"></i></div>
						</div>
						<span class="text-danger" v-if="errors.has('foto')">
							Файл повинен бути зображенням
						</span><br>
						<!-- Временное решение -->
						<transition name="load">
							<div v-if="load" style="text-align:center">Завантаження</div>
						</transition>
						<button type="button" class="btn btn-outline-secondary mt-4 px-5" :disabled="uploadPhotos.length == 0 || errors.has('foto')" @click="uploadFile">Додати</button>
					</div>
				</div>
			</form>

            <div class="row" v-if="showFormVideo">
                <div class="col-5">
                    <div>
                    <label for="video" class="brtop">Посилання на відео (YouTube)</label>
                        <input type="text" ref="video" name="video" class="form-control" id="video" 
							v-model="uploadVideo" 
							v-validate="{regex: /(?:https?:\/\/)?(?:www\.)?youtu\.?be(?:\.com)?\/?.*(?:watch|embed)?(?:.*v=|v\/|\/)([\w\-_]+)\&?/}"
						>
						<span class="text-danger" v-if="errors.has('video')">Некоректне посилання</span>
                    </div>
                    <button :disabled="errors.has('video') || uploadVideo == ''" type="button" class="btn btn-outline-secondary mt-4 px-5" @click="postVideo">Додати</button>
                </div>
            </div>

        <br>
        <div class="row">
            <silentbox-group v-for="(item, index) in paginatedData" :key="index" class="col-4 fotoGallery">
				<div class="silentbox-item">
					<silentbox-item :src="'/user-file/gallery/'+item.file" class="foto" v-if="item.type == 'img'">
						<img :src="'/user-file/gallery/'+item.file">
						<a :href="'/user-file/gallery/'+item.file" download><i class="fa fa-download"></i></a>
					</silentbox-item>
					<silentbox-item :src="'//img.youtube.com/vi/'+item.file" class="foto" v-if="item.type == 'video'">
						<i class="fa fa-play-circle-o"></i>
						<img :src="'//img.youtube.com/vi/'+item.file.slice(item.file.length - 11, item.file.length)+'/mqdefault.jpg'">
					</silentbox-item>
					<div class="edit">
						<div class="chekbox-two">
							<label class="checkbox">
								<input type="checkbox" class="checkPhoto" :checked="selectFiles.indexOf(item) != -1 ? true : false" @click="itemFile(item)">
								<span class="checkbox__icon"></span>
							</label>
						</div>
					</div>
				</div>
            </silentbox-group>
        </div>
        <ul v-if="file.length > 0" class="pagination mt-4 justify-content-center">
            <li class="controls active" v-if="pagination.pageNumber !== 0" @click="prevPage"><i class="fa fa-long-arrow-left" aria-hidden="true" v-if="pagination.pageNumber !== 0"></i></li>
            <li>{{ pagination.pageNumber + 1 }} : {{ pageCount }}</li>
            <li class="controls active" v-if="pagination.pageNumber <= pageCount -2" @click="nextPage"><i class="fa fa-long-arrow-right" aria-hidden="true" v-if="pagination.pageNumber <= pageCount -2"></i></li>
        </ul>
    </div>
</template>

<script>
	export default {
        name: "gallery",
		data() {
			return {
                uploadPhotos: [],
                uploadVideo: '',
				file: [],
				pagination : {
					pageNumber: 0,
					size: 9
				},
                selectFiles: [],
				load: false,
                showFormVideo: false,
                showFormFoto: false
			}
		},
		created() {
			document.title = "Галерея";
			this.getFiles();
		},
		computed: {
			paginatedData(){
				const start = this.pagination.pageNumber * this.pagination.size;
				const end = start + this.pagination.size;
				return this.file.slice(start, end);
			},
			pageCount(){
				return Math.ceil(this.file.length / this.pagination.size);
			},
		},
		methods: {
			nextPage(){
				this.pagination.pageNumber++;
			},
			prevPage(){
				this.pagination.pageNumber--;
			},
			getFiles() {
				axios.get('/api/gallery')
					.then((response) => {
						this.file = response.data;
					})
			},
			itemFile(item) {
				if(this.selectFiles.indexOf(item) == -1) {
					this.selectFiles.push(item);
				} else {
					this.selectFiles.splice(this.selectFiles.indexOf(item), 1);
				}
			},
			fieldChange(){
				let changeFile = this.$refs.file.files;
				for(let i = 0; i < changeFile.length; i++) {
					if(changeFile[i].type == 'image/jpeg' || changeFile[i].type == 'image/png') {
						changeFile[i].valid = true;
					} else {
						changeFile[i].valid = false;
					}
					this.uploadPhotos.push(changeFile[i]);
				}
			},
			uploadFile() {
				this.$validator.validateAll().then((result) => {
					if (!result) {
						return;
					} else {
						var form = new FormData;
						this.load = true;
						for (let i = 0; i < this.uploadPhotos.length; i++) {
							if (this.uploadPhotos[i].valid) {
								form.append('pics[]', this.uploadPhotos[i]);
							}
						}
						form.append('type', 'img');
						axios.post('/api/gallery', form)
								.then((res) => {
									this.uploadPhotos = [];
									this.load = false;
									this.file = this.file.concat(res.data);
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
									});
								});
					}
				});
            },
            postVideo() {
                axios.post('/api/gallery', {
                    file: this.uploadVideo,
                    type: 'video'
                }).then((res) => {
					this.uploadVideo = '';
					this.file.push(res.data);
					swal("Інформація оновлена", {
						icon: "success",
						timer: 1000,
						button: false
					});
                }).catch(() => {
                    swal({
                        icon: "error",
                        title: 'Помилка',
                        text: 'Файл не обрано'
                    });
                })
            },
			deleteUploadFile(index) {
				this.uploadPhotos.splice(index, 1);
			},
			deleteFiles() {
				swal({
					title: "Бажаєте видалити?",
					text: "Після видалення ви не зможете відновити ці файли!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				}).then((willDelete) => {
					if (willDelete) {
						axios.post('/api/delete-gallery', {
							files: this.selectFiles
						})
						.then((res) => {
							this.getFiles();
							this.selectFiles = [];
							swal("Файли успішно видалені", {
								icon: "success",
							});
						});
					}
				});
			},
		}
	}
</script>

<style scoped>
.fa-download {
	bottom: 0px;
}

li{
	font-size: 20px;
}
.fa-long-arrow-left::before{
	margin-right: 15px;
	font-size: 35px;
}
.fa-long-arrow-right::before{
	margin-left: 15px;
	font-size: 35px;
}
</style>