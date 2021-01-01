<template>
	<div class="catalogPage__navbar-item">
		<button @click="showList"  type="button" class="catalogPage__navbar-item-top d-flex align-items-center">
		   <span>
			   Все игры
			</span>
			<svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 5L4 8L7 5" stroke="#C4C4C4" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		
		<div
				:class="{ 'active' : getShowList === 0 }"
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
							v-model="inputCheckbox"
							class="d-none"
							:value="item.id"
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
    import { mapGetters, mapMutations } from 'vuex'
    export default {
        props: [

        ],
        data: () => ({
            inputCheckbox: [],
            locale: '',
            category: null,
        }),
        watch: {
            inputCheckbox(data)
			{
                this.$store.dispatch('setCategory', data);
                // console.log(data, 'data')
                // console.log(this.inputCheckbox)
            }
        },
        computed:{
            ...mapGetters([
                'getResultSend',
				'getShowList'
            ]),
        },
        mounted() {
            setTimeout(() => {
                this.locale = this.$store.getters.getLocale;
                this.category = this.$store.getters.getCategory;

            }, 5)
        },
        methods: {
            ...mapMutations([
                'setCategory',
				'showList'
            ]),
            reset()
            {
                // this.inputCheckbox.length = 0;
                // this.inputCheckbox = false;
            },
            showList()
            {
                this.$store.dispatch('showList', 0)
            }
        }
    }
</script>

