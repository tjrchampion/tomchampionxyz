<template>
  <div class="container p-3">
    <b-alert
      v-if="message"
      show
    >
      {{ message }}
    </b-alert>

    <h3>Register / VueJS Example</h3>

    <p>Simple Boilerplate Slim3/Vuejs with CSRF.</p>

    <form
      novalidate
      @submit.prevent="register"
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
      <b-button
        variant="outline-success"
        :to="link"
      >
        Passed path_for() to VueJS (Back)
      </b-button>
    </form>		
  </div>
</template>

<script>

	import axios from 'axios';
	import bus from '../bus';

	export default {

		props: {
			link: {
				type: String,
				required: true
			}
		},

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
				}).catch(error => {
					this.message = error.response.data;
				});
			}
		}
	}
</script>

<style scoped>

</style>
