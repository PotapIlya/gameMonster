<template>
	<div class="catalogPage__navbar d-flex align-items-center justify-content-between">
		
		
		
		<div class="catalogPage__navbar-wrapper d-flex align-items-center">
			
			<AllGameComponent />
			
			<OperatingSystemComponent
				:category="category"
			/>
			
			<PriceComponent />
			
		</div>
		
		<SearchComponent />
		
	</div>
</template>

<script>
	import AllGameComponent from "./include/AllGameComponent";
	import OperatingSystemComponent from "./include/OperatingSystemComponent";
	import PriceComponent from "./include/PriceComponent";
	import SearchComponent from "./include/SearchComponent";
    export default {
        props:[
            'category'
		],
        components: {
            AllGameComponent,
            OperatingSystemComponent,
            PriceComponent,
            SearchComponent
		},
        data: () => ({
			
		
		}),
		methods: {
  
		},
    }
</script>
