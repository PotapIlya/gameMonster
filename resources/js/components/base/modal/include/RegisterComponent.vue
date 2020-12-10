<template>
	<div>
		<form @submit.prevent="upload" method="post" class="registration d-flex flex-column">
			<div class="registration__buttons d-flex justify-content-sm-start justify-content-center mb-3">
				<span class="registration__sign-in"
					  @click="changeTitle('login')"
				>{{ translate.btnLogin }}</span>
				<span class="registration__sign-up modal_header_active_text"
					  @click="changeTitle('register')"
				>{{ translate.btnRegister }}</span>
			</div>
			
			<label for="" class="modal-auth-input">
				<input v-model="email" name="login" placeholder="Email" type="email">
				<span class="modal-auth-span">Email</span>
				<ul v-if="errorEmail.length">
					<li v-for="error in errorEmail">
						{{ error[0] }}
					</li>
				</ul>
			</label>
			
			<label for="" class="modal-auth-input">
				<input v-model="password" name="password" :placeholder="translate.inputPassword" type="password">
				<span class="modal-auth-span">{{ translate.inputPassword }}</span>
				<ul v-if="errorPassword.length">
					<li v-for="error in errorPassword">
						{{ error[0] }}
					</li>
				</ul>
			</label>
			
			<label for="" class="modal-auth-input">
				<input v-model="password_confirmation" name="password" :placeholder="translate.inputResetPassword" type="password">
				<span class="modal-auth-span">{{ translate.inputResetPassword }}</span>
			</label>
			
			<div class="forgot d-flex align-items-center">
				<button type="submit" class="registration__enter" style="cursor: pointer; color: #fff;">{{ translate.btnRegister }}</button>
			</div>
			
			<LoginWithComponent :translate="translate" />
		
		</form>
		
		<button @click="closeModal" class="button-close close">&#10006;</button>
	</div>
</template>

<script>
	import LoginWithComponent from "./LoginWithComponent";
    import axios from "axios";

    export default {
        components:{
            LoginWithComponent
		},
        props: ['translate'],
		data: () => ({
            email: '',
            password: '',
            password_confirmation: '',
            url: '/register',


            errorEmail: [],
            errorPassword: [],
		}),
		mounted() {
        
        },
        methods:{
            changeTitle(data){
                this.$emit('changeModal', data)
            },
            closeModal(){
                this.$emit('closeModal')
            },
            upload()
            {
                this.errorPassword.length = 0;
                this.errorEmail.length = 0;

                axios.post(this.url, {
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                })
				.then(response =>{
					if (response.data.success)
					{
                        document.location.href = '/my';
					}
					if (response.data.errors)
					{
						if (response.data.errors.email){
							this.errorEmail.push(response.data.errors.email)
						}
						if (response.data.errors.password){
							this.errorPassword.push(response.data.errors.password)
						}
					}
				})
				.catch(error =>{
					console.log(error)
				})
            }
        },
    }
</script>
