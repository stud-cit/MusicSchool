<template>
    <div>
        <form enctype="multipart/form-data">
                <h3>Опис сторінок сайту</h3>
            <div class="row">
                <div class="col-5">
                    <label for="home" class="brtop">Опис головної сторінки</label>
                    <textarea name="home" class="form-control" id="home" 
                        v-model="data.home.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис головної сторінки"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('home')">
                            {{ errors.first('home') }}<br>
                    </span>
                    <button :disabled="errors.has('home')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "home")'>Редагувати</button><br><br>
                    <hr>

                    <label for="history" class="brtop">Опис сторінки з історією</label>
                    <textarea name="history" class="form-control" id="history" 
                        v-model="data.history.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис сторінки з історією"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('history')">
                            {{ errors.first('history') }}<br>
                    </span>
                    <button :disabled="errors.has('history')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "history")'>Редагувати</button><br><br>
                    <hr>

                    <label for="news" class="brtop">Опис сторінки з новинами</label>
                    <textarea name="news" class="form-control" id="news" 
                        v-model="data.news.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис сторінки з новинами"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('news')">
                            {{ errors.first('news') }}<br>
                    </span>
                    <button :disabled="errors.has('news')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "news")'>Редагувати</button><br><br>
                    <hr>

                    <label for="departments" class="brtop">Опис сторінки з відділами</label>
                    <textarea name="departments" class="form-control" id="departments" 
                        v-model="data.departments.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис сторінки з відділами"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('departments')">
                            {{ errors.first('departments') }}<br>
                    </span>
                    <button :disabled="errors.has('departments')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "departments")'>Редагувати</button><br><br>
                    <hr>

                    <label for="achievements" class="brtop">Опис сторінки з досягненнями</label>
                    <textarea name="achievements" class="form-control" id="achievements" 
                        v-model="data.achievements.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис сторінки з досягненнями"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('home')">
                            {{ errors.first('achievements') }}<br>
                    </span>
                    <button :disabled="errors.has('achievements')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "achievements")'>Редагувати</button><br><br>
                    <hr>
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <label for="introduction" class="brtop">Опис сторінки вступу</label>
                    <textarea name="introduction" class="form-control" id="introduction" 
                        v-model="data.introduction.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис сторінки вступу"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('introduction')">
                            {{ errors.first('introduction') }}<br>
                    </span>
                    <button :disabled="errors.has('introduction')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "introduction")'>Редагувати</button><br><br>
                    <hr>

                    <label for="gallery" class="brtop">Опис сторінки галереї</label>
                    <textarea name="gallery" class="form-control" id="gallery" 
                        v-model="data.gallery.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис головної сторінки"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('gallery')">
                            {{ errors.first('gallery') }}<br>
                    </span>
                    <button :disabled="errors.has('gallery')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "gallery")'>Редагувати</button><br><br>
                    <hr>

                    <label for="contacts" class="brtop">Опис сторінки з контактами</label>
                    <textarea name="contacts" class="form-control" id="contacts" 
                        v-model="data.contacts.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис сторінки з історією"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('contacts')">
                            {{ errors.first('contacts') }}<br>
                    </span>
                    <button :disabled="errors.has('contacts')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "contacts")'>Редагувати</button><br><br>
                    <hr>

                    <label for="teachers" class="brtop">Опис сторінки з викладачами</label>
                    <textarea name="teachers" class="form-control" id="teachers" 
                        v-model="data.teachers.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис сторінки з викладачами"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('teachers')">
                            {{ errors.first('teachers') }}<br>
                    </span>
                    <button :disabled="errors.has('teachers')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "teachers")'>Редагувати</button><br><br>
                    <hr>

                    <label for="instruments" class="brtop">Опис сторінки з інструментами</label>
                    <textarea name="instruments" class="form-control" id="instruments" 
                        v-model="data.instruments.text" rows="6" 
                        disabled 
                        v-validate="{ required: true}"
                        data-vv-as="Опис сторінки з інструментами"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('home')">
                            {{ errors.first('instruments') }}<br>
                    </span>
                    <button :disabled="errors.has('instruments')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "instruments")'>Редагувати</button><br><br>
                    <hr>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "page-info",
    data() {
        return {
            data: {
                home: {text: ''},
                history: {text: ''},
                news: {text: ''},
                departments: {text: ''},
                achievements: {text: ''},
                introduction: {text: ''},
                gallery: {text: ''},
                contacts: {text: ''},
                teachers: {text: ''},
                instruments: {text: ''}
            }
        }
    },
	created() {
        document.title = "Загальна інформація";
        this.getInfo();
    },
    methods: {
	    getInfo() {
		    axios.get('/api/page-info')
			    .then((response) => {
                    response.data.map(item => {
                        this.data[item.page] = {text: item.text}
                    });
                })
        },
        edit(event, page) {
            const textElement = document.getElementById(page);
            if(event.target.innerHTML == "Редагувати") {
                textElement.removeAttribute('disabled');
                textElement.focus();
                event.target.innerHTML = 'Зберегти';
            }
            else {
                textElement.setAttribute('disabled', 'disabled');
                event.target.innerHTML = 'Редагувати';
                axios.post('/api/page-info', {
                    page,
                    text: this.data[page].text
                }).then((response) => {
                    swal("Інформація оновлена", {
                        icon: "success",
                        timer: 1000,
                        button: false
                    });
	            })
            }
        },
    }
};
</script>

<style scoped></style>
