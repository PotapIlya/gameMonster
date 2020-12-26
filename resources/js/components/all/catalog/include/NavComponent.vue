<template>
	<div class="catalogPage__navbar d-flex align-items-center justify-content-between">
		
		
		
		<div class="catalogPage__navbar-wrapper d-flex align-items-center">
			
			<AllGameComponent />
			
			<OperatingSystemComponent
			
				
			/>
			
			<PriceComponent
			
			/>
		
		</div>
		
		<SearchComponent />
	
	</div>
</template>

<script>
    import AllGameComponent from "./nav/AllGameComponent";
    import OperatingSystemComponent from "./nav/OperatingSystemComponent";
    import PriceComponent from "./nav/PriceComponent";
    import SearchComponent from "./nav/SearchComponent";

    export default {
        props:[
        
        ],
        components: {
            AllGameComponent,
            OperatingSystemComponent,
            PriceComponent,
            SearchComponent
        },
        mounted() {
            // console.log(this.currency)
        },
        data: () => ({


        }),
        methods: {

        },
    }
</script>

