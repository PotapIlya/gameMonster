<template>
	<div class="header__auth">
		<div class="d-flex align-items-center">
			<div class="header__auth-item openAuth"
				@click="changeModal('login')"
			>
				{{ translate.btnLogin }}
			</div>
			<div class="header__inclined mx-1">/</div>
			<div class="header__auth-item openAuth"
				 @click="changeModal('register')"
			>
				{{ translate.btnRegister }}
			</div>
		</div>
		
		<ModelAuthComponent
			v-if="statusModal.length"
			:statusModal="statusModal"
			:statusClose="statusClose"
			:translate="translate"
		/>
		
	</div>
</template>

<script>
	import ModelAuthComponent from "./ModelAuthComponent";
    export default {
        props: ['translate'],
		components: {
            ModelAuthComponent
		},
		data: () => ({
			statusModal: '',
            statusClose: false,
		}),
		watch: {
        
        },
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
