<template>
	<div class="modal my__modal" :class="{ 'd-block' : show }">
		<div class="global-wrap">
			<div class="modal-wrap modal__wrap d-flex flex-column">
				
				<h1 class="modal__wrap-title">
					Отвязать аккаунт<br>
					{{ item.type }}?
				</h1>
				
				<div class="d-flex align-items-center">
					<button @click="send" class="my__btn my__btn-untie">
						<PulseLoader v-if="loader" />
						<span v-else>
							Отвязать
						</span>
					</button>
					<button @click="ChangeShow" class="my__btn">
						Отмена
					</button>
				</div>
				
				<button @click="ChangeShow" class="button-close close">&#10006;</button>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
    export default {
	    components: {
            PulseLoader
		},
        props: [
            'show',
			'item',
			'index'
		],
        data: () => ({
			url: '/api/my/deleteServices',
			loader: false,
		}),
		mounted()
		{
		    const wrapper = document.querySelector('.global-wrap')
		    
			window.addEventListener('click', (e) => {
			   if (e.target === wrapper)
			   {
			       this.ChangeShow();
			   }
			})
        },
        methods: {
            send()
			{
			    if (this.item !== null)
				{
                    this.loader = true;
                    axios.post(this.url, {
                        id: this.item.id,
                    })
					.then(response =>
					{
					    if (response.data.success)
						{
                            this.loader = false;
                            this.$emit('ChangeShowSuccess', {
                                'index' : this.index,
                                'item' : this.item,
							});
						}
						else{
                            this.ChangeShow();
                            this.loader = false;
						}
					})
					.catch(error => {
						this.ChangeShow();
                        this.loader = false;
					})
			}
    
			},
            ChangeShow()
			{
                this.$emit('ChangeShow')
			}
		}
    }
</script>
