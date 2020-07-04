<template>
  <section
    class="hero"
    :class="{night: mode}"
  >
    <b-container fluid="lg">
      <b-row>
        <b-col
          col
          lg="6"
          md="10"
          sm="12"
        >
          <h1>I develop software.</h1>
          <h2>I'm a full-stack applications developer, with a passion for UX.</h2>
          <h5>
            I currently work for <b-link
              href="https://www.kinderly.co.uk"
              target="_blank"
            >
              kinderly.co.uk
            </b-link> as Lead Developer, where I maintain and develop their entire stack.
          </h5>
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
				message: '',
				mode: false 
			}
		},

		mounted() {
			bus.$on('nightMode', (mode) => {
				this.mode = JSON.parse(mode);
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
