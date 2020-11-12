<template>
	<div class="header__auth">
		<div class="d-none d-xl-flex align-items-center">
			<div class="header__auth-item openAuth"
				@click="changeModal('login')"
			>
				Вход
			</div>
			<div class="header__inclined mx-1">/</div>
			<div class="header__auth-item openAuth"
				 @click="changeModal('register')"
			>
				Регистрация
			</div>
		</div>
		<div class="d-block d-xl-none">
			<button class="btn_mobile openAuth"
				@click="changeModal('login')"
			>
				Войти
			</button>
		</div>
		
		<ModelAuthComponent
			v-if="statusModal.length"
			:statusModal="statusModal"
			:statusClose="statusClose"
		/>
		
	</div>
</template>

<script>
	import ModelAuthComponent from "./ModelAuthComponent";
    export default {
        name: "ButtonsAuthComponent",
		components: {
            ModelAuthComponent
		},
		data: () => ({
			statusModal: '',
            statusClose: false,
		}),
		mounted() {
        
        },
        methods:{
            changeModal(name)
			{
                this.statusClose = !this.statusClose
                this.statusModal = name
			}
		}
    }
</script>
