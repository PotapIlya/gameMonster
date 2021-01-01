<template>
	<div
			v-if="category !== null && category.length"
			class="catalogPage__category d-none d-sm-flex row align-items-center justify-content-between">
		
		<div
			 v-for="(item, index) in category"
			 @click="addCategory(item.id)"
			 class="catalogPage__category-item col-6 col-md-3">
			<div class="d-flex align-items-center justify-content-center">
				<img class="catalogPage__category-item-img w-100" :src="'/storage/'+item.img"  alt="">
			</div>
			<span class="catalogPage__category-item-text">{{ JSON.parse(item.name)[locale] }}</span>
		</div>

	</div>
</template>
<script>
    import { mapGetters, mapMutations } from 'vuex'
    export default {
        props: [

        ],
        data: () => ({
            showForm: false,
            inputCheckbox: [],
            locale: '',
            category: null,
        }),
        watch: {
            inputCheckbox(data)
            {
                this.$store.dispatch('setCategory', data);
            }
        },
        computed:{
            ...mapGetters([
                // 'getResultSend',
				'getCategoryImg'
            ]),
        },
        mounted() {
            setTimeout(() => {
                this.locale = this.$store.getters.getLocale;
                this.category = this.$store.getters.getCategoryImg;

            }, 5)
        },
        methods: {
            ...mapMutations([
                'setCategory'
            ]),
            addCategory(id)
			{
                console.log(id)
                this.$store.dispatch('setCategory', id);
			},
            reset()
            {
                // this.inputCheckbox.length = 0;
                // this.inputCheckbox = false;
            },
        }
    }
</script>