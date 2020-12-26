<template>
	
	
		<a :href="'/key/'+item.url" class="w-100">
			<div class="catalog__wrapper d-flex flex-column">
				<div class="catalog__img">
					<div>
						
						<img
							v-if="item.preloader !== null && item.preloader"
							class="w-100" :src="'/storage/'+item.preloader" alt="">
					
						<img v-else
							 class="w-100" src="/assets/static/img/main/no-image.png" alt="">
					
					</div>
					<div class="catalog__text test">
						
						<div v-if="item.discounts"
							 class="d-flex justify-content-end"
							 style="position: absolute; top: -40px; right: 10px;">
							<div class="rate"> -{{ item.discounts }}% </div>
						</div>
						
						
						<div class="catalog__price">
							
							<div v-if="item.price !== null && item.price" class="new">
								{{ JSON.parse(item.price)[currency] }}
								{{ currencyIcon }}
							</div>
							
							<div v-if="item.old_price !== null && item.old_price" class="old">
								{{ JSON.parse(item.old_price)[currency] }}
								{{ currencyIcon }}
							</div>
							
						</div>
					</div>
<!--					<div class="catalog__tags">-->
<!--						@if($item->novelty)-->
<!--						<span class="catalog__tags-item pink mr-2">-->
<!--                            @lang('template/base.catalogItem.new')-->
<!--                        </span>-->
<!--						@endif-->
<!--						@if($item->exclusive)-->
<!--						<span class="catalog__tags-item pink mr-2">-->
<!--                            @lang('template/base.catalogItem.exclusive')-->
<!--                        </span>-->
<!--						@endif-->
<!--						@if($item->pre_order)-->
<!--						<span class="catalog__tags-item black mr-2">-->
<!--                            @lang('template/base.catalogItem.preOrder')-->
<!--                        </span>-->
<!--						@endif-->
<!--						@if($item->early_access)-->
<!--						<span class="catalog__tags-item black mr-2">-->
<!--                            @lang('template/base.catalogItem.earlyAccess')-->
<!--                        </span>-->
<!--						@endif-->
<!--					</div>-->
<!--				</div>-->
				<div class="mt-1">
					<div class="d-flex align-items-center justify-content-between">
						
						<div v-if="item.title" class="catalog__title">
							{{ item.title }}
						</div>
					
						<div class="catalog__playground mr-0 mr-lg-4">
							<img class="mw-100" src="/assets/static/img/main/icon/steam.svg" alt="">
						</div>
					</div>
					
					
<!--					<div v-if="item.category.length" class="catalog__category">-->
<!--						<span v-for="category in item.category" class="catalog__category-item mr-2">-->
<!--							{{ category.name }}-->
<!--						</span>-->
<!--					</div>-->
					
				</div>
			</div>
			</div>
		</a>
	
</template>

<script>
    export default {
		props: [
			'item',
		],
		data: () => ({
			locale: '',
            currency: '',
            currencyIcon: '',
		}),
		mounted() {
           
            
            setTimeout(() => {
                this.locale = this.$store.getters.getLocale;
                this.currency = this.$store.getters.getCurrency;
                this.currencyIcon = this.$store.getters.getCurrencyIcon;

                // console.log(this.currency)
                // console.log( JSON.parse(this.item.price)['USD'] )
                
			}, 5)
			
        }
    }
</script>

