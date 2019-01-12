<template>
	<div class="container p-3">
		
		<h3>Slim/VueJS Boilerplate With CSRF</h3>

		<b-alert show v-if="message">{{message}}</b-alert>

		<form method="post" @submit="onSubmit" novalidate>
			<b-button @click="onSubmit"  variant="success"><fa icon="spinner" v-show="submitting" pulse :style="{color: '#ffffff'}"></fa> Update</b-button>
		</form>

	</div>
</template>

<script>

	import axios from 'axios';
	import Bus from '../Bus';

	export default {

		data() {
			return {
				form: [],
				submitting: false,
				message: ''
			}
		},

		mounted() {
			Bus.$on('csrf', (token) => {
				this.form = token;
			});
		},

		methods: {

			onSubmit() {
				this.submitting = !this.submitting;
				axios.post('/', this.form).then(response => {
					this.submitting = !this.submitting;
					this.message = response.data.message;
				}).catch(err => {
					this.message = error.response.data;
				});
			}

		}

	}
</script>

<style scoped>

</style>
