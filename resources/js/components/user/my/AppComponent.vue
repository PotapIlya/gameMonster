<template>
	<section class="my mb-5">
		<div class="container">
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
					@changeStatus = updateTitle
				/>
				
			</div>
		</div>
	</section>
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
		}),
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
