<template>
	<div class="modal-wrap modal__wrap d-flex flex-column">
		
		<h1 class="modal__wrap-title">
			Add balance
		</h1>
		<span class="balance__text">
			Payments are accepted through payment card <br>
RoboKassa system
		</span>
		
		<div>
			
			<div class="d-flex align-items-center">
				<label for="" class="balance__label">
					<input v-model="money" placeholder="Enter the price" type="number" class="mr-2" name="money" required>
					<ul v-if="errorMoney.length"
						v-for="item in errorMoney">
						<li>{{ item[0] }}</li>
					</ul>
				</label>
				
			</div>
			<ul class="d-flex flex-column flex-sm-row align-items-center justify-content-between">
				<li class="balance__list col-12 col-sm-4 d-flex justify-content-center align-items-center pl-0 mb-2 mb-sm-0">
					<input
							v-model="name"
							class="balance__list-input d-none"
							id="balance__pay1"
							name="pay"
							value="paypal"
							type="radio">
					<label for="balance__pay1" class="balance__list-pay d-flex justify-content-center align-items-center">
						<img src="/assets/static/img/pay/modalPaypal.png" alt="">
					</label>
				</li>
				<li class="balance__list col-12 col-sm-4 d-flex justify-content-center align-items-center pl-0 mb-2 mb-sm-0">
					<input
							v-model="name"
							class="balance__list-input d-none"
							id="balance__pay2"
							name="pay"
							value="qiwi"
							type="radio"
					>
					<label for="balance__pay2" class="balance__list-pay d-flex justify-content-center align-items-center">
						<img src="/assets/static/img/pay/modalQiwi.png" alt="">
					</label>
				</li>
				<li class="balance__list col-12 col-sm-4 d-flex justify-content-center align-items-center pl-0">
					<input
							v-model="name"
							class="balance__list-input d-none"
							id="balance__pay3"
							name="pay"
							value="payeer"
							type="radio">
					<label for="balance__pay3" class="balance__list-pay d-flex justify-content-center align-items-center">
						<img src="/assets/static/img/pay/modalPayeer.png" alt="">
					</label>
				</li>
			</ul>
			<ul v-if="errorPay.length"
				v-for="item in errorPay">
				<li>{{ item[0] }}</li>
			</ul>
		
			
			<div class="">
				<button @click="send" class="balance__btn">
					<PulseLoader v-if="loader" />
					<span v-else>Proceed</span>
				</button>
			</div>
		
		
		</div>
		
		<button class="button-close close">&#10006;</button>
	</div>
</template>

<script>
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
	import axios from 'axios'
    export default {
        components:{
            PulseLoader
		},
	    data: () => ({
            money: null,
            name: null,
			url: '/balance',
			loader: false,
			
			errorMoney: [],
			errorPay: [],
		}),
		mounted() {
	       
        },
		methods: {
	        send()
			{
			    if (this.money !== null && this.name !== null)
				{
				    this.errorMoney.length = 0;
				    this.errorPay.length = 0;
				    this.loader = true;
				    
				    axios.post(this.url, {
				        money: this.money,
                        name: this.name,
					})
					.then(response =>
					{
					    if (response.data.success)
						{
						    this.loader = false;
                            window.open(response.data.success, '_blank');
                            // window.location.href = response.data.success;
						}
                        if (response.data.error)
                        {
                            this.loader = false;
                        }
					})
					.catch(error =>
					{
					    if (error.response.data.errors.money) {
						    this.errorMoney.push(error.response.data.errors.money)
						}
                        if (error.response.data.errors.name) {
                            this.errorPay.push(error.response.data.errors.name)
                        }
                        this.loader = false
					})
				}
			}
		},
    }
</script>

