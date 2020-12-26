<template>
	<div>
		<NavComponent
		
			
		/>
		<CategoryCartComponent />
		
		
		<WrapperCatalogComponent
		
		/>
	</div>
</template>

<script>
	import NavComponent from "./include/NavComponent";
	import CategoryCartComponent from "./include/CategoryCartComponent";
	import WrapperCatalogComponent from "./include/WrapperCatalogComponent";
    export default {
        props:[
            'category',
			'locale',
			'currency',
			'valutaIcon',
			
			'catalog'
		],
        components: {
            NavComponent,
            CategoryCartComponent,
            WrapperCatalogComponent
		},
		mounted() {
			
            
            this.$store.dispatch('initCatalog', this.catalog)
            this.$store.dispatch('initLocale', this.locale)
            this.$store.dispatch('initCurrency', this.currency)
            this.$store.dispatch('initCurrencyIcon', this.valutaIcon)
			
			
            this.$store.dispatch('initCategory', this.category)
			
			
        },
        data: () => ({
			
		
		}),
		methods: {
  
		},
    }
</script>
