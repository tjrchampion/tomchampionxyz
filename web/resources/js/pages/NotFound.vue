<template>
  <transition
    name="fade"
    mode="out-in"
  >
    <div
      class="theme"
      :class="{night: mode}"
    >
      <hero-not-found />
    </div>
  </transition>
</template>

<script>
	import bus from '../VueBus';

  import HeroNotFound from '../components/HeroNotFound.vue';

	export default {
		name: 'Error',
		components: {
			HeroNotFound
		},
		data() {
			return {
				mode: false 
			}
		},
		mounted() {
			bus.$on('nightMode', (mode) => {
				this.mode = JSON.parse(mode);
      });
		}
	}
</script>