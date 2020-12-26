<template>
	<div class="catalogPage__navbar-item">
		<button @click="changeShow" type="button" class="catalogPage__navbar-item-top d-flex align-items-center">
		   <span>
				Операционная система
			</span>
			<svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 5L4 8L7 5" stroke="#C4C4C4" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		
		<div
			:class="{ 'active' : showForm }"
			class="catalogPage__navbar-item-bottom flex-column">
			
			<div class="catalogPage__navbar-item-bottom-title d-flex align-items-center justify-content-between">
				<span>
					Выберете жанр
				</span>
				<button @click="reset" class="catalogPage__navbar-item-bottom-reset">
					Сбросить
				</button>
			</div>
			
			<ul v-if="category !== null && category.length">
				<li
						v-for="(item, index) in category"
						class=catalogPage__navbar-item-bottom-label>
					<input
							class="d-none"
							:value="item.name"
							v-model="inputCheckbox"
							:id=" 'checkbox_'+index"
							type="checkbox"
					>
					<label
							:for=" 'checkbox_'+index"
						>
						{{ JSON.parse(item.name)[locale] }}
					</label>
				</li>
			</ul>
			
		</div>
	</div>
</template>

<script>
    export default {
        props: [
        
		],
        data: () => ({
			showForm: false,
            inputCheckbox: [],
			locale: '',
            category: null,
		}),
		watch: {
            inputCheckbox(){
                console.log(this.inputCheckbox)
			}
		},
		mounted() {
            setTimeout(() => {
                this.locale = this.$store.getters.getLocale;
                this.category = this.$store.getters.getCategory;

                // console.log(this.category)
                
            }, 5)
        },
        methods: {
            reset()
			{
			    this.inputCheckbox.length = 0;
                // this.inputCheckbox = false;
			},
            changeShow()
			{
			    this.showForm = !this.showForm
			}
		}
    }
</script>

