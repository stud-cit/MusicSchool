<template>
    <div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="col-5">
                    <h3>Загальна інформація</h3>
                    <hr>
                    <label for="info_school" class="brtop">Коротка інформація про школу</label>
                    <textarea name="info_school" class="form-control" id="info_school" 
                        v-model="info.info_school" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Коротка інформація про школу"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('info_school')">
                            {{ errors.first('info_school') }}<br>
                    </span>
                    <button :disabled="errors.has('info_school')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "info_school")'>Редагувати</button><br><br>
                    <hr>
                    <label for="video" class="brtop">Відео (YouTube)</label>
                    <div class="row">
                        <div class="col-9">
                            <input name="video" type="text" class="form-control" id="video" 
                                v-model="info.video" 
                                disabled
                                v-validate="{required: true, regex: /(?:https?:\/\/)?(?:www\.)?youtu\.?be(?:\.com)?\/?.*(?:watch|embed)?(?:.*v=|v\/|\/)([\w\-_]+)\&?/}"
                            >
                            <span class="text-danger" v-if="errors.has('video')">Некоректне посилання</span>
                        </div>
                        <div class="col-3">
                            <button type="button" :disabled="errors.has('video')" class="btn btn-outline-secondary edit" @click='edit($event, "video")'>Редагувати</button>
                        </div>
                    </div>
                    <iframe class="mt-3" width="100%" height="300" :src="'https://www.youtube.com/embed/'+info.video.slice(info.video.length - 11, info.video.length)" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <h3>Контакти</h3>
                    <hr>
                    <label for="phone" class="brtop">Телефон</label>
                    <div class="row mb-2">
                        <div class="col-9">
                            <input type="text" name="phone" class="form-control" id="phone" 
                                v-model="info.phone" 
                                data-vv-as="Телефон" 
                                disabled 
                                v-validate="{ required: true, regex: /^(\s*)?(\+)?([- _()]?\d[- _()]?){10,12}(\s*)?$/ }"
                            >
                            <span class="errors text-danger" v-if="errors.has('phone')">
                                {{ errors.first('phone') }}
                            </span>
                        </div>
                        <div class="col-3">
                            <button :disabled="errors.has('phone')" type="button" class="btn btn-outline-secondary edit" @click='edit($event, "phone")'>Редагувати</button>
                        </div>
                    </div>
                    <label for="email" class="brtop">Email</label>
                    <div class="row mb-2">
                        <div class="col-9">
                            <input type="text" name="email" class="form-control" id="email" 
                                v-model="info.email"
                                data-vv-as="Email" 
                                disabled 
                                v-validate="{ required: true, regex: /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/ }"
                            >
                            <span class="errorss text-danger" v-if="errors.has('email')">
                                    Введіть дані у форматі name@email.com
                            </span>
                        </div>
                        <div class="col-3">
                            <button :disabled="errors.has('email')" type="button" class="btn btn-outline-secondary edit" @click='edit($event, "email")'>Редагувати</button>
                        </div>
                    </div>
                    <label for="address" class="brtop">Адреса</label>
                    <div class="row">
                        <div class="col-9">
                            <input type="text" name="address" class="form-control" id="address" 
                                v-model="info.address" 
                                data-vv-as="Адреса" 
                                disabled 
                                v-validate="{ required: true}"
                            >
                            <span class="errors text-danger" v-if="errors.has('address')">
                                {{ errors.first('address') }}
                            </span>
                        </div>
                        <div class="col-3">
                            <button :disabled="errors.has('address')" type="button" class="btn btn-outline-secondary edit" @click='edit($event, "address")'>Редагувати</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "info",
    data() {
        return {
            info: {
                info_school: '',
                video: '',
                phone: '',
                email: '',
                address: ''
            },
            showButton: true
        }
    },
	created() {
        this.getInfo();
    },
    methods: {
	    getInfo() {
		    axios.get('/api/info')
			    .then((response) => {
                    this.info = response.data;
			    })
        },
        edit(event, column) {
            const textElement = document.getElementById(column);
            if(this.showButton) {
                textElement.removeAttribute('disabled');
                textElement.focus();
                event.target.innerHTML = 'Зберегти';
                this.showButton = false;
            }
            else {
                textElement.setAttribute('disabled', 'disabled');
                event.target.innerHTML = 'Редагувати';
                axios.post('/api/update-info', {
                    column,
                    value: this.info[column]
                })
                this.showButton = true;
            }
        },
    }
};
</script>

<style scoped></style>
