<template>
    <div>
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="col-5">
                    <h3>Школа</h3>
                    <hr>
                    <label for="school" class="brtop">Короткий опис школи</label>
                    <textarea name="school" class="form-control" id="school"
                        v-model="info.school.text" rows="6" maxlength="240"
                        disabled
                        v-validate="{ required: true}"
                        data-vv-as="Короткий опис школи"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('school')">
                        {{ errors.first('school') }}<br>
                    </span>
                    <button :disabled="errors.has('school')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "school")'>Редагувати</button><br><br>
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <h3>Фестиваль</h3>
                    <hr>
                    <label for="fest" class="brtop">Короткий опис фестивалю</label>
                    <textarea name="fest" class="form-control" id="fest"
                        v-model="info.fest.text" rows="6" maxlength="240"
                        disabled
                        v-validate="{ required: true}"
                        data-vv-as="Короткий опис фестивалю"
                    ></textarea>
                    <span class="errors text-danger" v-if="errors.has('fest')">
                        {{ errors.first('fest') }}<br>
                    </span>
                    <button :disabled="errors.has('fest')" type="button" class="btn btn-outline-secondary my-2 px-5 float-right edit" @click='edit($event, "fest")'>Редагувати</button><br><br>
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
                school: {text: ''},
                fest: {text: ''}
            }
        }
    },
	created() {
        document.title = "Опис сайтів";
        this.getInfo();
    },
    methods: {
	    getInfo() {
		    axios.get('/api/site-info')
			    .then((response) => {
                    response.data.map(item => {
                        this.info[item.site] = {text: item.text}
                    });
                })
        },
        edit(event, site) {
            const textElement = document.getElementById(site);
            if(event.target.innerHTML == "Редагувати") {
                textElement.removeAttribute('disabled');
                textElement.focus();
                event.target.innerHTML = 'Зберегти';
            }
            else {
                textElement.setAttribute('disabled', 'disabled');
                event.target.innerHTML = 'Редагувати';
                axios.post('/api/site-info', {
                    site,
                    text: this.info[site].text
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

<style scoped>
    button {
        overflow:hidden;
    }
</style>
