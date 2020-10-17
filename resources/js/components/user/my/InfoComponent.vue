<template>

	<form @submit.prevent="upload" method="post" class="personal-data-form d-flex flex-column mb-4 mb-md-0">
		<label class="personal-label" for="">
			<input
					v-model="login"
					class="personal-data"
					type="text"
					placeholder="Логин"
					required>
			<span>
				Никнейм
			</span>
			<ul v-if="errorsLogin.length">
				<li v-for="error in errorsLogin">
					{{ error[0] }}
				</li>
			</ul>
		</label>
		<label class="personal-label" for="">
			<input
					v-model="email"
					class="personal-data"
					type="email"
					placeholder="Email"
					required
			>
			<span>
				Email
			</span>
			<ul v-if="errorsEmail.length">
				<li v-for="error in errorsEmail">
					{{ error[0] }}
				</li>
			</ul>
		</label>
		<label class="personal-label" for="">
			<input
					v-model="phone"
					class="personal-data"
					type="number"
					placeholder="Телефон"
					required>
			<span>
				Телефон
			</span>
			<ul v-if="errorsPhone.length">
				<li v-for="error in errorsPhone">
					{{ error[0] }}
				</li>
			</ul>
		</label>
		<div>
			<input class="button" type="submit" value="Сохранить изменения">
		</div>
	</form>
	
</template>

<script>
    import axios from "axios";
    export default {
        name: "InfoComponent",
        props: [
            'user_data'
        ],
        data: () => ({
            user: {},
            url: '/my/updateInfo',

            login: '',
            email: '',
            phone: '',

            errorsLogin: [],
            errorsEmail: [],
            errorsPhone: [],


        }),
        mounted() {
            this.user = this.user_data

            this.login = this.user.login
            this.email = this.user.email
            this.phone = this.user.phone


            console.log(this.user.phone)
        },
        methods: {

            upload()
            {
                this.errorsLogin.length = 0;
                this.errorsEmail.length = 0;
                this.errorsPhone.length = 0;

                axios.post(this.url, {
                    login: this.login,
                    email: this.email,
                    phone: this.phone,

                })
                    .then(repsonse =>
                    {
                        if (repsonse.data.success)
                        {
                           this.$emit('changeStatus')

                        }
                        if (repsonse.data.errors)
                        {
                            if (repsonse.data.errors.login){
                                this.errorsLogin.push(repsonse.data.errors.login)
                            }
                            if (repsonse.data.errors.email){
                                this.errorsEmail.push(repsonse.data.errors.email)
                            }
                            if (repsonse.data.errors.phone){
                                this.errorsPhone.push(repsonse.data.errors.phone)
                            }
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }

        }
    }
</script>
