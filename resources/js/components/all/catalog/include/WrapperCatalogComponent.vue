<template>
	<div v-if="arrayItems.length" class="row catalog__row pl-0 pl-sm-3 pl-xl-0 justify-content-center justify-content-sm-start ">
		
		<div v-for="item in arrayItems" class="col-10 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-4">
			<ItemComponnet
				:item="item"
			/>
		</div>
		
		
	</div>
</template>

<script>
	import ItemComponnet from "./catalog/ItemComponnet";
    export default {
        components: {
            ItemComponnet
		},
        props: [
		
		],
        data: () => ({
			arrayItems: [],
		}),
		mounted() {
			
			setTimeout(() => {
                this.arrayItems = this.$store.getters.getCatalog
			}, 5)

            // console.log(this.arrayItems)
			
        }
    }
</script>
