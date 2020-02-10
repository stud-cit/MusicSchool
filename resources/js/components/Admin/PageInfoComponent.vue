<template>
    <div>
        <form enctype="multipart/form-data">
            <h3>Опис сторінок сайту</h3>
            <hr>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header p-2">
                            Історія
                        </div>
                        <div class="card-body p-2">
                            <label for="titleHistory" class="brtop">Заголовок</label>
                            <input name="titleHistory" type="text" class="form-control" v-model="data.history.title" id="titleHistory" disabled v-validate="{required: true}">
                            <dix class="text-danger" v-if="errors.has('titleHistory')">Обов'язкове поле</dix>

                            <label for="history" class="brtop">Опис</label>
                            <textarea name="history" class="form-control" id="history"
                                v-model="data.history.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис сторінки з історією"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('history')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('history') || errors.has('titleHistory')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "history", "titleHistory")'>Редагувати</button><br><br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header p-2">
                            Новини
                        </div>
                        <div class="card-body p-2">
                            <label for="titleNews" class="brtop">Заголовок</label>
                            <input name="titleNews" type="text" class="form-control" v-model="data.news.title" id="titleNews" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleNews')">Обов'язкове поле</div>

                            <label for="news" class="brtop">Опис</label>
                            <textarea name="news" class="form-control" id="news"
                                v-model="data.news.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис сторінки з новинами"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('news')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('news') || errors.has('titleNews')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "news", "titleNews")'>Редагувати</button><br><br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header p-2">
                            Відділи
                        </div>
                        <div class="card-body p-2">
                            <label for="titleDepartments" class="brtop">Заголовок</label>
                            <input name="titleDepartments" type="text" class="form-control" v-model="data.departments.title" id="titleDepartments" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleDepartments')">Обов'язкове поле</div>

                            <label for="departments" class="brtop">Опис</label>
                            <textarea name="departments" class="form-control" id="departments"
                                v-model="data.departments.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис сторінки з відділами"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('departments')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('departments') || errors.has('titleDepartments')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "departments", "titleDepartments")'>Редагувати</button><br><br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header p-2">
                            Досягнення
                        </div>
                        <div class="card-body p-2">
                            <label for="titleAchievements" class="brtop">Заголовок</label>
                            <input name="titleAchievements" type="text" class="form-control" v-model="data.achievements.title" id="titleAchievements" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleAchievements')">Обов'язкове поле</div>

                            <label for="achievements" class="brtop">Опис</label>
                            <textarea name="achievements" class="form-control" id="achievements"
                                v-model="data.achievements.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис сторінки з досягненнями"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('achievements')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('achievements') || errors.has('titleAchievements')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "achievements", "titleAchievements")'>Редагувати</button><br><br>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header p-2">
                            Вступ
                        </div>
                        <div class="card-body p-2">
                            <label for="titleIntroduction" class="brtop">Заголовок</label>
                            <input name="titleIntroduction" type="text" class="form-control" v-model="data.introduction.title" id="titleIntroduction" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleIntroduction')">Обов'язкове поле</div>

                            <label for="introduction" class="brtop">Опис</label>
                            <textarea name="introduction" class="form-control" id="introduction"
                                v-model="data.introduction.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис сторінки вступу"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('introduction')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('introduction') || errors.has('titleIntroduction')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "introduction", "titleIntroduction")'>Редагувати</button><br><br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header p-2">
                            Галерея
                        </div>
                        <div class="card-body p-2">
                            <label for="titleGallery" class="brtop">Заголовок</label>
                            <input name="titleGallery" type="text" class="form-control" v-model="data.gallery.title" id="titleGallery" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleGallery')">Обов'язкове поле</div>

                            <label for="gallery" class="brtop">Опис</label>
                            <textarea name="gallery" class="form-control" id="gallery"
                                v-model="data.gallery.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис головної сторінки"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('gallery')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('gallery') || errors.has('titleGallery')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "gallery", "titleGallery")'>Редагувати</button><br><br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header p-2">
                            Контакти
                        </div>
                        <div class="card-body p-2">
                            <label for="titleСontacts" class="brtop">Заголовок</label>
                            <input name="titleСontacts" type="text" class="form-control" v-model="data.contacts.title" id="titleСontacts" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleСontacts')">Обов'язкове поле</div>

                            <label for="contacts" class="brtop">Опис</label>
                            <textarea name="contacts" class="form-control" id="contacts"
                                v-model="data.contacts.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис сторінки з історією"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('contacts')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('contacts') || errors.has('titleСontacts')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "contacts", "titleСontacts")'>Редагувати</button><br><br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header p-2">
                            Викладачі
                        </div>
                        <div class="card-body p-2">
                            <label for="titleTeachers" class="brtop">Заголовок</label>
                            <input name="titleTeachers" type="text" class="form-control" v-model="data.teachers.title" id="titleTeachers" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleTeachers')">Обов'язкове поле</div>

                            <label for="teachers" class="brtop">Опис</label>
                            <textarea name="teachers" class="form-control" id="teachers"
                                v-model="data.teachers.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис сторінки з викладачами"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('teachers')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('teachers') || errors.has('titleTeachers')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "teachers", "titleTeachers")'>Редагувати</button><br><br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header p-2">
                            Інструменти
                        </div>
                        <div class="card-body p-2">
                            <label for="titleInstruments" class="brtop">Заголовок</label>
                            <input name="titleInstruments" type="text" class="form-control" v-model="data.instruments.title" id="titleInstruments" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleInstruments')">Обов'язкове поле</div>

                            <label for="instruments" class="brtop">Опис</label>
                            <textarea name="instruments" class="form-control" id="instruments"
                                v-model="data.instruments.text" rows="4"
                                disabled
                                v-validate="{ required: true}"
                                data-vv-as="Опис сторінки з інструментами"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('instruments')">Обов'язкове поле</span><br>
                            <button :disabled="errors.has('instruments') || errors.has('titleInstruments')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "instruments", "titleInstruments")'>Редагувати</button><br><br>
                        </div>
                    </div>
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
                home: {text: '', title: ''},
                history: {text: '', title: ''},
                news: {text: '', title: ''},
                departments: {text: '', title: ''},
                achievements: {text: '', title: ''},
                introduction: {text: '', title: ''},
                gallery: {text: '', title: ''},
                contacts: {text: '', title: ''},
                teachers: {text: '', title: ''},
                instruments: {text: '', title: ''}
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
                        this.data[item.page] = {text: item.text, title: item.title}
                    });
                })
        },
        edit(event, page, title) {
            const textElement = document.getElementById(page);
            const titleElement = document.getElementById(title);
            if(event.target.innerHTML == "Редагувати") {
                textElement.removeAttribute('disabled');
                titleElement.removeAttribute('disabled');
                textElement.focus();
                event.target.innerHTML = 'Зберегти';
            }
            else {
                textElement.setAttribute('disabled', 'disabled');
                titleElement.setAttribute('disabled', 'disabled');
                event.target.innerHTML = 'Редагувати';
                axios.post('/api/page-info', {
                    page,
                    text: this.data[page].text,
                    title: this.data[page].title
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
