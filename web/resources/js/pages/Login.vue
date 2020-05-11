<template>
  <div class="container p-3">
    <b-alert
      v-if="message"
      show
    >
      {{ message }}
    </b-alert>

    <h3>Slim/VueJS Boilerplate With CSRF</h3>

    <p>Simple Boilerplate Slim3/Vuejs with CSRF.</p>

    <form
      novalidate
      @submit.prevent="submit"
    >
      <b-button
        type="submit"
        variant="success"
      >
        <fa
          v-show="submitting"
          icon="spinner"
          pulse
          :style="{color: '#ffffff'}"
        /> Submit CSRF
      </b-button>
    </form>
  </div>
</template>

<script>

	import axios from 'axios';
	import bus from '../bus';

	export default {

		data() {
			return {
				form: [],
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

			submit() {
				this.submitting = !this.submitting;
				axios.post('/', this.form).then(response => {
					this.submitting = !this.submitting;
					this.message = response.data.message;
				}).catch(error => {
					this.message = error.response.data;
				});
			}

		}

	}
</script>

<style scoped>

</style>
