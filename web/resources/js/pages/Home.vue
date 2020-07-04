<template>
  <div style="flex: 1 0 auto;">
    <header-bar />
    <hero />
    <Content />
    <contact />
    <footer-bar />
  </div>
</template>

<script>

	import axios from 'axios';
	import bus from '../bus';

  import Hero from '../components/Hero.vue';
  import Contact from '../components/Contact.vue';
	import Content from '../components/Content.vue';
	import HeaderBar from '../components/HeaderBar.vue';
	import FooterBar from '../components/FooterBar.vue';

	export default {
    name: 'Home',
    components: {
      Hero,
      Contact,
			Content,
			HeaderBar,
			FooterBar
    },
		data() {
			return {
				form: [],
				submitting: false,
				message: ''
			}
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
