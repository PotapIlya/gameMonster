<template>
	<form @submit.prevent="update" method="post" class="personal-data-form personal-data-form2 d-flex flex-column">
		
		<label for="">
			<input
					v-model="oldPassword"
					class="personal-data" type="password" :placeholder="translate.oldPassword" >
			<ul v-if="errorsOldPassword.length">
				<li v-for="error in errorsOldPassword">
					{{ error[0] }}
				</li>
			</ul>
		</label>
		<label for="">
			<input
					v-model="password"
					class="personal-data" type="password" :placeholder="translate.newPassword" >
			<ul v-if="errorsPassword.length">
				<li v-for="error in errorsPassword">
					{{ error[0] }}
				</li>
			</ul>
		</label>
		<label for="">
			<input
					v-model="password_confirmation "
					class="personal-data" type="password" :placeholder="translate.repeatPassword" >
		</label>
		<div>
			<button type="submit" class="button">{{ translate.repeatPassword }}</button>
<!--			<input class="button" type="submit" value="Update password">-->
		</div>
	</form>
</template>

<script>
    import axios from "axios";
    export default {
        name: "PasswordComponent",
		props: ['translate'],
        data: () => ({
            url: '/my/updatePassword',

            oldPassword: '',
            password: '',
            password_confirmation: '',

            errorsOldPassword: [],
            errorsPassword: [],
        }),
		methods: {
            update()
			{
			    this.errorsOldPassword.length = 0;
			    this.errorsPassword.length = 0;
			    
			    axios.post(this.url, {
                    oldPassword: this.oldPassword,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
				})
				.then(response =>{
				    if (response.data.success)
					{
                        this.$emit('changeStatus')
					
						this.oldPassword = '';
						this.password = '';
						this.password_confirmation = '';
					}
					if (response.data.errors)
					{
                        console.log(response.data.errors)
					}
				 
				})
				.catch(error =>
				{
					
                    if (error.response.data.errors.oldPassword)
                    {
                        this.errorsOldPassword.push(error.response.data.errors.oldPassword)
                    }
                    if (error.response.data.errors.password)
                    {
                        this.errorsPassword.push(error.response.data.errors.password)
                    }
				})
			}
		}
    }
</script>
