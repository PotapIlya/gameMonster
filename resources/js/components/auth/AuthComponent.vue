<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Register</div>
					
					<div class="card-body">
						<form @submit.prevent="upload">
							
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
								
								<div class="col-md-6">
									<input id="email" v-model="email" type="email" class="form-control" name="email" value="" required autocomplete="email">
									
									<span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
									
								</div>
							</div>
							
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
								
								<div class="col-md-6">
									<input id="password" type="password" class="form-control" v-model="password" name="password" required autocomplete="new-password">
									
									<span class="invalid-fedback" role="alert">
                                        <strong></strong>
                                    </span>
								
								</div>
							</div>
							
							<div class="form-group row">
								<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
								
								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>
							
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										Register
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'
    export default {
        name: "AuthComponent",
		data: () => ({
            email: '',
            password: '',
            password_confirmation: '',
			url: '/register'
		}),
		methods: {
            upload()
			{
                axios.post(this.url, {
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
				})
				.then(response =>{
                    console.log(response.data)
				})
				.catch(error =>{
					console.log(error)
				})
			}
		}
    }
</script>
