<template>
  <section
    class="hero not-found"
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
          <h1>
            <feather
              type="alert-triangle"
              size="42"
            /> Whoops, nothing here.
          </h1>
          <h2>Page Not found.</h2>
          <h5>
            <b-link to="/#/welcome">
              Return Home
            </b-link> 
          </h5>
        </b-col>
      </b-row>
    </b-container>
  </section>
</template>

<script>

	import axios from 'axios';
	import bus from '../VueBus';

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