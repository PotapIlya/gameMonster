<template>
	<div>
		<div class="my-private">Личный кабинет</div>
		
		<div class="row pl-3">
			<div class="my_block_left">
				<div class="my-title mb-4 d-flex align-items-center justify-content-between">
				<span>
					Аккаунт
				</span>
					<!--			<span v-if="statusTitle"-->
					<!--			  style="background: green">-->
					<!--				Обновленно-->
					<!--			</span>-->
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
			
			<div class="my_block_right">
				<div class="my-title mb-4 d-flex align-items-center justify-content-between">
					<span>
						Привязанные аккаунты
					</span>
				</div>
			
				<SocialNetwork
					:services="user_data.services"
				/>
			
			</div>
		</div>
		
	</div>
</template>

<script>
	import InfoComponent from "./InfoComponent";
	import PasswordComponent from "./PasswordComponent";
	import SocialNetwork from "./SocialNetwork";
	
    export default {
        name: "AppComponent",
		props: ['user_data'],
		components: {
            SocialNetwork,
            InfoComponent,
            PasswordComponent
		},
		data: () => ({
            statusTitle: false,
            show: true,
		}),
		mounted()
		{
            // console.log(this.user_data)
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
