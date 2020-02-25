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
                            <div class="text-danger" v-if="errors.has('titleHistory')">Обов'язкове поле</div>

                            <label for="shirtHistory" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtHistory" type="text" class="form-control" v-model="data.history.shirt_text" id="shirtHistory" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtHistory')">Обов'язкове поле</div>

                            <!-- <label for="history" class="brtop">Детальний опис</label>
                            <textarea name="history" class="form-control" id="history"
                                v-model="data.history.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис сторінки з історією"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('history')">Обов'язкове поле</span><br> -->
                            <button :disabled="errors.has('history') || errors.has('titleHistory')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "history", "shirtHistory", "titleHistory")'>Редагувати</button><br><br>
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

                            <label for="shirtNews" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtNews" type="text" class="form-control" v-model="data.news.shirt_text" id="shirtNews" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtNews')">Обов'язкове поле</div>

                            <!-- <label for="news" class="brtop">Детальний опис</label>
                            <textarea name="news" class="form-control" id="news"
                                v-model="data.news.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис сторінки з новинами"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('news')">Обов'язкове поле</span><br> -->
                            <button :disabled="errors.has('news') || errors.has('titleNews')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "news", "shirtNews", "titleNews")'>Редагувати</button><br><br>
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

                            <label for="shirtDepartments" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtDepartments" type="text" class="form-control" v-model="data.departments.shirt_text" id="shirtDepartments" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtDepartments')">Обов'язкове поле</div>

                            <label for="departments" class="brtop">Детальний опис</label>
                            <textarea name="departments" class="form-control" id="departments"
                                v-model="data.departments.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис сторінки з відділами"
                            ></textarea>
                            <br>
                            <button :disabled="errors.has('departments') || errors.has('shirtDepartments') || errors.has('titleDepartments')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "departments", "shirtDepartments", "titleDepartments")'>Редагувати</button><br><br>
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

                            <label for="shirtAchievements" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtAchievements" type="text" class="form-control" v-model="data.achievements.shirt_text" id="shirtAchievements" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtAchievements')">Обов'язкове поле</div>

                            <!-- <label for="achievements" class="brtop">Детальний опис</label>
                            <textarea name="achievements" class="form-control" id="achievements"
                                v-model="data.achievements.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис сторінки з досягненнями"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('achievements')">Обов'язкове поле</span><br> -->
                            <button :disabled="errors.has('achievements') || errors.has('titleAchievements')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "achievements", "shirtAchievements", "titleAchievements")'>Редагувати</button><br><br>
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

                            <label for="shirtIntroduction" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtIntroduction" type="text" class="form-control" v-model="data.introduction.shirt_text" id="shirtIntroduction" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtIntroduction')">Обов'язкове поле</div>

                            <!-- <label for="introduction" class="brtop">Детальний опис</label>
                            <textarea name="introduction" class="form-control" id="introduction"
                                v-model="data.introduction.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис сторінки вступу"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('introduction')">Обов'язкове поле</span><br> -->
                            <button :disabled="errors.has('introduction') || errors.has('titleIntroduction')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "introduction", "shirtIntroduction", "titleIntroduction")'>Редагувати</button><br><br>
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

                            <label for="shirtGallery" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtGallery" type="text" class="form-control" v-model="data.gallery.shirt_text" id="shirtGallery" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtGallery')">Обов'язкове поле</div>

                            <!-- <label for="gallery" class="brtop">Детальний опис</label>
                            <textarea name="gallery" class="form-control" id="gallery"
                                v-model="data.gallery.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис головної сторінки"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('gallery')">Обов'язкове поле</span><br> -->
                            <button :disabled="errors.has('gallery') || errors.has('titleGallery')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "gallery", "shirtGallery", "titleGallery")'>Редагувати</button><br><br>
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

                            <label for="shirtСontacts" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtСontacts" type="text" class="form-control" v-model="data.contacts.shirt_text" id="shirtСontacts" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtСontacts')">Обов'язкове поле</div>

                            <!-- <label for="contacts" class="brtop">Детальний опис</label>
                            <textarea name="contacts" class="form-control" id="contacts"
                                v-model="data.contacts.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис сторінки з історією"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('contacts')">Обов'язкове поле</span><br> -->
                            <button :disabled="errors.has('contacts') || errors.has('titleСontacts')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "contacts", "shirtСontacts", "titleСontacts")'>Редагувати</button><br><br>
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

                            <label for="shirtTeachers" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtTeachers" type="text" class="form-control" v-model="data.teachers.shirt_text" id="shirtTeachers" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtTeachers')">Обов'язкове поле</div>

                            <!-- <label for="teachers" class="brtop">Детальний опис</label>
                            <textarea name="teachers" class="form-control" id="teachers"
                                v-model="data.teachers.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис сторінки з викладачами"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('teachers')">Обов'язкове поле</span><br> -->
                            <button :disabled="errors.has('teachers') || errors.has('titleTeachers')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "teachers", "shirtTeachers", "titleTeachers")'>Редагувати</button><br><br>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header p-2">
                            Інформація
                        </div>
                        <div class="card-body p-2">
                            <label for="titleInstruments" class="brtop">Заголовок</label>
                            <input name="titleInstruments" type="text" class="form-control" v-model="data.instruments.title" id="titleInstruments" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('titleInstruments')">Обов'язкове поле</div>

                            <label for="shirtInstruments" class="brtop">Короткий опис (має бути не більше 120 символів)</label>
                            <input name="shirtInstruments" type="text" class="form-control" v-model="data.instruments.shirt_text" id="shirtInstruments" maxlength="120" disabled v-validate="{required: true}">
                            <div class="text-danger" v-if="errors.has('shirtInstruments')">Обов'язкове поле</div>

                            <!-- <label for="instruments" class="brtop">Детальний опис</label>
                            <textarea name="instruments" class="form-control" id="instruments"
                                v-model="data.instruments.text" rows="4"
                                disabled
                                v-validate="{ required: false}"
                                data-vv-as="Детальний опис сторінки з інструментами"
                            ></textarea>
                            <span class="errors text-danger" v-if="errors.has('instruments')">Обов'язкове поле</span><br> -->
                            <button :disabled="errors.has('instruments') || errors.has('titleInstruments')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "instruments", "shirtInstruments", "titleInstruments")'>Редагувати</button><br><br>
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
                departments: {text: '', shirt_text: '', title: ''},
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
                        this.data[item.page] = {text: item.text, shirt_text: item.shirt_text, title: item.title}
                    });
                })
        },
        edit(event, page, shirt, title) {
            const textElement = document.getElementById(page);
            const shirtTextElement = document.getElementById(shirt);
            const titleElement = document.getElementById(title);
            if(event.target.innerHTML == "Редагувати") {
                textElement.removeAttribute('disabled');
                shirtTextElement.removeAttribute('disabled');
                titleElement.removeAttribute('disabled');
                textElement.focus();
                event.target.innerHTML = 'Зберегти';
            }
            else {
                textElement.setAttribute('disabled', 'disabled');
                shirtTextElement.setAttribute('disabled', 'disabled');
                titleElement.setAttribute('disabled', 'disabled');
                event.target.innerHTML = 'Редагувати';
                axios.post('/api/page-info', {
                    page,
                    text: this.data[page].text,
                    shirt_text: this.data[page].shirt_text,
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
