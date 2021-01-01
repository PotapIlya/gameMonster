<template>
	<div class="catalogPage__navbar-item">
		<button @click="showList" type="button" class="catalogPage__navbar-item-top d-flex align-items-center">
		   <span>
				Цена
			</span>
			<svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 5L4 8L7 5" stroke="#C4C4C4" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		
		<div
			:class="{ 'active' : getShowList === 2 }"
			class="catalogPage__navbar-item-bottom flex-column">
			
			<div class="catalogPage__navbar-item-bottom-title d-flex align-items-center justify-content-between mb-2F59502">
				<span>
					От {{ value[0] }}{{ getCurrencyIcon }} до {{ value[1] }}{{ getCurrencyIcon }}
				</span>
				<button @click="reset" class="catalogPage__navbar-item-bottom-reset">
					Сбросить
				</button>
			</div>
			
			<div>
				<vue-slider
						v-model="value"
						:interval="1"
						:enable-cross="false"
						:drag-on-click="true"
						:process="true"
				/>
			</div>
		
		</div>
	</div>
</template>

<script>
    import { mapGetters, mapMutations } from 'vuex'
    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/antd.css'
    export default {
        components:{
            VueSlider
		},
		props: ['currency'],
        data: () => ({
			value: [0, 100],
            currencyIcon: '',
            showForm: false,
			
			defaultValue: [0, 100],
        }),
		watch:{
            value()
			{
                this.$store.dispatch('setPrice', this.value);
                // console.log( this.value )
			}
		},
		computed: {
            ...mapGetters([
                'getCurrencyIcon',
				'getShowList'
			])
		},
		mounted() {
            // setTimeout(() => {
            //     this.currencyIcon = this.$store.getters.getCurrencyIcon;
            // }, 5)
        },
        methods: {
            ...mapMutations([
                'setPrice',
				'showList',
				'resetStorage'
			]),
            showList()
            {
                this.$store.dispatch('showList', 2)
                // this.showForm = !this.showForm
            },
            reset()
			{
			    this.$store.dispatch('resetStorage', 'price')
			    this.value = this.defaultValue;
			}
        }
    }
</script>


<style>
	.vue-slider{
		height: 2px;
	}
	.vue-slider:hover .vue-slider-rail{
		background: #4f4f4f
	}
	
	.vue-slider:hover .vue-slider-process{
		background: #F59502
	}
	.vue-slider-rail{
		background: #4f4f4f;
	}
	.vue-slider-process{
		background-color: #F59502;
	}
	.vue-slider-dot{
		width: 20px !important;
		height: 20px !important;
		border-radius: 50% !important;
	}
	.vue-slider-dot-handle{
		background-color: #F59502 !important;
		border: 3px solid #6F6F6F !important;
		box-shadow: 0 1px 4px rgba(0, 0, 0, 0.09) !important;
	}
</style>