<template>
	<div class="d-flex flex-row flex-wrap mx-auto justify-center">
		<div class="d-flex flex-row" v-for="item in 20">
			<gallery-item-card
				:id="item"
				class="ma-4 pa-2"
			/>
		</div>
	</div>
</template>
<script>
import GalleryItemCard from '@/components/GalleryItemCard.vue';

export default {
	name: "HomePage",
	components: {
		GalleryItemCard
	},
	data() {
		return {
			items: [{id: "test"}, {id: "test2"}]
		}
	}
}
</script>