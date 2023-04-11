<template>
	<div>
		<v-row>
			<v-col>
				<v-text-field
					append-icon="mdi-magnify"
					label="Artist"
					v-model="filter.artist"
				/>
			</v-col>
		</v-row>
		<v-row>
			<v-col>
				<v-autocomplete
					label="Character(s)"
					deletable-chips
					multiple
					small-chips
					hide-selected
					hide-no-data
					:items="filter.characters.list"
					v-model="filter.characters.selected"
				></v-autocomplete>
			</v-col>
		</v-row>
		<v-row>
			<v-col>
				<v-autocomplete
					label="Categories"
					deletable-chips
					multiple
					small-chips
					hide-selected
					hide-no-data
					:items="filter.categories.list"
					v-bind="filter.categories.selected"
				></v-autocomplete>
			</v-col>
		</v-row>
		<v-row>
			<v-col class="d-inline-flex">
				<v-btn class="flex-grow-1">Clear</v-btn>
			</v-col>
		</v-row>
	</div>
</template>
<script>
export default {
	name: "GalleryFilterCard",
	props: {
	},
	data() {
		return {
			filter: {
				artist: "test",
				characters: {
					list: ["Ahri", "Neeko", "Nidalee"],
					selected: []
				},
				categories: {
					list: ["Solo", "Yuri"],
					selected: []
				}
			}
		}
	}
}
</script>