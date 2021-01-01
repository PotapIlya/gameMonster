<template>
	<label for="" class="catalogPage__navbar-search d-none d-lg-block">
		<input v-model="search" placeholder="Поиск игр" type="text">
		
		<div class="catalogPage__navbar-search-icon">
			<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="7.66665" cy="7.99819" r="6.66665" stroke="#F59502" stroke-width="2"/>
				<path d="M12.7773 12.4163L17 16.5562" stroke="#F59502" stroke-width="2" stroke-linecap="round"/>
			</svg>
		
		</div>
	</label>
</template>

<script>
    import { mapGetters, mapMutations } from 'vuex'
    export default {
        data: () => ({
            search: '',
		}),
		methods: {
            ...mapMutations([
                'addSearch'
			])
		},
		watch: {
            search(){
                
                this.$store.dispatch('addSearch', this.search)
				
			}
		}
    }
</script>

