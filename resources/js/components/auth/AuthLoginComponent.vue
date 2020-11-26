<template>
	<div class="modal d-block" style="position: relative; background:transparent;">
		<div class="global-wrap" style="height: 48vh">
			<div class="modal-wrap">
				
				<form @submit.prevent="upload" method="POST" class="registration d-flex flex-column" style="background:transparent;">
					<div class="registration__buttons d-flex justify-content-start align-items-center mb-3">
						<a href="/login" class="registration__sign-in modal_header_active_text">Вход</a>
						<a href="/register" class="registration__sign-up">Регистрация</a>
					</div>
					
					<label for="" class="modal-auth-input">
						<input
								id="email"
								name="email"
								placeholder="Email"
								type="text"
								v-model="email"
						>
						<span class="modal-auth-span">Логин</span>
						<ul v-if="errorEmail.length">
							<li v-for="error in errorEmail">
								{{ error[0] }}
							</li>
						</ul>
					</label>
					
					<label for="" class="modal-auth-input">
						<input
								v-model="password"
								id="password"
								name="password"
								placeholder="Password"
								type="password"
						>
						<span class="modal-auth-span">Пароль</span>
						<ul v-if="errorPassword.length">
							<li v-for="error in errorPassword">
								{{ error[0] }}
							</li>
						</ul>
					</label>
					
					
					<div class="forgot d-flex flex-row align-items-center">
						<button type="submit" class="registration__enter">Войти</button>
						<a href="/password/reset" class="registration__forgot">Забыли пароль?</a>
					</div>
					<a href="#" class="registration__enter-help">Войти с помощью</a>
					<div class="registration__services d-flex justify-content-start align-items-center">
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
			</div>
		</div>
	</div>
</template>

<script>
    import axios from "axios";
    export default {
        name: "Login",
        data: () => ({
            email: '',
            password: '',
            url: '/login',

            errorPassword: [],
            errorEmail: [],
        }),
        methods: {
            upload()
            {
                this.errorPassword.length = 0;
                this.errorEmail.length = 0;
				
                axios.post(this.url, {
                    email: this.email,
                    password: this.password,
                })
				.then(response =>{

					if (response.data.success)
					{
						document.location.href = '/my';
					}
					if (response.data.errors)
					{
						if (response.data.errors.password){
							this.errorPassword.push(response.data.errors.password)
						}
						if (response.data.errors.email){
							this.errorPassword.push(response.data.errors.email)
						}
					}
				})
				.catch(error =>{
					console.log(error)
				})
            }
        }
    }
</script>

