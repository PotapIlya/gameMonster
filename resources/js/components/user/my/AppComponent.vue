<template>
	<div>
		<div class="my-private">Личный кабинет</div>
		<div class="my-title mb-4 d-flex align-items-center justify-content-between">
				<span>
					Аккаунт
				</span>
			<span v-if="statusTitle"
				  style="background: green">
					Обновленно
				</span>
		</div>
		<div class="my-form d-flex flex-column flex-md-row">
			
			<InfoComponent
					:user_data="user_data"
					@changeStatus = updateTitle
			/>
			
			<PasswordComponent
					v-if="show"
					@changeStatus = updateTitle
			/>
		
		</div>
	</div>
</template>

<script>
	import InfoComponent from "./InfoComponent";
	import PasswordComponent from "./PasswordComponent";
    export default {
        name: "AppComponent",
		props: ['user_data'],
		components: {
            InfoComponent,
            PasswordComponent
		},
		data: () => ({
            statusTitle: false,
            show: true,
		}),
		mounted()
		{
		    if (this.user_data.authentication_id)
			{
                this.show = false;
			}
        },
        methods:{
            updateTitle()
			{
			    // отложенно до лучших времен
                this.statusTitle = true;

                setTimeout(() => this.statusTitle = false , 2500)
			}
		}
    }
</script>
