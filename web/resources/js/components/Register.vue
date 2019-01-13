<template>
	<div class="container p-3">

		<b-alert show v-if="message">{{message}}</b-alert>

		<h3>Register / VueJS Example</h3>

		<p>Simple Boilerplate Slim3/Vuejs with CSRF.</p>

		<form @submit.prevent="register" novalidate>
			<b-button type="submit" variant="success"><fa icon="spinner" v-show="submitting" pulse :style="{color: '#ffffff'}"></fa> Submit CSRF</b-button>
			<b-button variant="outline-success" :to="link">Passed path_for() to VueJS (Back)</b-button>
		</form>		

	</div>
</template>

<script>

	import axios from 'axios';
	import bus from '../bus';

	export default {

		props: [ 'link' ],

		data() {
			return {
				submitting: false,
				message: ''
			}
		},

		mounted() {
			bus.$on('csrf', (token) => {
				this.form = token;
			});
		},

		methods: {

			register() {
				this.submitting = !this.submitting;
				axios.post('/register', this.form).then(response => {
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
