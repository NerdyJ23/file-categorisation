<template>
	<div>
		<v-navigation-drawer
			:mini-variant="!open"
			:dense="dense"
			ref="drawer"
			permanent
		>
		<v-row>
			<v-col class="d-inline-flex flex-row ml-2 my-1">
				<span class="text-h6 mx-auto" v-if="open">Gallery Search</span>
				<v-btn
					@click="drawerButtonClicked"
					class="ml-auto mr-2"
					icon
				>
					<v-icon>mdi-{{open ? 'window-close' : 'arrow-right' }}</v-icon>
				</v-btn>
			</v-col>
		</v-row>
		<v-divider />
		<v-row>
			<v-col>
				<template v-show="open">
					<slot></slot>
				</template>
			</v-col>
		</v-row>
		</v-navigation-drawer>
	</div>
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