<template>
	<v-app>
		<navigation-drawer start-open style="height: 100%" @toggle="n => drawerOpen = n">
			<v-list dense>
				<v-list-item class="px-1">
					<v-expansion-panels v-if="drawerOpen">
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
		</navigation-drawer>
		<v-main>
			<router-view/>
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
	}
};
</script>
