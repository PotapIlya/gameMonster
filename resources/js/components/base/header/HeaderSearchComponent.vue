<template>
	<div
			:class="{'headerStatusActive': headerStatusActive, 'headerArrayActive': searchArray.length }"
	>
		
		<div @click="showInputFunc" class="header__search-btn">
			<button class="button">{{ translate }}</button>
		</div>
		
		<div v-show="showInput" class="header__search-label">
			<input
				   v-model="searchInput"
				   type="text"
				   :placeholder="translate"
				   class="searchInput"
				   />
		</div>
		
		
		<ul
			v-show="searchArray.length"
			class="header__search-res py-2 px-3">
			
			<li v-for="item in searchArray" class="d-flex justify-content-between mb-3">
				<a :href="'/key/'+item.url" class="d-flex align-items-center">
					<div class="header__search-res-img col-3 mr-2 px-0">
						<img v-if="item.preloader !== null" class="mw-100" :src="'/storage/'+item.preloader" alt="">
						<img v-else class="mw-100" src="/assets/static/img/main/no-image.png" alt="">
					</div>
					<div>
						<h6 class="header__search-res-title">{{ JSON.parse(item.title)[lang] }}</h6>
						<div class="header__search-res-price my-1">
							<span class="new mr-1">{{ item.price }}</span>
							<span class="old">{{ item.old_price }}</span>
						</div>
						<div v-show="item.category.length" class="header__search-res-category">
							<span v-for="cat in item.category">
								{{ cat.name }}
							</span>
						</div>
					</div>
				</a>
				<div>
					<img src="/assets/static/img/services/steam.png" alt="">
				</div>
			</li>
			
		</ul>
	</div>
</template>

<script>
    export default {
        name: "SearchComponent",
		props: [
            'search',
            'locale',
			'translate'
		],
		data: () => ({
            searchInput: '',
            searchArray: [],
			startArray: [],
            showInput: false,
			lang: 'en',
			
			headerStatusActive: false
		}),
        mounted() {
            this.startArray = this.search;
            this.lang = this.locale;
			
			window.addEventListener('click', (e) => {
                if (e.target.closest('.headerStatusActive') === null) {
                    this.searchInput = '';
                    this.showInput = false;
                }
			})
			
      
        },
		
		watch:{
            searchInput()
			{
			    
                this.searchArray.length = 0;
			    if (this.startArray.length && this.searchInput.length)
				{
                    this.startArray.map( item =>{
                        if (JSON.parse(item.title)[this.lang].toLowerCase().startsWith(this.searchInput.toLowerCase()))
                        {
                            this.searchArray.push(item);
                        }
					})
                }
            
			}
		},
		methods: {
            showInputFunc()
			{
			    this.showInput = true;
			    this.headerStatusActive = true;
			}
		}
    }
</script>
