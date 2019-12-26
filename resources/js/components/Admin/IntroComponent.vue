<template>
    <div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="col-5">
                    <h3>Інформація про вступ</h3>
                    <hr>
                    <label for="bg" class="brtop">Фон сторінки вступу</label>
                    <div class="row">
                        <div class="col-9">
                            <label class="custom-file w-100">
                                <input type="file" class="custom-file-input" id="bg" name="bg" ref="bg" @change="previewFiles($event, 'bg')" accept="image/*" v-validate="'image'">
                                <div class="uploadIntroFiles custom-file-control">Файл не обрано</div>
                            </label>
                        </div>
                        <div class="col-3">
                            <button type="button" :disabled="errors.has('bg')" class="btn btn-outline-secondary edit w-100 px-0" @click='editFile("intro", "bg", "site-files")'>Зберегти</button>
                        </div>
                        <p class="text-danger col-9" v-if="errors.has('bg')">Файл повинен бути зображенням</p>
                    </div>
                    <img v-if="!errors.has('bg')" class="mt-3 w-50" :src="intro.bg">
                    <hr>
                    <label for="photo" class="brtop">Фото стислої фото інформації</label>
                    <div class="row">
                        <div class="col-9">
                            <label class="custom-file w-100">
                                <input type="file" class="custom-file-input" id="photo" name="photo" ref="photo" @change="previewFiles($event, 'photo')" accept="image/*" v-validate="'image'">
                                <div class="uploadIntroFiles custom-file-control">Файл не обрано</div>
                            </label>
                        </div>
                        <div class="col-3">
                            <button type="button" :disabled="errors.has('photo')" class="btn btn-outline-secondary edit w-100 px-0" @click='editFile("intro", "photo", "site-files")'>Зберегти</button>
                        </div>
                        <p class="text-danger col-9" v-if="errors.has('photo')">Файл повинен бути зображенням</p>
                    </div>
                    <img v-if="!errors.has('photo')" class="mt-3 w-50" :src="intro.photo">

                    <h3>Документи для ознайомлення</h3>
                    <div v-for="item in documents" :key="item.documents_id">
                        <hr>
                        <label :for="'block'+item.documents_id" class="brtop">Назва {{item.documents_id}} файлу</label>
                        <div class="row">
                            <div class="col-9">
                                <input :name="'block'+item.documents_id" type="text" class="form-control" :id="'block'+item.documents_id" 
                                    v-model="item.text" 
                                    disabled
                                    v-validate="{ required: true}"
                                    data-vv-as="Текст блоку"
                                >
                                <label class="custom-file mt-2 w-100">
                                    <input type="file" disabled class="custom-file-input" :id="'file'+item.documents_id" :name="'file'+item.documents_id" :ref="'file'+item.documents_id" @change="previewFiles($event, 'file'+item.documents_id)">
                                    <div class="uploadIntroFiles custom-file-control">{{ item.file.replace("/documents/", '') }}</div>
                                </label>
                                <span class="errors text-danger" v-if="errors.has('block'+item.documents_id)">{{ errors.first('block'+item.documents_id) }}</span>
                            </div>
                            <div class="col-3">
                                <button type="button" :disabled="errors.has('block'+item.documents_id)" class="btn btn-outline-secondary edit w-100 px-0" @click='editDocument($event, item.documents_id)'>Редагувати</button>
                            </div>
                        </div>
                    </div>

                </div>
                    <div class="col-2"></div>
                    <div class="col-5">
                        <hr>
                        <div>
                            <label for="info" class="brtop">Загальна інформація</label>
                            <textarea 
                                name="info" 
                                class="form-control" 
                                v-model="intro.info" 
                                id="info" 
                                rows="6"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Загальна інформація"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('info')">
                                {{ errors.first('info') }}
                            </span>
                            <button type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "intro", "info")'>Редагувати</button><br><br>
                        </div>
                        <hr>
                        <div>
                            <label for="block1" class="brtop">Текст першого блоку</label>
                            <textarea 
                                name="block1" 
                                class="form-control" 
                                v-model="intro.block1" 
                                id="block1" 
                                rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Текст першого блоку"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('block1')">
                                {{ errors.first('block1') }}
                            </span>
                            <button type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "intro", "block1")'>Редагувати</button><br><br>
                        </div>
                        <hr>
                        <div>
                            <label for="block2" class="brtop">Текст другого блоку</label>
                            <textarea name="block2" class="form-control" v-model="intro.block2" id="block2" rows="4" disabled
                                      v-validate="{ required: true}"
                                      data-vv-as="Текст другого блоку"></textarea>
                            <span class="errors text-danger" v-if="errors.has('block2')">
                                {{ errors.first('block2') }}
                            </span>
                            <button type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "intro", "block2")'>Редагувати</button><br><br>
                        </div>
                        <hr>
                        <div>
                            <label for="block3" class="brtop">Текст третього блоку</label>
                            <textarea name="block3" class="form-control" v-model="intro.block3" id="block3" rows="4" disabled
                                      v-validate="{ required: true}"
                                      data-vv-as="Текст третього блоку"></textarea>
                            <span class="errors text-danger" v-if="errors.has('block3')">
                                {{ errors.first('block3') }}
                            </span>
                            <button type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "intro", "block3")'>Редагувати</button><br><br>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "intro",
    data() {
    	return {
    		editing: {},
            intro: {
    			block1: '',
                block2: '',
                block3: '',
                bg: '',
                info: '',
                photo: '',
            },
            documents: [],
            form: new FormData
        };
    },
	created () {
        document.title = "Вступ";
        this.getIntro();
        this.getDocuments();
	},
    methods: {
	    previewFiles(event, el) {
		    var input = event.target;
		    if (input.files && input.files[0]) {
			    var reader = new FileReader();
			    reader.onload = (e) => {
				    this.intro[el] = e.target.result;
			    }
			    reader.readAsDataURL(input.files[0]);
			    input.parentNode.querySelector('div').innerHTML = input.files[0].name;
		    }
        },
        
        editDocument(event, id) {
            const textElement = document.getElementById("block"+id);
            const fileElement = document.getElementById("file"+id);
            if(event.target.innerHTML == "Редагувати") {
                textElement.removeAttribute('disabled');
                fileElement.removeAttribute('disabled');
                fileElement.style.cursor = "pointer";
                textElement.focus();
                event.target.innerHTML = 'Зберегти';
            }
            else {
                textElement.setAttribute('disabled', 'disabled');
                fileElement.setAttribute('disabled', 'disabled');
                fileElement.style.cursor = "default";
                event.target.innerHTML = 'Редагувати';

                var form = new FormData;
                form.append('text', this.documents[id-1].text);
                form.append('file', fileElement.files[0]);
                axios.post('/api/document/'+id, form)
                    .then((response) => {
                        swal("Інформація оновлена", {
                            icon: "success",
                            timer: 1000,
                            button: false
                        });
	            })
            }
        },

	    editFile(table, row, type) {
		    this.form.append('table', table);
		    this.form.append('row', row);
		    this.form.append('type', type);
            this.form.append('bg', this.$refs[row].files[0]);
            this.form.append('photo', this.$refs[row].files[0]);
            if(this.$refs[row].files[0] !== undefined){
                axios.post('/post-intro-file', this.form)
                    .then((response) => {
                        swal("Інформація оновлена", {
                            icon: "success",
                            timer: 1000,
                            button: false
                        });
                    })
            }
            else {
                swal({
                    icon: "error",
                    title: 'Помилка',
                    text: 'Файл не обрано'
                });
            }
	    },
	    edit(event, table, el) {
		    this.$validator.validateAll().then((result) => {
			    if (!result) {
				    return;
			    }
			    else {
				    const textElement = document.getElementById(el);
				    if(event.target.innerHTML == "Редагувати") {
					    textElement.removeAttribute('disabled');
					    textElement.focus();
					    event.target.innerHTML = 'Зберегти';
				    }
				    else {
					    textElement.setAttribute('disabled', 'disabled');
					    event.target.innerHTML = 'Редагувати';
					    axios.post('/api/intro', {
						    table,
						    row: el,
						    value: textElement.value
					    })
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
							    });
						    });
				    }
			    }
		    });
	    },
        getIntro() {
	        axios.get('/api/intro')
		        .then((response) => {
                    Object.assign(this.intro, response.data);
		        })
        },
        getDocuments() {
            axios.get('/api/document')
            .then((response) => {
                this.documents = response.data;
            })
        }
    }
}
</script>

<style scoped>
    button {
        overflow:hidden;
    }
</style>
