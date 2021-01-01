<template>
	<div>
		
		<NavComponent />
		
		<CategoryCartComponent />
		
		<WrapperCatalogComponent />
		
	</div>
</template>

<script>
	import NavComponent from "./include/NavComponent";
	import CategoryCartComponent from "./include/CategoryCartComponent";
	import WrapperCatalogComponent from "./include/WrapperCatalogComponent";
    export default {
        props:[
            'category',
            'oc',
			
			'locale',
			'currency',
			'valutaicon',
			
			'catalog',
			
			'category_image'
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
            this.$store.dispatch('initCurrencyIcon', this.valutaicon)
			
			
            this.$store.dispatch('initCategory', this.category)
            this.$store.dispatch('initOperatingSystem', this.oc)

   
            this.$store.dispatch('initCategoryImg', this.category_image)
			
        },
        data: () => ({
			
		
		}),
		methods: {
  
		},
    }
</script>
