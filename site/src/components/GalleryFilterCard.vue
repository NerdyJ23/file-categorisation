<template>
	<div>
		<v-row>
			<v-col>
				<v-text-field
					append-icon="mdi-magnify"
					label="Artist"
				/>
			</v-col>
		</v-row>
		<v-row>
			<v-col>
				<v-combobox
					label="Character(s)"
					multiple
					chips
				></v-combobox>
			</v-col>
		</v-row>
		<v-row>
			<v-col>
				<v-autocomplete
					label="Categories"
					chips
					:items="filter.categories"
				></v-autocomplete>
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
				name: "test",
				filterBy: "character",
				categories: []
			}
		}
	}
}
</script>