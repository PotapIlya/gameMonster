<template>
	<div>
		<form @submit.prevent="upload" method="post" class="registration d-flex flex-column">
			<div class="registration__buttons d-flex justify-content-sm-start justify-content-center mb-3">
				<span class="registration__sign-in"
					  @click="changeTitle('login')"
				>Вход</span>
				<span class="registration__sign-up modal_header_active_text"
					  @click="changeTitle('register')"
				>Регистрация</span>
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
				<input v-model="password" name="password" placeholder="Password" type="password">
				<span class="modal-auth-span">Пароль</span>
				<ul v-if="errorPassword.length">
					<li v-for="error in errorPassword">
						{{ error[0] }}
					</li>
				</ul>
			</label>
			
			<label for="" class="modal-auth-input">
				<input v-model="password_confirmation" name="password" placeholder="Password" type="password">
				<span class="modal-auth-span">Повторите пароль</span>
			</label>
			
			<div class="forgot d-flex align-items-center">
				<button type="submit" class="registration__enter" style="cursor: pointer; color: #fff;">Зарегистрироваться</button>
			</div>
			<a href="#" class="registration__enter-help">Войти с помощью</a>
			<div class="registration__services d-flex align-items-center">
				<a href="/login/steam" class="service1">
					<img src="/assets/static/img/services/steam.png" alt="steam">
				</a>
				<a href="/login/google" class="service2 mr-2 ml-4">
					<img src="/assets/static/img/services/google.png" alt="google">
				</a>
				<a href="/login/vkontakte" class="service3 mr-4 ml-2">
					<img src="/assets/static/img/services/vkontakte.png" alt="vk">
				</a>
				<a href="/login/facebook" class="service4">
					<img src="/assets/static/img/services/facebook.png" alt="facebook">
				</a>
			</div>
		</form>
		
		<button @click="closeModal" class="button-close close">&#10006;</button>
	</div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "RegisterComponent",
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
