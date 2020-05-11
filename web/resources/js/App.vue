<template>
  <div>
    <header-bar />
    <router-view />
    <footer-bar />
  </div>
</template>

<script>
	import HeaderBar from './components/HeaderBar.vue';
	import FooterBar from './components/FooterBar.vue';

	export default {
		name: 'App',
		components: { HeaderBar,FooterBar}
	}
</script>