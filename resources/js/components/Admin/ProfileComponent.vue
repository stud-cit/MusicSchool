<template>
    <div>
        <div class="form-group">
            <div class="col-8">
                <label for="email"><h4>Email</h4></label>
                <input type="email" class="form-control" name="email" id="email" v-model="data.email" required
                    v-validate="{ regex: /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/ }">
                <span class="errors text-danger" v-if="errors.has('email')">
                    Введіть дані у форматі name@email.com
                </span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-8">
                <button type="button" :class="editPassword ? 'btn btn-primary' : 'btn btn-light'" @click="editPass">Змінити пароль</button>
            </div>
        </div>

        <div class="form-group" v-if="editPassword">
            <div class="col-8">
                <label for="newPassword"><h4>Новий пароль</h4></label>
                <input type="password" class="form-control" name="newPassword" id="newPassword" v-model="newPassword">
            </div>
        </div>
        <div class="form-group" v-if="editPassword">
            <div class="col-8">
                <label for="repeatPassword"><h4>Повторіть пароль</h4></label>
                <input type="password" class="form-control" name="repeatPassword" id="repeatPassword" v-model="repeatPassword">
                <span class="errors text-danger" v-if="checkPass()">Паролі не співпадають</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-12">
                <button :disabled="!checkNewPassword || errors.any()" class="btn btn-lg btn-success" type="button" @click="save"><i class="glyphicon glyphicon-ok-sign"></i> Зберегти</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "profile",
    data() {
        return {
            data: [],
            password: '',
            newPassword: '',
            repeatPassword: '',
            editPassword: false
        }
    },
    created() {
        this.getUser();
    },
    computed: {
        checkNewPassword() {
            return !this.editPassword || ((this.newPassword == this.repeatPassword) && (this.newPassword != '' || this.repeatPassword != ''))
        }
    },
    methods: {
        checkPass(){
            if (this.newPassword != this.repeatPassword){
                return true;
            }
            else {
                return false;
            }
        },
        getUser() {
            axios.get(`/user/${this.$route.params.id}`)
            .then((response) => {
                this.data = response.data;
                console.log(response.data)
            })
        },
        save() {
            this.data.password = this.newPassword;
            axios.post(`/user/${this.$route.params.id}`, this.data)
            .then(() => {
                swal("Дані збережено", {
                    icon: "success",
                });
                this.editPassword = false;
            }).catch(() => {
                swal({
                    icon: "error",
                    title: 'Помилка',
                    text: 'Не вдалося'
                });
            })
        },
        editPass() {
            this.editPassword = !this.editPassword;
        }
    },
};
</script>

<style scoped></style>
