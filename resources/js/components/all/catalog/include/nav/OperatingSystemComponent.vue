<template>
	<div class="catalogPage__navbar-item">
		<button @click="showList" type="button" class="catalogPage__navbar-item-top d-flex align-items-center">
		   <span>
				Операционная система
			</span>
			<svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 5L4 8L7 5" stroke="#C4C4C4" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		
		<div
			:class="{ 'active' : getShowList === 1 }"
			class="catalogPage__navbar-item-bottom flex-column">
			
			<div class="catalogPage__navbar-item-bottom-title d-flex align-items-center justify-content-between">
				<span>
					Выберете жанр
				</span>
				<button @click="reset" class="catalogPage__navbar-item-bottom-reset">
					Сбросить
				</button>
			</div>
			
			<ul v-if="getOperatingSystem !== null && getOperatingSystem.length">
				<li
						v-for="(item, index) in getOperatingSystem"
						class=catalogPage__navbar-item-bottom-label>
					<input
							class="d-none"
							:value="item.id"
							v-model="inputCheckboxOs"
							:id=" 'Oscheckbox_'+index"
							type="checkbox"
					>
					<label
							:for=" 'Oscheckbox_'+index"
						>
						{{ item.name }}
					</label>
				</li>
			</ul>
			
		</div>
	</div>
</template>

<script>
    import {mapMutations, mapGetters} from "vuex";

    export default {
        data: () => ({
            inputCheckboxOs: [],
			locale: '',
            // operatingSystem: null,
		}),
		watch: {
            inputCheckboxOs(data){
                this.$store.dispatch('setOs', data)
			}
		},
		computed: {
            ...mapGetters([
				'getOperatingSystem',
				'getShowList'
			])
		},
		mounted() {
        },
        methods: {
            ...mapMutations([
                'setOs',
				'resetStorage',
				'showList'
            ]),
            reset()
			{
			    this.$store.dispatch('resetStorage', 'os')
			    this.inputCheckboxOs.length = 0;

                this.$forceUpdate();
			},
            showList()
			{
			    this.$store.dispatch('showList', 1)
                // this.showForm = !this.showForm
			}
		}
    }
</script>

