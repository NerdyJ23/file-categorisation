<template>
	<div>
		<v-navigation-drawer
			:mini-variant="!open"
			:dense="dense"
			ref="drawer"
			permanent
		>
		<v-row>
			<v-col class="d-inline-flex flex-row-reverse">
				<v-btn
					@click="open = !open"
					class="rounded-0"
					text
				><v-icon>mdi-{{open ? 'window-close' : 'arrow-right' }}</v-icon></v-btn>
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
		update(n) {
			console.log(n);
		}
	}
}
</script>