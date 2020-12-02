<template>
	<div>
		
		<div class="footer__search-wrapper">
			<input
				   v-model="searchInput"
				   type="text"
				   placeholder="Search"
				   class="searchInput footer__search-input"
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
						<h6 class="header__search-res-title">{{ item.title }}</h6>
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
		props: ['search'],
		data: () => ({
            searchInput: '',
            searchArray: [],
			startArray: [],
            showInput: false,
			status: false,
		}),
        mounted() {
            this.startArray = this.search;
            
            window.addEventListener('click', (e) => {
                if (e.target.closest('.footer__search') === null) {
                    this.searchInput = '';
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
                        if (item.title.toLowerCase().startsWith(this.searchInput.toLowerCase()))
                        {
                            if (this.searchArray.length !== 2)
							{
                                this.searchArray.push(item);
                            }
                        }
					})
                }
            
			}
		},
		methods: {
            showInputFunc()
			{
			    this.showInput = true;
                this.status = true;
			}
		}
    }
</script>
