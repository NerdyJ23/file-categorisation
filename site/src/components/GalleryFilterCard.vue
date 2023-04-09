<template>
	<v-card outlined elevation="0">
		<v-card-title>Filters</v-card-title>
		<v-card-text>
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
		</v-card-text>
	</v-card>
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