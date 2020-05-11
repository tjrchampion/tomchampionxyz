<template>
  <div>
    <hero />
    <b-container
      fluid="lg"
      class="content"
    >
      <h2>Who am i?</h2>
      <h4>My name is Tom. As you might have guessed; With 10+ years experience as a developer, i've worked across multiple disciplines in multiple countries &amp; cities. My focus has been to develop web &amp; mobile applications, while providing solid & robust software archictecture using modern tools &amp; best practices. I develop primarily using a LEMP stack and lean toward frameworks like Slim (this website), Laravel, VueJS &amp; others.</h4>
      <h4>It remains my focus, to provide end-to-end integration, from planning & design, through to development &amp; release.</h4>
      <hr>
      <h5>
        This website is available for anyone interested on my <b-link href="https://www.github.com/tjrchampion">
          Github
        </b-link> profile. Why not take a look at how it was built? You can run the development copy yourself if you want.
      </h5>

      <!-- <b-alert show v-if="message">{{message}}</b-alert>
      <h3>Welcome</h3>
      <p>yo</p>
      <form @submit.prevent="submit" novalidate>
        <b-button type="submit" variant="success"><fa icon="spinner" v-show="submitting" pulse :style="{color: '#ffffff'}"></fa> Submit CSRF</b-button>
      </form> -->
    </b-container>
    <contact />
  </div>
</template>

<script>

	import axios from 'axios';
	import bus from '../bus';

  import Hero from '../components/Hero.vue';
  import Contact from '../components/Contact.vue';

	export default {
    name: 'Home',
    components: {
      Hero,
      Contact
    },
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
