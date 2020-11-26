<template>
	<div class="my__socialNetwork">
		
		<div
			v-for="(item, index) in service"
			 class="my__socialNetwork-item active d-flex align-items-center">
			<div class="mt-1 my__socialNetwork-item-img">
				<img class="mw-100"
					 :src=" '/assets/static/img/services/'+item.type+'.png' "
					 alt="steam">
			</div>
			<span>
				{{ item.login ? item.login : item.type }}
			</span>
			<div class="my__socialNetwork-delete" @click="showTrue(item, index)">
				<svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M1.82876 19.0817L18.7993 2.11113L17.3851 0.696918L0.414551 17.6675L1.82876 19.0817Z" fill="#2C2C2C"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M1.41406 0.696777L-0.000151038 2.11099L16.9704 19.0816L18.3846 17.6673L1.41406 0.696777Z" fill="#2C2C2C"/>
				</svg>
			</div>
		</div>
		
		
		<div
			v-for="item in array"
			class="my__socialNetwork-item d-flex align-items-center">
			
			<a :href=" '/login/' + item " class="d-flex align-items-center">
				<div class="mt-1 my__socialNetwork-item-img">
					<img class="mw-100"
						 :src=" '/assets/static/img/services/'+item+'.png' "
						 alt="steam">
				</div>
				<span>
					{{ item }}
				</span>
			</a>
		
		</div>
		
	
		<ModalDeleteServices
			v-if="show"
			:show="show"
			:item="item"
			:index="index"
			
			@ChangeShow="ChangeShow"
			@ChangeShowSuccess="ChangeShowSuccess"
		/>
		
	</div>
</template>

<script>
	import ModalDeleteServices from "./modal/ModalDeleteServices";
    export default {
        components:{
            ModalDeleteServices
		},
        props: ['services'],
		data: () => ({
			show: false,
            item: null,
			index: null,
            service : [],
			
			array: ['vkontakte', 'google', 'facebook', 'steam'],
		
		}),
		mounted() {
            this.service = this.services

            console.log(this.service)
			
            this.service.forEach(x => {
			    if ( this.array.indexOf(x.type) !== -1 ) {
			        this.array.splice(this.array.indexOf(x.type), 1);
				}
			})
			
        },
        methods: {
            ChangeShow() {
			    this.show = false;
			},
            ChangeShowSuccess(data)
			{
			    this.show = false;
			    if ( data.index !== undefined)
				{
				    this.service.splice(data.index, 1)
					this.array.push(data.item.type)
				}
			},
			showTrue(item, index)
			{
                this.item = item;
                this.index = index;
			    if (this.item !== null && this.index !== null)
				{
                    this.show = true;
                }
			}
		},
		
    }
</script>
