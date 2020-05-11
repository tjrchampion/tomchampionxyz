<template>
  <section class="hero">
    <b-container fluid="lg">
      <b-row>
        <b-col
          col
          lg="8"
          md="10"
          sm="12"
        >
          <h1>I develop software.</h1>
          <h3>A full-stack application developer, with a passion for UX. I currently work for <a href="https://www.kinderly.co.uk">kinderly.co.uk</a> as Lead Developer, where I maintain and develop their entire stack.</h3>
          <b-button variant="primary">
            More about me
          </b-button>    
        </b-col>
      </b-row>
    </b-container>
  </section>
</template>

<script>

	import axios from 'axios';
	import bus from '../bus';

	export default {
    name: 'Home',
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
