<template>
	<div class="d-inline-flex flex-column">
		<div class="flex-grow-1">
				<v-text-field
					append-icon="mdi-magnify"
					label="Artist"
					v-model="artist"
				/>
		</div>
		<div class="flex-grow-1">
				<v-autocomplete
					label="Character(s)"
					deletable-chips
					multiple
					small-chips
					hide-selected
					hide-no-data
					:items="characters.list"
					v-model="characters.selected"
				></v-autocomplete>
		</div>
		<div class="flex-grow-1">
				<v-autocomplete
					label="Categories"
					deletable-chips
					multiple
					small-chips
					hide-selected
					hide-no-data
					:items="categories.list"
					v-bind="categories.selected"
				></v-autocomplete>
		</div>
		<div class="d-inline-flex">
			<v-btn class="flex-grow-1" @click="clearFilter">Clear</v-btn>
		</div>
	</div>
</template>
<script>
export default {
	name: "GalleryFilterCard",
	props: {
	},
	data() {
		return {
			artist: "",
			characters: {
				list: ["Ahri", "Neeko", "Nidalee"],
				selected: []
			},
			categories: {
				list: ["Solo", "Yuri"],
				selected: []
			}
		}
	},
	methods: {
		clearFilter() {
			this.artist = "";
			this.characters.selected = [];
			this.categories.selected = [];
		}
	}
}
</script>