<template>
	<v-card :max-width="200">
		<v-img :src="testimg" >
			<v-card-text>
				{{ id }}
			</v-card-text>
		</v-img>
	</v-card>
</template>
<script>
import testimg from "@/assets/testimg.jpg";

export default {
	name: "GalleryItemCard",
	components: {
		testimg
	},
	props: {
		id: {
			type: String,
			required: true
		}
	},
	computed: {
		testimg() {
			return testimg;
		}
	},
	data() {
		return {
			image: null
		}
	},
	methods: {
		loadImage() {
			//api load via id
		}
	}
}
</script>