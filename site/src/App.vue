<template>
	<v-app>
		<v-btn @click="drawerExpanded = !drawerExpanded">expand me uwu</v-btn>
		<v-row>
			<v-col>
				<v-navigation-drawer :value="drawerExpanded" dense ref="drawer">
					<v-list dense>
						<v-list-item>
						</v-list-item>
						<v-list-item>
							<v-expansion-panels>
								<v-expansion-panel>
									<v-expansion-panel-header>
										Filters
									</v-expansion-panel-header>
									<v-expansion-panel-content>
										<gallery-filter-card />
									</v-expansion-panel-content>
								</v-expansion-panel>
							</v-expansion-panels>
						</v-list-item>
					</v-list>
				</v-navigation-drawer>
			</v-col>
			<v-col cols="1">
				<v-btn
					class="mr-auto"
					@click="drawerExpanded = !drawerExpanded"
					text
				><v-icon>mdi-arrow-collapse-left</v-icon></v-btn>
			</v-col>
		</v-row>
		<v-main>
			<router-view/>
		</v-main>
	</v-app>
</template>

<script>
import GalleryFilterCard from './components/GalleryFilterCard.vue';
export default {
	name: 'App',
	components: {
		GalleryFilterCard
	},
	data() {
		return {
			drawerExpanded: true,
		}
	},
	mounted() {
		this.$vuetify.theme.dark = true;
	}
};
</script>
