<template>
	<v-navigation-drawer
		:mini-variant="!open"
		:dense="dense"
		ref="drawer"
		permanent
		class="d-flex flex-column"
		style="position: sticky; max-height: 100vh"
	>
	<div class="d-flex flex-row ml-2 my-1">
		<span class="text-h6 flex-grow-1" v-if="open">Gallery Search</span>
		<v-btn
			@click="drawerButtonClicked"
			icon
			class="mr-2"
		>
			<v-icon>mdi-{{open ? 'window-close' : 'arrow-right' }}</v-icon>
		</v-btn>
	</div>
	<v-divider />
	<!-- Content -->
	<div class="d-flex flex-column">
		<slot></slot>
	</div>

	<!-- Actions -->
	<template #append>
		<div class="d-flex flex-column">
			<slot name="actions"></slot>
		</div>
	</template>
	</v-navigation-drawer>
</template>
<script>
export default {
	name: "NavigationDrawer",
	props: {
		dense: {
			type: Boolean,
			required: false,
			default: false
		},
		startOpen: {
			type: Boolean,
			required: false,
			default: false
		}
	},
	data() {
		return {
			open: false,
			width: 0
		}
	},
	mounted() {
		this.open = this.startOpen;
	},
	methods: {
		drawerButtonClicked() {
			this.open = !this.open;
			this.$emit('toggle', this.open);
		}
	}
}
</script>