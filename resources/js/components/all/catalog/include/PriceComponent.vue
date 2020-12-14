<template>
	<div class="catalogPage__navbar-item">
		<button @click="changeShow" type="button" class="catalogPage__navbar-item-top d-flex align-items-center">
		   <span>
				Цена
			</span>
			<svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 5L4 8L7 5" stroke="#C4C4C4" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		
		<div
			:class="{ 'active' : showForm }"
			class="catalogPage__navbar-item-bottom flex-column">
			
			<div class="catalogPage__navbar-item-bottom-title d-flex align-items-center justify-content-between">
				<span>
					От 800р до 2 300р
				</span>
				<button class="catalogPage__navbar-item-bottom-reset">
					Сбросить
				</button>
			</div>
			
			<div>
				slider
			</div>
		
		</div>
	</div>
</template>

<script>
    export default {
        data: () => ({
            showForm: false,
        }),
        methods: {
            changeShow()
            {
                this.showForm = !this.showForm
            }
        }
    }
</script>
