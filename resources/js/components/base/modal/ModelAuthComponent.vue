<template>
	<div class="modal modal-auth" :class="{ 'd-block' : status }">
		<div class="global-wrap">
			<div class="modal-wrap">
				
				
				<div v-if="statusModals === 'login' ">
					<LoginComponent
						@changeModal="changeModal"
						@closeModal="closeModal"
					/>
				</div>
			
				<div v-if="statusModals === 'register'">
					<RegisterComponent
						@changeModal="changeModal"
						@closeModal="closeModal"
					/>
				</div>
				
			
			</div>
		</div>
	</div>
</template>

<script>
	import LoginComponent from "./include/LoginComponent";
	import RegisterComponent from "./include/RegisterComponent";
    export default {
        name: "ModelAuthComponent",
		components: {
            LoginComponent,
            RegisterComponent
		},
		props: [
		    'statusModal',
			'statusClose'
		],
		data: () => ({
            statusModals: '',
            status: true,
		}),
		watch: {
            statusClose()
			{
			    this.status = true;
			},
		},
		mounted() {
            this.statusModals = this.statusModal
        },
        methods: {
            changeModal(data)
			{
			    this.statusModals = data;
			},
            closeModal()
			{
			    this.status = false
			}
		}
    }
</script>
