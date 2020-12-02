<template>

	<form @submit.prevent="upload" method="post" class="personal-data-form d-flex flex-column mb-4 mb-md-0">
		<label class="personal-label" for="">
			<input
					v-model="login"
					class="personal-data"
					type="text"
					placeholder="Login"
					required>
			<span>
				Login
			</span>
			<ul v-if="errorsLogin.length">
				<li v-for="error in errorsLogin">
					{{ error[0] }}
				</li>
			</ul>
		</label>
		<label class="personal-label" for="">
			<input
					id="formEmail"
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
					placeholder="Phone"
					required>
			<span>
				Phone
			</span>
			<ul v-if="errorsPhone.length">
				<li v-for="error in errorsPhone">
					{{ error[0] }}
				</li>
			</ul>
		</label>
		<div>
			<input class="button" type="submit" value="Save">
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
            url: '/api/my/updateInfo',

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
				.then(response =>
				{
					if (response.data.success)
					{
					   this.$emit('changeStatus');
					}
				})
				.catch(error =>
				{
					if (error.response.data.errors.login){
						this.errorsLogin.push(error.response.data.errors.login)
					}
					if (error.response.data.errors.email){
						this.errorsEmail.push(error.response.data.errors.email)
					}
					if (error.response.data.errors.phone){
						this.errorsPhone.push(error.response.data.errors.phone)
					}
				})
            }

        }
    }
</script>
