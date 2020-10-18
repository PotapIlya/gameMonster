<template>
	<div class="modal modal-auth" data-type="login">
		<div class="global-wrap">
			<div class="modal-wrap">
				<form method="post" class="registration d-flex flex-column">
					<div class="registration__buttons d-flex justify-content-sm-start justify-content-center mb-3">
						<a href="#" class="registration__sign-in modal_header_active_text">Вход</a>
						<a href="#" class="registration__sign-up">Регистрация</a>
					</div>
					
					<label for="" class="modal-auth-input">
						<input name="login" placeholder="Login" type="text">
						<span class="modal-auth-span">Логин</span>
					</label>
					
					<label for="" class="modal-auth-input">
						<input name="password" placeholder="Password" type="text">
						<span class="modal-auth-span">Пароль</span>
					</label>
					
					
					<div class="forgot d-flex align-items-center">
						<a href="#" class="registration__enter">Войти</a>
						<a href="#" class="registration__forgot">Забыли пароль?</a>
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
							<img src="/assets/static/img/services/vk.png" alt="vk">
						</a>
						<a href="/login/facebook" class="service4">
							<img src="/assets/static/img/services/facebook.png" alt="facebook">
						</a>
					</div>
				</form>
				<button class="button-close close">&#10006;</button>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        name: "LoginComponent"
    }
</script>
