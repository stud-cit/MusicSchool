<template>
    <div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="ml-5">
                    <div class="row mt-2" v-for="(news, index) in object_news.news" :key="'news'+index">
                        <div class="col-5">
                        <label for="newsName" class="brtop">Назва новини</label>
                        <input type="text" name="newsName" class="form-control" v-model="news.nas_name"
                               id="newsName" :disabled="news.disabled == '' ? news.disabled : true"
                               v-validate="{ required: true }"
                               data-vv-as="Назва новини">
                        </div>

                        <div class="col-5">
                        <label for="newsInfo" class="brtop">Опис новини</label>
                        <input type="text" name="newsInfo" class="form-control" v-model="news.nas_info"
                               id="newsInfo" :disabled="news.disabled == '' ? news.disabled : true"
                               v-validate="{ required: true}"
                               data-vv-as="Опис новини">
                        </div>

                        <div class="col-5">
                        <label for="newsImage" class="brtop">Зображення для новини</label>
                        <div class="row">
                            <div class="col-9">
                                <label class="custom-file w-100">
                                    <input type="file" v-validate="'image'" name="newsImage" class="custom-file-input" :disabled="news.disabled == '' ? news.disabled : true"
                                           id="newsImage" ref="news_image"
                                           @change="previewFiles($event, 'news_image')" accept="image/*" multiple>
                                    <span class="custom-file-control">Файл не обрано</span>
                                </label>
                            </div>
                            <p class="text-danger col-9" v-if="errors.has('newsImage')">Файл повинен бути
                                зображенням</p>
                        </div>
                        <img v-if="!errors.has('newsImage')" class="mt-3 w-50" :src="news.file">
                        </div>

                        <div class="col-5">
                        <label for="newsDate" class="brtop">Дата оприлюднення</label>
                        <input type="text" name="newsDate" class="form-control" v-model="news.date" id="newsDate"
                               :disabled="news.disabled == '' ? news.disabled : true"
                               v-validate="{ required: true}"
                               data-vv-as="Дата оприлюднення">
                        </div>

                        <div class="col-6">
                            <button type="button" class="btn btn-outline-secondary btn-block w-100" @click="add('news')">
                                Додати новину
                            </button>
                        </div>

                        <div class="col-5">
                            <button type="button" class="btn btn-outline-secondary float-left mr-2" @click="del(index, news.nas_id, 'news')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <button v-if="news !== editing && news.disabled != false" type="button" class="btn btn-outline-secondary float-left" @click='editNews(news, "news", index)'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            <button v-else type="button" class="btn btn-outline-secondary float-left" @click='saveNews("news", index, "images", "file", "img")'><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-5">
                            <span class="errors text-danger" v-if="errors.has('newsName')">
                                   {{ errors.first('newsName') }}
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="errors text-danger" v-if="errors.has('newsInfo')">
                                    {{ errors.first('newsInfo') }}
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="errors text-danger" v-if="errors.has('newsImage')">
                                    {{ errors.first('newsImage') }}
                            </span>
                        </div>
                        <div class="col-5">
                            <span class="errors text-danger" v-if="errors.has('newsDate')">
                                    {{ errors.first('newsDate') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </form>
    </div>
</template>
<script>
export default {
    name: "news",
    data() {
    	return {
		    editing: {},
		    object_news: {
		        news: [],
			    file: [],
			    type: 'news'
            },
		    form: new FormData
        };
    },
    created() {
    	this.getNewsList();
    },
    methods: {
	    previewFiles(event, el) {
		    var input = event.target;
		    if (input.files && input.files[0]) {
			    var reader = new FileReader();
			    reader.onload = (e) => {
				    this.object_news.file[el] = e.target.result;
			    }
			    reader.readAsDataURL(input.files[0]);
			    input.parentNode.querySelector('span').innerHTML = input.files[0].name;
		    }
	    },

	    editNews(news, el, index) {
		    const textElementName = document.querySelectorAll('#'+el+"Name")[index];
		    const textElementInfo = document.querySelectorAll('#'+el+"Info")[index];
		    const textElementImage = document.querySelectorAll('#'+el+"Image")[index];
		    const textElementDate = document.querySelectorAll('#'+el+"Date")[index];
		    textElementName.removeAttribute('disabled');
		    textElementInfo.removeAttribute('disabled');
		    textElementImage.removeAttribute('disabled');
		    textElementDate.removeAttribute('disabled');
		    textElementName.focus();
		    this.editing = news;
	    },
	    saveNews(el, index) {
		    this.$validator.validateAll().then((result) => {
			    if (!result) {
				    return;
			    } else {
				    const textElementName = document.querySelectorAll('#' + el + "Name")[index];
				    const textElementInfo = document.querySelectorAll('#' + el + "Info")[index];
				    const textElementImage = document.querySelectorAll('#' + el + "Image")[index];
				    const textElementDate = document.querySelectorAll('#' + el + "Date")[index];
				    textElementName.setAttribute('disabled', 'disabled');
				    textElementInfo.setAttribute('disabled', 'disabled');
				    textElementImage.setAttribute('disabled', 'disabled');
				    textElementDate.setAttribute('disabled', 'disabled');
				    this.editing = {};
				    this.object_news.news[index].disabled = true;

				    axios.post('/post-news', {
					    news_id: this.object_news.news[index].nas_id,
					    image_id: this.object_news.news[index].images_id,
					    nas_name: this.object_news.news[index].nas_name,
					    nas_info: this.object_news.news[index].nas_info,
					    date: this.object_news.news[index].date,
					    file: this.object_news.news[index].file,
				    }).then((res) => {
					    this.object_news.news[index].nas_id = res.data.nas_id;
					    this.object_news.news[index].images_id = res.data.images_id;
					    swal("Інформація додана", {
						    icon: "success",
						    timer: 1000,
						    button: false
					    });
				    }).catch((error) => {
						    swal({
							    icon: "error",
							    title: 'Помилка',
						    });
					    });
			    }
		    });

	    },
	    getNewsList() {
		    axios.get('/get-news')
			    .then((response) => {
				    this.object_news.news.push(...response.data)
                    response.data.forEach(image => {
                        this.object_news.file.push({
	                        newsFile: image.images[0].file,
                            image_id: image.images[0].images_id
                        })
                    })
                    console.log(this.object_news.file)
			    })
	    },
	    add(arr) {
		    this.object_news[arr].push({object_news: '', disabled: false});
	    },
	    del(index, id, arr) {
		    if(id) {
			    axios.post('/delete-news/'+id);
		    }
		    this.object_news[arr].splice(index, 1);
	    },
    }
};
</script>

<style scoped></style>
