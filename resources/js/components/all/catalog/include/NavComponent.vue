<template>
	<div class="catalogPage__navbar d-flex align-items-center justify-content-between">
		
		
		
		<div class="catalogPage__navbar-wrapper d-flex align-items-center">
			
			<AllGameComponent />
			
			<OperatingSystemComponent/>
			
			<PriceComponent />
			
			<button @click="$store.dispatch('sendAxios')"
					class="h1 btn btn-primary" type="button">SEND</button>
		
		</div>
		
		<SearchComponent />
	
	</div>
</template>

<script>
    import AllGameComponent from "./nav/AllGameComponent";
    import OperatingSystemComponent from "./nav/OperatingSystemComponent";
    import PriceComponent from "./nav/PriceComponent";
    import SearchComponent from "./nav/SearchComponent";
    import { mapGetters, mapMutations } from 'vuex'
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
            ...mapMutations([
                'sendAxios'
			])
        },
    }
</script>

