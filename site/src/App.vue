<template>
	<v-app>
		<v-main>
			<div class="d-inline-flex flex-row" style="height: 100%">
				<navigation-drawer class="flex-shrink-0" start-open @toggle="n => drawerOpen = n">
					<v-list dense>
						<v-list-item class="px-1 flex-grow-1">
							<v-expansion-panels :value="0" v-if="drawerOpen">
								<v-expansion-panel class="rounded-0">
									<v-expansion-panel-header>
										Filters
									</v-expansion-panel-header>
									<v-expansion-panel-content>
										<gallery-filter-card />
									</v-expansion-panel-content>
								</v-expansion-panel>
							</v-expansion-panels>
							<v-icon class="mx-auto" v-else disabled>mdi-filter-variant</v-icon>
						</v-list-item>
					</v-list>
					<template #actions>
						<v-btn color="success" class="rounded-0" @click="search">
							<v-icon>mdi-magnify</v-icon>
							Search
						</v-btn>
					</template>
				</navigation-drawer>
				<router-view/>
			</div>
		</v-main>
	</v-app>
</template>

<script>
import GalleryFilterCard from './components/GalleryFilterCard.vue';
import NavigationDrawer from './components/Utility/NavigationDrawer.vue';

export default {
	name: 'App',
	components: {
		GalleryFilterCard,
		NavigationDrawer
	},
	data() {
		return {
			drawerOpen: true
		}
	},
	mounted() {
		this.$vuetify.theme.dark = true;
	},
	methods: {
		search() {
			//api call here lmao
		}
	}
};
</script>
