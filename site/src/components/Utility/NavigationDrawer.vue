<template>
	<div class="nav-drawer">
		<v-navigation-drawer
			:mini-variant="!open"
			:dense="dense"
			ref="drawer"
			permanent
		>
		<v-row class="pb-2">
			<v-col >
				<v-btn
					@click="open = !open"
					class="justify-end"
					text
				><v-icon>mdi-{{open ? 'window-close' : 'arrow-right' }}</v-icon></v-btn>
				<v-divider />
			</v-col>
		</v-row>
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
		update(n) {
			console.log(n);
		}
	}
}
</script>