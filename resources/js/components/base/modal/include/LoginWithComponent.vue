<template>
	<div>
		<a href="#" class="registration__enter-help d-block">{{ translate.loginWith }}</a>
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
	</div>
</template>

<script>
    export default {
        props: ['translate']
    }
</script>
