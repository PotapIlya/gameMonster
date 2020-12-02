<template>
	<div class="header__auth">
		<div class="d-flex align-items-center">
			<div class="header__auth-item openAuth"
				@click="changeModal('login')"
			>
				Sign in
			</div>
			<div class="header__inclined mx-1">/</div>
			<div class="header__auth-item openAuth"
				 @click="changeModal('register')"
			>
				Registration
			</div>
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
